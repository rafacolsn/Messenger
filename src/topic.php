<?php  
session_start();
$username = $_SESSION['username'];
require "assets/php/connect2db.php";
$id_sql = $connexion->prepare("SELECT id_user FROM T_USERS WHERE username = :username");
$id_sql->bindValue(':username',$username);
$id_sql->execute();
$id_user = $id_sql->fetch(PDO::FETCH_OBJ);
$author = intval($id_user->id_user);

// CREATION DE TOPIC pour CONVERSATION
if(isset($_POST['create-conv'])) {
   $topic_creat = $_POST['topic'];
   
   if($topic_creat != "")
   {
      $result = $connexion->prepare("INSERT INTO T_CONVERSATION (author_id, subject) VALUES (:author,:topic)");
      $result->bindValue(':author', $author);
      $result->bindValue(':topic', $topic_creat);
      $result->execute();
      
   } else {
      var_dump ("Topic name is empty");
   }
}
include 'messenger.php';

?>