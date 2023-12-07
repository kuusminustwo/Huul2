<?php
$xmlFile = 'data/goods.xml';

$xml = simplexml_load_file($xmlFile);

if ($xml === false) {
    die("Unable to load XML data.");
}

$itemNumbers = $_POST['itemNumbers'];

$responses = [];

foreach ($itemNumbers as $itemNumber) {
    $itemToUpdate = $xml->xpath("//item[itemNumber='$itemNumber']");

    if (count($itemToUpdate) === 0) {
        $responses[] = ['success' => false, 'message' => 'Item not found'];
    } else {
        $itemToUpdate[0]->quantitySold = (int)$itemToUpdate[0]->quantityOnHold;
        $itemToUpdate[0]->quantityOnHold = 0;

        if ($xml->asXML($xmlFile)) {
            $responses[] = ['success' => true, 'message' => 'Item updated successfully'];
        } else {
            $responses[] = ['success' => false, 'message' => 'Error updating item'];
        }
    }
}

echo json_encode($responses);
?>
