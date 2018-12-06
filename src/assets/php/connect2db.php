<?php
date_default_timezone_set("Europe/Brussels");

try {
    $timezone = date_default_timezone_get();
    $connexion = new PDO("mysql:host=mysql-raphcolson.alwaysdata.net;dbname=raphcolson_messenger", "172648", "MDP?Msger");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $connexion->exec("SET time_zone = '{$timezone}'");
} catch (PDOException $e) {
    echo("Connection failed".$e->getMessage());
}

$username = $_SESSION['username'];

?>