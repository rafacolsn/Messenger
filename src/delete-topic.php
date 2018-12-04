<?php
session_start();
require "assets/php/connect2db.php";

if ($_GET['action'] == 'delete_conv') {
	$req_delete = $connexion->prepare("DELETE FROM T_CONVERSATION WHERE id_conversation = :conv_id");
	$req_delete->bindValue(':conv_id', $_GET['id']);
	$req_delete->execute();
};

header("Location: messenger.php?cv_id=".intval($_SESSION['cv_id'])); // renvoie à la page de la conversation
?>