<?php
$xmlFile = 'data/goods.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        $response = new SimpleXMLElement('<items></items>');

        foreach ($xml->item as $item) {
            $quantityAvailable = (int)$item->quantityAvailable;
            if ($quantityAvailable > 0) {
                $responseItem = $response->addChild('item');
                $responseItem->addChild('itemNumber', (string)$item->itemNumber);
                $responseItem->addChild('name', (string)$item->itemName);
                $responseItem->addChild('description', (string)$item->description);
                $responseItem->addChild('price', (string)$item->unitPrice);
                $responseItem->addChild('quantityAvailable', $quantityAvailable);
            }
        }
        header('Content-Type: application/xml; charset=utf-8');
        echo $response->asXML();
    }else {
        echo "Failed to load XML file.";
    }
} else {
    echo "XML file not found.";
}

