<?php
session_start();
$username = $_SESSION['username'];
require "assets/php/connect2db.php";
$id_sql = $connexion->prepare("SELECT id_user FROM T_USERS WHERE username = :username");
$id_sql->bindValue(':username',$username);
$id_sql->execute();
$id_user = $id_sql->fetch(PDO::FETCH_OBJ);

require "messages.php";

if(isset($_POST['send-message'])) {
    $text_message = $_POST['message'];
    $author = intval($id_user->id_user);
    $convers = 21;
    $message = new Message($author, $convers, $text_message);
    
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

require "messenger.php";

?>