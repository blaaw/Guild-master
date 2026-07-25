<?php


function getCharacters() {
    $characters_file = "../data/characters.json";
    $characters = file_exists($characters_file) ? json_decode(file_get_contents($characters_file), true) : [];
    return $characters;
}

function saveCharacters($characters) {
    $characters_file = "../data/characters.json";
    if(file_put_contents($characters_file,json_encode($characters,JSON_PRETTY_PRINT))){
        echo "Character created and added to the Json database succesfully!";
    }  
}