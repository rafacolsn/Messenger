<?php  
session_start();
require "assets/php/connect2db.php";


// CREATION DE TOPIC pour CONVERSATION
if(isset($_POST['create-conv'])) {
   $author = $_SESSION['user_id'];
   $topic_creat = $_POST['topic'];
   
   if($topic_creat != "")
   {
      $result = $connexion->prepare("INSERT INTO T_CONVERSATION (author_id,subject) VALUES (:author,:topic)");
      $result->bindValue(':author', $author);
      $result->bindValue(':topic', $topic_creat);
      $result->execute();
      
   } else {
      var_dump ("Topic name is empty");
   }
}
include 'messenger.php';

?>