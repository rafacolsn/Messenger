<?php
session_start();
require "assets/php/connect2db.php";
require "messages-manager.php";
require "messages.php";

if(isset($_POST['send-message'])) {
    
    $author = $_SESSION['user_id'];
    $convers = 21; //à remplacer par un $_SESSION['topic'] ?
    $text_message = $_POST['message'];
    
    if ($text_message != "" && strlen($text_message) < 2500)
    {
        $message = new Message(['author_id'=>$author, 'conversation_id'=>$convers, 'content'=>$text_message]); //instancie un message avec un tableau
        $msg_db = new MessagesManager($connexion);
        $msg_db->add($message);

       
    }
    else {
        echo "Message is not valid (empty or too long) !";
    }
}
require "messenger.php"; // renvoie à la page du chat
?>