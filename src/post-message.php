<?php
session_start();
$username = $_SESSION['username'];
require "assets/php/connect2db.php";
require "messages-manager.php";
require "messages.php";

if(isset($_POST['send-message'])) {
    
    $author = $_SESSION['user_id'];
    $convers = 21; //à remplacer par un $_SESSION['topic'] ?
    $text_message = $_POST['message'];
    
    if ($text_message != "")
    {
        $stmt = $connexion->prepare("INSERT INTO T_MESSAGES (author_id,conversation_id,content) VALUES (:author,:convers,:content)");
        $stmt->bindValue(':author', $author);
        $stmt->bindValue(':convers', $convers);
        $stmt->bindValue(':content', $text_message);    
        $stmt->execute();
       
    }

    else {
        echo "Message is empty !";
    }
    
}
require "messenger.php"; // renvoie à la page du chat
?>
