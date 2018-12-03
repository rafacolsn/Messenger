<?php
session_start();
require "assets/php/connect2db.php";

$username = $_SESSION['username'];


$id_sql = $connexion->prepare("SELECT id_user FROM T_USERS WHERE username = :username");
$id_sql->bindValue(':username', $username);
$id_sql->execute();
$id_user = $id_sql->fetch(PDO::FETCH_OBJ);
$author = intval($id_user->id_user);

// CREATION DE TOPIC pour CONVERSATION

if (isset($_POST['create-conv']))
	{
	$topic_creat = $_POST['topic'];
	
	if ($topic_creat !== "")
		{
			$subject = $topic_creat;
			$result = $connexion->prepare("INSERT INTO T_CONVERSATION (author_id, subject) VALUES (:author,:topic)");
			$result->bindValue(':author', $author);
			$result->bindValue(':topic', $topic_creat);
			$result->execute();

if($topic_creat == $result) {
	var_dump("Dejà crée");
}
 
		} 
		
		else
		{
			var_dump("Topic name is empty");
		} 
	}

if (strlen($topic_creat) > 50)
	{
	var_dump($topic_creat . " " . " is too long, maximum 20 characters");
	}


include 'messenger.php';

include "chat.php";

?>