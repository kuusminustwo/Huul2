<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["managerID"])) {
        $itemName = htmlspecialchars($_POST["itemName"]);
        $unitPrice = floatval($_POST["unitPrice"]);
        $quantityAvailable = intval($_POST["quantityAvailable"]);
        $description = htmlspecialchars($_POST["description"]);

        if (empty($itemName) || $unitPrice <= 0 || $quantityAvailable <= 0 || empty($description)) {
            die("Invalid item data. Please check the inputs.");
        }

        $itemNumber = uniqid("ITEM");

        $xml = simplexml_load_file('data/goods.xml');
        if ($xml === false) {
            $xml = new SimpleXMLElement('<items></items>');
        }

        $item = $xml->addChild('item');
        $item->addChild('itemNumber', $itemNumber);
        $item->addChild('itemName', $itemName);
        $item->addChild('unitPrice', $unitPrice);
        $item->addChild('quantityAvailable', $quantityAvailable);
        $item->addChild('description', $description);
        $item->addChild('quantityOnHold', 0); // Set initial values
        $item->addChild('quantitySold', 0);

        $xml->asXML('data/goods.xml');

        echo "The item has been listed in the system, and the item number is: $itemNumber";
    } else {
        header("Location: mlogin.htm");
        exit;
    }
}
?>
<script>
        setTimeout(function () {
            window.location.href = "buyonline.htm";
        }, 3000);
    </script>
