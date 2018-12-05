<?php
session_start();
require "connect2db.php";

$req=$connexion->prepare("UPDATE T_USERS SET connected=true WHERE id_user = :id");
$req->bindValue(':id', $_SESSION['user_id']);
$req->execute();

$session_time = 10;

$time_diff = date ("Y-m-d H:i:s", mktime (date("H"),date("i")-$session_time,date("s"),date("m"),date("d"),date("Y")));

$req2=$connexion->prepare("UPDATE T_USERS SET connected=false WHERE time < '$time_diff'");
$req2->execute();
?>