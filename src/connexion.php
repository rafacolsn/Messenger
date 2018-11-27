<?php

date_default_timezone_set("Europe/Brussels");


try {
    $timezone = date_default_timezone_get();
    $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET CHARACTER SET utf8");
    $connexion->exec("SET time_zone = '{$timezone}'");
} catch (PDOException $e) {
    echo("Connection failed".$e->getMessage());
}
?>