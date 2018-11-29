<?php
session_start();
require "assets/php/connect2db.php";
require "messages-manager.php";

if(isset($_POST['send-message'])) {
    $text_message = $_POST['message'];
    $author = $_SESSION['user_id'];
    $convers = 21; //à remplacer par un $_SESSION['topic'] ?
    
    
    if ($text_message != "" && strlen($text_message) < 2500)
    {
        $message = new Message($author, $convers, $text_message);
        $msg_db = new MessagesManager($connexion);
        $msg_db->add($message);

        // inscrit le message dans la db
    }
    else {
        echo "Message is not valid (empty or too long) !";
    }
}
require "messenger.php"; // renvoie à la page du chat
?>