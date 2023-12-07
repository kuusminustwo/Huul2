<?php
    $xmlFile = 'data/goods.xml';

    $xml = simplexml_load_file($xmlFile);

    if ($xml === false) {
        die("Unable to load XML data.");
    }

    $itemNumber = $_POST['itemNumber'];

    $itemToUpdate = $xml->xpath("//item[itemNumber='$itemNumber']");

    if (count($itemToUpdate) === 0) {
        echo json_encode(['success' => false, 'message' => 'Item not found']);
        exit;
    }

    $quantityAvailable = (int)$itemToUpdate[0]->quantityAvailable;

    if ($quantityAvailable <= 0) {
        echo json_encode(['success' => false, 'message' => 'Item not available']);
        exit;
    }

    $itemToUpdate[0]->quantityAvailable = $quantityAvailable - 1;
    $itemToUpdate[0]->quantityOnHold = (int)$itemToUpdate[0]->quantityOnHold + 1;

    if ($xml->asXML($xmlFile)) {
        echo json_encode(['success' => true, 'message' => 'Item updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating item']);
    }
?>