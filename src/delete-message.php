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

function topictitle(){
    $convcreatedby = $connexion->prepare("SELECT tu.username, tc.subject FROM T_USERS tu JOIN T_CONVERSATION tc ON tu.id_user = tc.author_id WHERE tu.id_user = tc.author_id");

    $convcreatedby->execute();

    while( $createdby = $convcreatedby->fetch() ) { 

      if($_GET['cv_name'] == $createdby['subject']) {    

         if($_GET['cv_name'] == 'Accueil' ) { // Si présent sur aucune conversation, affiche le message ci dessous
              echo "<h1> Bienvenu sur BigChat</h1>";
             
         } else {
         
            echo "<h1>". $_SESSION['cv_name'] . "</h1>";
            echo "<br> <p class='created-by'> Crée par ". $createdby['username'] ." </p> ";
         }
    }
    }
}



?>