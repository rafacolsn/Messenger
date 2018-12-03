<?php
session_start();
require "assets/php/connect2db.php";

// requête pour afficher les messages avec leurs auteurs et l'id de la conversation
$req = $connexion->prepare(
        "SELECT m.id_message AS msg_id,
        m.content AS contenu, 
        DATE_FORMAT(m.date_creation, '%d/%m/%Y %Hh%i') AS date_crea, 
        DATE_FORMAT(m.date_modif, '%d/%m/%Y %Hh%i') AS date_modif, 
        m.conversation_id AS conv_id, 
        m.author_id AS author, 
        m.unread AS unread, 
        u.username AS pseudo
        FROM T_MESSAGES m 
        INNER JOIN T_USERS u ON m.author_id = u.id_user 
        ORDER BY msg_id ASC");
        
$req->execute(); 

$_SESSION['cv_id'] = $_GET['cv_id']; //paramètre de l'url dans la boucle leftmessage.php

// on fait une boucle qui génère des balises li
while ($donnees = $req->fetch()) {  
    if ($donnees['conv_id'] == $_SESSION['cv_id']) {
        if ($donnees['author'] == $_SESSION['user_id']) {
            echo '<li class="you">
                    <strong>'.$donnees['pseudo'].'</strong>
                    <span class="date-msg"> '.$donnees['date_crea'].'</span>
                    <i class="fas fa-pencil-alt"></i>
                    <a href="delete-message.php?action=delete&id='.$donnees['id_message'].'"><i class="fas fa-trash-alt"></i></a><br />'
                    .nl2br(htmlspecialchars($donnees['contenu'])).'<br />
                </li>';
        }
        else {
            echo '<li class="sender">
                    <strong>'.$donnees['pseudo'].'</strong>
                    <span class="date-msg"> '.$donnees['date_crea'].'</span>
                    <br />'
                    .nl2br(htmlspecialchars($donnees['contenu'])).'<br />
                </li>';
        }
    }; 
};
?>