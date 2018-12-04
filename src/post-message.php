<?php
session_start();
$username = $_SESSION['username'];
require "assets/php/connect2db.php";

if(isset($_POST['send-message'])) {
    
    $author = $_SESSION['user_id'];
    $convers = $_SESSION['cv_id'];
    $text_message = $_POST['message'];
    
    if ($text_message != "" && strlen($text_message) < 2500)
    {
        $stmt = $connexion->prepare("INSERT INTO T_MESSAGES (author_id,conversation_id,content) VALUES (:author,:convers,:content)");
        $stmt->bindValue(':author', $author);
        $stmt->bindValue(':convers', $convers);
        $stmt->bindValue(':content', $text_message);    
        $stmt->execute();
    }

    else {
        echo "Message is empty or maybe too long!";
    }
}
require "assets/php/bottom.php";

header("Location: messenger.php?cv_id=".intval($convers).'&cv_name='.$_SESSION['cv_name'].'' ); // renvoie à la page de la conversation
?>
