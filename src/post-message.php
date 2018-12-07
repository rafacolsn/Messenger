<?php
session_start(); 
$username = $_SESSION['username'];
require "assets/php/connect2db.php";

// si le bouton send-message est cliqué
if(isset($_POST['send-message'])) {
    
    $author = $_SESSION['user_id'];
    $convers = $_SESSION['cv_id'];
    $text_message = $_POST['message'];
    
    if ($text_message != "" && strlen($text_message) < 2500) // on envoi le msg dans la db s'il n'est pas vide et < que 2500 caractères 
    { // requête pour inser le msg dans la db
        $stmt = $connexion->prepare("INSERT INTO T_MESSAGES (author_id,conversation_id,content) VALUES (:author,:convers,:content)");
        $stmt->bindValue(':author', $author);
        $stmt->bindValue(':convers', $convers);
        $stmt->bindValue(':content', $text_message);    
        $stmt->execute();
        $msg_id=$connexion->lastInsertId();
        $req_insert_react = $connexion->prepare("INSERT INTO T_REACTIONS (message_id, liked) VALUES ($msg_id, 0)");
        $req_insert_react->execute();
        if($stmt){
            $req2=$connexion->prepare("UPDATE T_PARTICIPATION_CONVERSATION SET unread_msg=unread_msg+1 WHERE user_id!=$author AND conversation_id=$convers");
            $req2->execute();
            
        }
        
    }else { // affiche un msg d'erreur
        echo "Message is empty or maybe too long!";
    }
}
require "assets/php/bottom.php";


header("Location: messenger.php?cv_id=".intval($convers).'&cv_name='.$_SESSION['cv_name'].'' ); // renvoie à la page de la conversation
?>

