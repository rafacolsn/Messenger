<?php
session_start();
require "assets/php/connect2db.php";

$idMessage = $_GET['id'];
$id = $_SESSION["user_id"];

    if ($_GET['action'] == 'react') {

        $req = $connexion->prepare("UPDATE T_REACTIONS SET liked=liked+1 WHERE message_id= $idMessage");
        $req->execute();
    }
require "assets/php/bottom.php";
?>