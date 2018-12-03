<?php
session_start();
require_once "leftmessage.php";

$conv_id = $_SESSION['topic'];
require "display-messages.php";
?>