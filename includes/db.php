<?php


function getCharacters() {
    $characters_file = __DIR__ . "/../data/characters.json";
    $characters = file_exists($characters_file) ? json_decode(file_get_contents($characters_file), true) : [];
    return $characters;
}

function findCharacter($charname) {
    $allcharacters = getCharacters();
    foreach($allcharacters as $c) {
        if ($charname === $c['name'] || $charname === strtolower($c['name'])) {
            return $c;
        } 
    }
    return "";
}

function saveCharacters($characters) {
    $characters_file = __DIR__ . "/../data/characters.json";
    if(file_put_contents($characters_file,json_encode($characters,JSON_PRETTY_PRINT))){
        return true;
    }  else {
        return false;
    }
}
