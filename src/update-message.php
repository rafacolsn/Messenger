<?php
session_start();
require "assets/php/connect2db.php";

if(isset($_POST['update-message'])) {
    $req_edit = $connexion->prepare("UPDATE T_MESSAGES SET content = :msg WHERE id_message = :msg_id");
    $req_edit->bindValue(':msg', $_POST['edited-message']);
    $req_edit->bindValue(':msg_id', $_GET['id']);
    $req_edit->execute();
    
    
};
header("Location: messenger.php?cv_id=".intval($_GET['cv_id']));
?>