<?php
if ($_POST) {
    //IMAGE HANDLER
    $img_dir = '../img-uploads';
    if (!is_dir($img_dir)) {
        mkdir($img_dir,0777);
        echo "img dir create (was not existen before)<br>";
    }
   
    $img_path = "";
    if ($_FILES["avatar"]["tmp_name"] != "") { //check si extiste
        $img_name = time() . "_" . $_FILES['avatar']['name'];
        $img_path = $img_dir . "/" . $img_name;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $img_path)) { // haz la accion y si sale bien ...
            echo 'succesful image upload to' . $img_dir . "! <br>";
        }
    }
    
    //JSON ENCODING & DATA HANDLER
    $data_dir = '../data';
    if (!is_dir($data_dir)) {
        mkdir($data_dir,0777);
        echo "data dir create (was not existen before) <br>";
    } 
    
   include "../includes/db.php";
   $characters = getCharacters();

    $characters[] = [ //this is the syntax to append to an array
        "id" => uniqid(),
        "name" => $_POST["name"],
        "class"=> $_POST["class"],
        "HP"=> $_POST["hp"],
        "gold"=> $_POST["gold"],
        "inventory"=> $_POST["inventory"] ?? [],
        "avatar"=> $img_path 
    ];
    
    saveCharacters($characters);
}   
/*
    INFO ABOUT FILES, POST, SERVER
    echo '<pre>';
    echo "FILES vardump contents: <br>";
    var_dump($_FILES);
    echo '</pre>';
    
    echo '<pre>';
    echo "SERVER contents: <br>";
    var_dump($_SERVER);
    echo '</pre>';

    echo '<pre>';
    echo "POST vardump contents: <br>";
    var_dump($_POST);
    echo '</pre>';
    */