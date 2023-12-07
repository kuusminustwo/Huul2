<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $xml = simplexml_load_file('data/customer.xml');
    if ($xml === false) {
        die("Customer data not found.");
    }

    $found = false;
    foreach ($xml->customer as $customer) {
        if ($email == (string)$customer->email && $password == (string)$customer->password) {
            $_SESSION["customerID"] = (string)$customer->id;
            header("Location: buying.htm");
            exit;
        }
    }

    echo "Invalid email address or password.";
}
?>
