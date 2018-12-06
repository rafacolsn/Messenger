<?php
session_start();
require "assets/php/connect2db.php";

if ($_GET['action'] == 'delete') {
    $req_delete = $connexion->prepare("DELETE FROM T_MESSAGES WHERE id_message = :msg_id");
    $req_delete->bindValue(':msg_id', $_GET['id']);
    $req_delete->execute();
};

if ($_GET['action'] == 'delete_conv') { // Lorsque l'action de l'url = "delete_conv", execute la requete SQL ci dessous
	$req_delete = $connexion->prepare("DELETE FROM T_CONVERSATION WHERE id_conversation = :conv_id");
	$req_delete->bindValue(':conv_id', $_GET['id']);
	$req_delete->execute();
};

require "assets/php/bottom.php";
header("Location: messenger.php?cv_id=".intval($_SESSION['cv_id'])); // renvoie à la page de la conversation




?>