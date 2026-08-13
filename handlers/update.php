<?php
include( __DIR__ . "/../includes/db.php");
function updateCharacter($charname, $field, $newvalue) {
    $characters = getCharacters();

    foreach($characters as &$c) { // the & is to pass by reference instead of value like C

        if ($charname === $c["name"] || $charname === strtolower($c["name"])) {
            $c["$field"] = $newvalue;
             
            if (saveCharacters($characters)) {
                echo "Character Actualizado exitosamente! <br>"; 
                return;
            } else {
                echo "Ha habido un error intentando actualizar.";
                return;
            }
        } 
    } 
    echo "Character no encontrado.";
}

if ($_POST) {
    updateCharacter($_POST["char-name"], $_POST["field"], $_POST["new-value"]);   
}