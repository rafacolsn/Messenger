<?php


require "messages.php";
require "connexion.php";




if(isset($_POST['send-message'])) {
    
    $author = 3;
    $convers = 21;
    $text_message = $_POST['message'];

    $message = new Message($author, $convers, $text_message);
    
    
}

$stmt = $connexion->prepare("INSERT INTO T_MESSAGES (author_id,conversation_id,content) VALUES (:author,:convers,:content)");
    $stmt->bindValue(':author', $author);
    $stmt->bindValue(':convers', $convers);
    $stmt->bindValue(':content', $text_message);    
$stmt->execute();
require "index.php";
?>
