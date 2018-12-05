<?php
session_start();
require "assets/php/connect2db.php";

$count = 0;
if($_GET["action"] == "click"){
    $count++;
}
?>