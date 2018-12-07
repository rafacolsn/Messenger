<?php
session_start();
require "react.php";

function displayMessage () {
require "assets/php/connect2db.php";
// requête pour afficher les messages avec leurs auteurs et l'id de la conversation
$req = $connexion->prepare(
        "SELECT m.id_message AS msg_id,
        m.content AS contenu, 
        DATE_FORMAT(m.date_creation, '%d/%m/%Y %Hh%i') AS date_crea, 
        DATE_FORMAT(m.date_modif, '%d/%m/%Y %Hh%i') AS date_modif, 
        m.conversation_id AS conv_id, 
        m.author_id AS author, 
        u.username AS pseudo,
        u.avatar
        FROM T_MESSAGES m 
        INNER JOIN T_USERS u ON m.author_id = u.id_user 
        ORDER BY msg_id ASC");
        
$req->execute(); 

$_SESSION['cv_id'] = $_GET['cv_id']; //paramètre de l'url dans la boucle leftmessage.php

// on fait une boucle qui génère des balises li
while ($donnees = $req->fetch()) {  
    
    if ($donnees['conv_id'] == $_SESSION['cv_id']) {
    
        if ($donnees['author'] == $_SESSION['user_id']) { // si auteur du msg = user connecté class "you" sinon "sender"
            echo '
                <div class="you-container">
                    <img class ="profilchat-you display-you" src="assets/upload/'.$donnees['avatar'].'"/>
                        <li class="you">'
                            .nl2br(htmlspecialchars($donnees['contenu'])).'
                        </li>
                        <div class="date-container">
                            <span class="pseudo">envoyé par '.utf8_encode($donnees['pseudo']).'</span>';
                                
                                if($donnees['date_modif'] != $donnees['date_crea']) { 
                                    echo '<span class="date-msg modif"> modifié </span>';
                                };
                                
                                echo '
                                    <span class="date-msg">le '
                                        .$donnees['date_modif'].'
                                        
                                        <a href="messenger.php?action=edit&id='.$donnees['msg_id'].'"> 
                                            <i class="fas fa-pencil-alt"></i> 
                                        </a>

                                        <a href="delete-message.php?action=delete&id='.$donnees['msg_id'].'">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </span>
                        </div>
                </div>'; 
        }
        else {
            echo '
                <div class="sender-container">
                    <img class ="profilchat-sender display-sender"src="assets/upload/'.$donnees['avatar'].'"/>
                        <li class="sender">'
                            .nl2br(htmlspecialchars($donnees['contenu'])).'
                        </li>
                        <div class="date-container-sender">
                            <span class="pseudo">envoyé par '.utf8_encode($donnees['pseudo']).'</span>';
                                
                                if($donnees['date_modif'] != $donnees['date_crea']) { 
                                    echo '<span class="date-msg modif"> modifié le </span>';
                                };
                                
                                echo '
                                    <span class="date-msg">le '.$donnees['date_modif'].'</span>
                                <a href="react.php?action=react&id='.$donnees['msg_id'].'">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                        </div>
                </div>'; 
            $cv_id = $_SESSION['cv_id'];
            $u_id= $_SESSION['user_id'];
            $req2=$connexion->prepare("UPDATE T_PARTICIPATION_CONVERSATION SET unread_msg=0 WHERE user_id=$u_id AND conversation_id=$cv_id");
            $req2->execute();
        }
    }; 
};
}
function accueil() {
    echo '
                    <li class="sender">
                        <strong> BigChat </strong><br/>
                       <p> Bienvenu sur BigChat, humain</p>                       
                    </li>';

                    echo '
                    <li class="sender">
                        <strong> BigChat </strong><br/>
                       <p> Voici un petit guide sur mon utilisation</p>                       
                    </li>';
              
                   echo  "
                   <li class='sender'>
                        <strong> Big Chat </strong><br/><br/>
                        <ol>
                       <li> Vous devez d'abord crée une conversation </li> <br>
                      <li> Ensuite cliquer sur la conversation crée sur votre gauche </li> <br> 
                      <li> Il ne vous reste plus qu'à inviter vos membres  </li>  
                      <br>   
                      <li> Vous ne pouvez supprimer que les conversations que vous avez crée </li>
                      <br>
                      <li> Pour modifier votre mot de passe et mettre une photo, cliquez sur 'Votre Profil' en haut, a gauche </li>
                     <br> 
                     <li> Vous ne pouvez pas inviter sur le topic 'Bienvenu sur Bigchat' </li>
                     <li> Vous pouvez éditer vos messages envoyer en cliquant sur le petit crayon d'édition</li>
                     <li> Vous pouvez supprimer vos messages en cliquant sur la petite poubelle </li>
            
                      <ol/>                  
                    </li>";
}

require "assets/php/bottom.php";
?>