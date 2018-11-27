<?php  
include './assets/php/connect2db.php';

// CREATION DE TOPIC pour CONVERSATION
if(isset($_POST['create-conv'])) {
   $topic_creat = $_POST['topic'];
   
   if($topic_creat != "")
   {
      $conversation_sql = "INSERT INTO T_CONVERSATION (author_id, subject) VALUES (5,'$topic_creat')";
      $result = $connexion->prepare($conversation_sql);
      $result->execute([$conversation_sql]);
      
   } else {
      echo "Topic name is empty";
   }
}
include 'messenger.php';
?>