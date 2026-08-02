<?php
session_start();
if ($_POST) {
    //IMAGE HANDLER
    $img_dir = '../img-uploads';
    if (!is_dir($img_dir)) {
        mkdir($img_dir,0777);
    }
   
    $img_path = "";
    if ($_FILES["avatar"]["tmp_name"] != "") { //check si extiste
        $img_name = time() . "_" . $_FILES['avatar']['name'];
        $img_path = $img_dir . "/" . $img_name;

        move_uploaded_file($_FILES['avatar']['tmp_name'], $img_path);
    }
    
    //JSON ENCODING & DATA HANDLER
    $data_dir = '../data';
    if (!is_dir($data_dir)) {
        mkdir($data_dir,0777);
    } 
    
   include __DIR__ . "../includes/db.php";
   $characters = getCharacters();

    foreach ($characters as $character) {
        $same_name = trim($_POST["name"]) == $character["name"];
        $same_name_lower =  trim($_POST["name"]) == strtolower($character["name"]);
        $same_lower_lower = strtolower(trim($_POST["name"])) == strtolower($character["name"]);

        if ( $same_name || $same_name_lower || $same_lower_lower) {
        $_SESSION["flash"] = "Error: Ya existe un character con ese nombre.";
        header("Location:../index.php");
        exit;
        }
    }

    $characters[] = [ //this is the syntax to append to an array
        "id" => uniqid(),
        "name" => trim($_POST["name"]),
        "class"=> $_POST["class"],
        "HP"=> $_POST["hp"],
        "gold"=> $_POST["gold"],
        "inventory"=> $_POST["inventory"] ?? [],
        "avatar"=> $img_path 
    ];
    
    if (saveCharacters($characters)) {
        //for this to work and redirect, no echoes 
        $_SESSION["flash"] = "Character added succesfully!";
        header("Location:../index.php");
        exit;
    }
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