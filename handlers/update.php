<?php
include( __DIR__ . "/../includes/db.php");
function updateCharacter($charname, $field, $newvalue) {
    $characters = getCharacters();

    foreach($characters as $c) {
        echo "<br> try me" .var_dump($c) ."<br> <br>";

        if ($charname === $c["name"] || $charname === strtolower($c["name"])) {

            echo "$field  <-- field to be change<br>"; //works well
            echo var_dump($c["$field"]) . " <-- c field's current value<br>"; //works well
            

            $c["$field"] = $newvalue;
             
            echo var_dump($c["$field"]) . " <-- c field's new value<br>"; //works well
            if (saveCharacters($characters)) {
                echo "Character Actualizado exitosamente! <br>"; //it prints, later when i check there's no update, why?
            } else {
                echo "Ha habido un error intentando actualizar.";
            }
        } 
    } 
    echo "Character no encontrado.";   
}

if ($_POST) {
    updateCharacter($_POST["char-name"], $_POST["field"], $_POST["new-value"]);   
}
