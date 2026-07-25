<?php
if ($_POST) {
    echo '<pre>';
    echo "POST variable contents: <br>" . htmlspecialchars(print_r($_POST, true));
    echo '</pre>';

    $data_dir = '../data';
    if (!is_dir($data_dir)) {
        mkdir($data_dir,0777);
        echo "folder $data_dir created";
    } 
   
    $newChar = [
        "name" => $_POST["name"],
        "class"=> $_POST["class"],
        "HP"=> $_POST["hp"],
        "gold"=> $_POST["gold"],
        "inventory"=> $_POST["inventory"] ?? [],
        "avatar"=> $_POST["avatar"]
    ];

    $json = json_encode($newChar, JSON_PRETTY_PRINT);

}