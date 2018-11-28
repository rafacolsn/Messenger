<?php
session_start();
require "./assets/php/connect2db.php";


if(isset($username)) {
    if($_GET['action'] =='addmembers') {


    } elseif ($_GET['action'] =='deletemembers') {

    }
}

require 'messenger.php';

?>