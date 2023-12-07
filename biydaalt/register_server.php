<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $password = htmlspecialchars($_POST["password"]); 
    $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);


    if ($email && $firstName && $lastName && $password) {
        $xml = simplexml_load_file('data/customer.xml');
        if ($xml === false) {
            $xml = new SimpleXMLElement('<customers></customers>');
        }

        foreach ($xml->customer as $customer) {
            if ((string) $customer->email === $email) {
                die("Email is already in use. Please choose another.");
            }
        }

        $customerId = count($xml->customer) + 1;

        $customer = $xml->addChild('customer');
        $customer->addChild('id', $customerId);
        $customer->addChild('firstName', $firstName);
        $customer->addChild('lastName', $lastName);
        $customer->addChild('email', $email);
        $customer->addChild('password', $password);
        if($phoneNumber){
            $customer->addChild('phoneNumber', $phoneNumber);
        }
        $xml->asXML('data/customer.xml');

        echo "Registration successful! Your Customer ID is ".$customerId;
    } else {
        die("Invalid input data.");
    }
}
?>
<script>
        setTimeout(function () {
            window.location.href = "buyonline.htm";
        }, 3000);
    </script>
