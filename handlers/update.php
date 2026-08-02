<?php
include( __DIR__ . "/../includes/db.php");
function updateCharacter($charname, $field, $newvalue) {
    $characters = getCharacters();

    foreach($characters as $c) {
        if ($charname === $c["$charname"] || $charname === strtolower($c['name'])) {
            $c["$field"] = $newvalue;
            
            if (saveCharacters($characters)) {
                return "Character Actualizado exitosamente!";
            } else {
                return "Ha habido un error intentando actualizar.";
            }
        } 
    } 
    return "Character no encontrado, creo.";   
}
    