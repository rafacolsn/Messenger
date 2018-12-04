<?php
session_start();
require "assets/php/connect2db.php";

if ($_GET['action'] == 'delete') {
    $req_delete = $connexion->prepare("DELETE FROM T_MESSAGES WHERE id_message = :msg_id");
    $req_delete->bindValue(':msg_id', $_GET['id']);
    $req_delete->execute();
};
header("Location: messenger.php?cv_id=".intval($_SESSION['cv_id'])); // renvoie à la page de la conversation



?>