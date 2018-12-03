<?php
session_start();
require "assets/php/connect2db.php";

if ($_GET['edit']) {
    $req_edit = $connexion->prepare("UPDATE T_MESSAGES SET content = :msg WHERE id_message = :msg_id");
    $req_edit->bindValue(':msg', $_POST['message']);
    $req_edit->bindValue(':msg_id', $_GET['id']);
    $req_edit->execute();
};
header("Location: messenger.php?cv_id=".intval($_SESSION['cv_id'])); // renvoie à la page de la conversation
?>