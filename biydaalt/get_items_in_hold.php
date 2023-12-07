<?php
$xmlFile = 'data/goods.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        $itemsInHoldXML = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><itemsInHold></itemsInHold>');

        foreach ($xml->item as $item) {
            $quantityOnHold = (int)$item->quantityOnHold;

            if ($quantityOnHold > 0) {
                $itemInHold = $itemsInHoldXML->addChild('item');
                $itemInHold->addChild('itemNumber', (string)$item->itemNumber);
                $itemInHold->addChild('name', (string)$item->itemName);
                $itemInHold->addChild('price', (string)$item->unitPrice);
                $itemInHold->addChild('quantityOnHold', (string)$quantityOnHold);
            }
        }

        header('Content-Type: application/xml; charset=utf-8');

        echo $itemsInHoldXML->asXML();
    } else {
        echo "Failed to load XML file.";
    }
} else {
    echo "XML file not found.";
}
