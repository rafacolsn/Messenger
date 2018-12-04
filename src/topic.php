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

if (isset($_POST['create-conv'])) // Au clique de la souris sur le boutton Create Topic
	{
	$topic_creat = $_POST['topic']; // Stockage du nom du topic encodé dans l'input
	if (strlen($topic_creat) > 25) // Si topic 
	{
	echo ($topic_creat . " " . " Nom de topic trop long, maximum 25 caractères");
	}

	if ($topic_creat !== "") // Si le titre est différent de vide
		{
			$subject = $topic_creat;
			$result = $connexion->prepare("INSERT INTO T_CONVERSATION (author_id, subject) VALUES (:author,:topic)");
			$result->bindValue(':author', $author);
			$result->bindValue(':topic', $topic_creat);
			
			$result->execute(); // Insert dans la T_CONVERSATION sujet & author_id
		} 	else
			{
				echo "<p> Topic name is empty </p>";
			} 
		}




include 'messenger.php';


?>