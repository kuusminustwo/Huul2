<?php
function updateXMLDocument($itemsToRemove) {
    $xmlFile = 'data/goods.xml'; 

    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);

        if ($xml) {
            foreach ($itemsToRemove as $itemData) {
                $itemNumber = $itemData['itemNumber'];
                $quantityToRemove = $itemData['quantityToRemove'];
                
                $itemToUpdate = null;
                
                foreach ($xml->item as $item) {
                    if ((string)$item->itemNumber === $itemNumber) {
                        $itemToUpdate = $item;
                        break;
                    }
                }
                
                if ($itemToUpdate !== null) {
                    $currentQuantityOnHold = (int)$itemToUpdate->quantityOnHold;
                    $currentQuantityAvailable = (int)$itemToUpdate->quantityAvailable;

                    $itemToUpdate->quantityOnHold = max(0, $currentQuantityOnHold - $quantityToRemove);
                    $itemToUpdate->quantityAvailable += $quantityToRemove;
                }
            }

            $xml->asXML($xmlFile);

            echo "Items updated successfully.";
        } else {
            echo "Failed to load XML file.";
        }
    } else {
        echo "XML file not found.";
    }
}

if (isset($_POST['items'])) {
    $itemsToRemove = $_POST['items'];
    
    updateXMLDocument($itemsToRemove);
}
?>
