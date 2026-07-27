<?php
include("../includes/db.php");
// FUNCIONA PERO SI LO MUEVO A ROOT NO VA, SI LO LLAMO DESDE INCLUDE NO VA, SI NOSE QUE POLLAS QUE LE FOLLEN
$characters = getCharacters();
$charHTML = "";

foreach($characters as $character) {
    $inventoryHTML = "";
    foreach ($character['inventory'] as $item) {
        $inventoryHTML .= "<li>{$item}</li>";
    }

    $charHTML .= "<div class='char-card'>  
        <h3>{$character['name']}</h3>
            <p>Class: {$character['class']}</p> 
            <p>HP: {$character['HP']}</p> 
            <p>Gold: {$character['gold']}</p> 
            <p>Inventory:</p>
            <ul class='char-card-inventory'>
            {$inventoryHTML}
            </ul>
    </div>";
}
echo $charHTML;