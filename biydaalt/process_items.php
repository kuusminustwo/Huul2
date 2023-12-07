<?php
$itemsToRemove = [];

$xmlFile = 'data/goods.xml'; 
if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        foreach ($xml->item as $item) {
            $quantitySold = (int)$item->quantitySold;
            
            if ($quantitySold > 0) {
                $item->quantitySold = 0;
                
                $quantityAvailable = (int)$item->quantityAvailable;
                $quantityOnHold = (int)$item->quantityOnHold;
                
                if ($quantityAvailable === 0 && $quantityOnHold === 0) {
                    $itemsToRemove[] = $item;
                }
                
            }
        }
        if($itemsToRemove){
            foreach ($itemsToRemove as $item) {
                $parent = dom_import_simplexml($item)->parentNode;
                if ($parent) {
                    $dom = dom_import_simplexml($item);
                    $parent->removeChild($dom);
                }
            }
        }
        

        if ($xml->asXML($xmlFile)) {
            $response = ['success' => true, 'message' => 'Processing completed successfully'];
        } else {
            $response = ['success' => false, 'message' => 'Error updating XML file'];
        }
    } else {
        $response = ['success' => false, 'message' => 'Failed to load XML file'];
    }
} else {
    $response = ['success' => false, 'message' => 'XML file not found'];
}

header("Content-type: application/json");
echo json_encode($response);
?>
