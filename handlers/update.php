<?php
include(__DIR__ . "/../includes/db.php");
session_start();
function updateCharacter($charname, $field, $newvalue)
{
    $characters = getCharacters();

    foreach ($characters as &$c) { // the & is to pass by reference instead of value like C

        if ($charname === $c["name"] || $charname === strtolower($c["name"])) {
            $eaval_validCharName = findCharacter(trim($newvalue));

            if ($eaval_validCharName != "") {
                $_SESSION["flash"] = "Error: ya existe un personaje con ese nombre.";
                header("Location:../index.php");
            } else {
                $c["$field"] = $newvalue;

                if (saveCharacters($characters)) {
                    $_SESSION["flash"] = "Character Actualizado exitosamente!";
                    header("Location:../index.php");
                    exit;
                } else {
                    $_SESSION["flash"] = "Ha habido un error intentando actualizar.";
                    header("Location:../index.php");
                    exit;
                }
            }
        }
    }
    echo "Character no encontrado.";
}

if ($_POST) {
    updateCharacter($_POST["char-name"], $_POST["field"], $_POST["new-value"]);
}