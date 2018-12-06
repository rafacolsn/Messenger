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

if (isset($_POST['create-conv'])) // Au clique sur le bouton 'Créer une conversation'
	{
	$topic_creat = $_POST['topic']; // Stockage de la valeur de l'input comprenant le text du titre
	
	if ($topic_creat !== "") // Si le titre est différent de "vide", envoi ceci
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
		
		else // Sinon, affiche que le topic est vide
		{
			echo "<h3> Vous devez choisir un titre de conversation </h3>";
		} 
	}

if (strlen($topic_creat) >= 25) // Longueur du titre doit être inférieur a 25 caractères
	{
	var_dump($topic_creat . " " . " Nom de topic trop long, maximum 25 caractères");
	}


include 'messenger.php'; // Rechargement de la page messenger.php lors de la création de topic
?>