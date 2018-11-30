<?php
session_start();
require "assets/php/connect2db.php";
require_once "messages.php";

// requête pour afficher les messages avec leurs auteurs et l'id de la conversation
$req = $connexion->prepare(
        "SELECT m.content AS contenu, 
        DATE_FORMAT(m.date_creation, '%d/%m/%Y %Hh%i %s') AS date_crea, 
        DATE_FORMAT(m.date_modif, '%d/%m/%Y %Hh%i %s') AS date_modif, 
        m.conversation_id AS conv_id, 
        m.author_id AS author, 
        m.unread AS unread, 
        u.username AS pseudo
        FROM T_MESSAGES m 
        INNER JOIN T_USERS u ON m.author_id = u.id_user 
        ORDER BY date_crea ASC");
        
        $req->execute(); 
        $conv_id = $_GET['cv_id']; //à remplacer par un $_SESSION['topic'] ?
    
        // on fait une boucle qui génère des balises li
        while ($donnees = $req->fetch()) {  
            if ($donnees['conv_id'] == $conv_id) {
                    if ($donnees['author'] === $_SESSION['user_id']) {
                    echo '<li class="you">
                                <strong>'.$donnees['pseudo'].'</strong>
                                <span class="date-msg"> '.$donnees['date_crea'].'</span>
                                <i class="fas fa-pencil-alt"></i><br />'
                                .nl2br(htmlspecialchars($donnees['contenu'])).'<br />
                        </li>';
                    }
                    else {
                        echo '<li class="sender">
                            <strong>'.$donnees['pseudo'].'</strong>
                            <span class="date-msg"> '.$donnees['date_crea'].'</span>
                            <i class="fas fa-pencil-alt"></i><br />'
                            .nl2br(htmlspecialchars($donnees['contenu'])).'<br />
                        </li>';
                    }
            }; 
        };
?>