<?php
session_start();
require "./assets/php/connect2db.php";


if(isset($username)) {
    if($_GET['action'] =='addmembers') {

    } elseif ($_GET['action'] =='deletemembers') {

    }
}

echo ("<h1 class='topic-name-chat'>".$subject."</h1>");
      
?>