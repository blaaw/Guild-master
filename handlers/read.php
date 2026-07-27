<?php
include( __DIR__ . "/../includes/db.php");
// FUNCIONA PERO SI LO MUEVO A ROOT NO VA, SI LO LLAMO DESDE INCLUDE NO VA, SI NOSE QUE POLLAS QUE LE FOLLEN

//despues de todo al final pude hacerlo como yo queria, nose porque siento que es un chin rebundante pero bueno

function formatCard($character) {
    $charHTML = "";
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

    return $charHTML;
}

function getAllCharactersCards() {
    $characters = getCharacters();
    $charactersHTML = "";

    foreach($characters as $character) {
        $charactersHTML .= formatCard($character);
    }
    
    $cards = "<div class='cards'>" . $charactersHTML . "</div>";
    return $cards;
}

function getSingleCharacterCard($charname) { //works well but i wanna search without case sensitivity
    $character = findCharacter($charname);
    if ($character === "") {
        return "error, character not found in database";
    } else {
        return formatCard($character);
    }
}
