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

			//Insert du topic dans SQL lorsqu'on presse CReate Topic
			$result = $connexion->prepare("INSERT INTO T_CONVERSATION (author_id, subject) VALUES (:author,:topic) ON DUPLICATE KEY UPDATE author_id=author_id, subject=subject");
			$result->bindValue(':author', $author);
			$result->bindValue(':topic', $topic_creat);
			$result->execute();

			// Insert ID et USER dans Participation Conversation aporès création du topic
			if ($result) {
				$pushparticipation = $connexion->prepare("INSERT INTO T_PARTICIPATION_CONVERSATION (user_id, conversation_id, unread_msg)  SELECT author_id, id_conversation,msg_unread  FROM T_CONVERSATION ON DUPLICATE KEY UPDATE user_id=author_id, conversation_id=id_conversation");
				$pushparticipation->execute();
			}
		} 
		
		else
		{
			var_dump("Topic name is empty");
		} 
	}

if (strlen($topic_creat) > 50)
	{
	var_dump($topic_creat . " " . " Nom de topic trop long, maximum 50 caractères");
	}


include 'messenger.php';



?>