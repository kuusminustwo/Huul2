<?php
$xmlFile = 'data/goods.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        $soldItemsXML = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><soldItems></soldItems>');

        foreach ($xml->item as $item) {
            $quantitySold = (int)$item->quantitySold;

            if ($quantitySold > 0) {
                $soldItems = $soldItemsXML->addChild('item');
                $soldItems->addChild('itemNumber', (string)$item->itemNumber);
                $soldItems->addChild('name', (string)$item->itemName);
                $soldItems->addChild('price', (string)$item->unitPrice);
                $soldItems->addChild('quantityAvailable', (string)$item->quantityAvailable);
                $soldItems->addChild('quantityOnHold', (string)$item->quantityOnHold);
                $soldItems->addChild('quantitySold', (string)$item->quantitySold);
            }
        }

        header('Content-Type: application/xml; charset=utf-8');

        echo $soldItemsXML->asXML();
    } else {
        echo "Failed to load XML file.";
    }
} else {
    echo "XML file not found.";
}
