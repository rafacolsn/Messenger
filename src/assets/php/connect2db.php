<?php
date_default_timezone_set("Europe/Brussels");
<<<<<<< HEAD
try {
    $timezone = date_default_timezone_get();
    $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET CHARACTER SET utf8");
=======



try {
    
    $timezone = date_default_timezone_get();
    $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> 207452fa5af20448a526ef89bca4e29d1c5c0387
    $connexion->exec("SET time_zone = '{$timezone}'");
} catch (PDOException $e) {
    echo("Connection failed".$e->getMessage());
}
<<<<<<< HEAD
=======



>>>>>>> 207452fa5af20448a526ef89bca4e29d1c5c0387
?>