<?php

date_default_timezone_set("Europe/Brussels");


    //CONNEXION A LA BASE DE DONNEES
    try {
        $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo("Connected successfully");
    } catch (PDOException $e) {
        echo("Connection failed".$e->getMessage());
    }
?>