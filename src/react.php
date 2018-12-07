<?php
session_start();
require "assets/php/connect2db.php";

$idMessage = $_GET['id'];
$id = $_SESSION["user_id"];

    if ($_GET['action'] == 'react') {

        $sql = "INSERT INTO T_REACTIONS (user_id,message_id) VALUES (:user_id,:message_id)";
        $stmt= $connexion->prepare($sql);
        $stmt->bindValue(":user_id", $id);
        $stmt->bindValue("message_id", $idMessage);
        $stmt->execute();

        if($stmt){
            $req = $connexion->prepare("UPDATE T_REACTIONS SET liked=liked+1 WHERE message_id= $idMessage");
            $req->execute();
        }
    }
require "assets/php/bottom.php";
?>