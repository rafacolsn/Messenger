<?php
session_start();
require "react.php";

function displayMessage () {
require "assets/php/connect2db.php";

// prépare la requête pour afficher les messages avec leurs auteurs et l'id de la conversation
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



$_SESSION['cv_id'] = $_GET['cv_id']; //stockage du paramètre de l'url dans la variable de session

// on fait une boucle qui génère des balises li
while ($donnees = $req->fetch()) {  

    $msg_id = $donnees['msg_id'];
    $req_liked = $connexion->prepare("SELECT liked FROM T_REACTIONS WHERE message_id=$msg_id");
    $req_liked->execute();
    $liked = $req_liked->fetchColumn(0);
    
    
    // à la condition que l'id de la conversation soit égal à celui de la session
    if ($donnees['conv_id'] == $_SESSION['cv_id']) {
        
        // si auteur du msg = user connecté class "you" sinon "sender"
        // nl2br permet de garde les retours à la ligne du message et htmlspecialchars d'empêcher les injonctions de code
        if ($donnees['author'] == $_SESSION['user_id']) { 

            echo '
                <div class="you-container">
                
                    <img class ="profilchat display-you" src="assets/upload/'.$donnees['avatar'].'"/>
                        <li class="you">'
                            .nl2br(htmlspecialchars($donnees['contenu'])).'
                        </li>
                        <div class="date-container">
                            <span class="pseudo">envoyé par '.utf8_encode($donnees['pseudo']).'</span>';
                                //utf8 encode permet de conserver les accents
                                // si la date de modif des messages est pas = à créa on rajoute un "modifié" avant la date
                                if($donnees['date_modif'] != $donnees['date_crea']) { 
                                    echo '<span class="date-msg modif"> modifié </span>';
                                };
                                // affiche la date du msg et les icônes d'édition et de suppression
                                echo '
                                    <span class="date-msg">le '
                                        .$donnees['date_modif'].'
                                        
                                        <a href="messenger.php?action=edit&id='.$donnees['msg_id'].'"> 
                                            <i class="fas fa-pencil-alt"></i> 
                                        </a>

                                        <a href="delete-message.php?action=delete&id='.$donnees['msg_id'].'">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <i  style="color:rgb(224, 101, 0)" class="far fa-thumbs-up">   '.$liked.'</i>
                                    </span>
                        </div>
                </div>'; 
        }
        // affiche les msg des autres users avec la classe sender
        else {

            
            echo '
                <div class="sender-container">
                    <img class ="profilchat display-sender" src="assets/upload/'.$donnees['avatar'].'"/>
                        <li class="sender">'
                            .nl2br(htmlspecialchars($donnees['contenu'])).'
                        </li>
                        <div class="date-container-sender">
                            <span class="pseudo">envoyé par '.utf8_encode($donnees['pseudo']).'</span>';
                                
                                if($donnees['date_modif'] != $donnees['date_crea']) { 
                                    echo '<span class="date-msg modif"> modifié le </span>';
                                };
                                // ici pas besoin d'icônes d'édition et de suppression mais bien une icône pour liker
                                echo '
                                    <span class="date-msg">le '.$donnees['date_modif'].'</span>
                                <a href="messenger.php?cv_id='.$_SESSION['cv_id'].'&cv_name='.$_SESSION['cv_name'].'&action=react&id='.$donnees['msg_id'].'">
                                    <i class="far fa-thumbs-up">  '.$liked.'</i> 
                                </a>
                        </div>
                </div>';
                            
                // on stocke les l'id de conversation et de l'user pour (re)mettre à jour dans la db la valeur des msg non-lus à 0 puisque l'user est censé avoir tout lu une fois que c'est affiché
            $cv_id = $_SESSION['cv_id'];
            $u_id= $_SESSION['user_id'];
            $req2=$connexion->prepare("UPDATE T_PARTICIPATION_CONVERSATION SET unread_msg=0 WHERE user_id=$u_id AND conversation_id=$cv_id");
            $req2->execute();
                            
        }
    }; 
};
}
// messages d'accueil pour quand on n'a pas encore cliqué sur une conversation
function accueil() {
    echo '
                    <li class="sender">
                        <strong> BigChat </strong><br/>
                       <p> Bienvenue sur BigChat, humain</p>                       
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
                                <li> Vous devez d'abord créer une conversation </li> <br>
                                <li> Ensuite cliquez sur la conversation créée sur votre gauche </li> <br> 
                                <li> Il ne vous reste plus qu'à inviter vos membres  </li><br>  
                                <li> Vous ne pouvez supprimer que les conversations que vous avez créées </li><br>
                                <li> Pour modifier votre mot de passe et mettre une photo, cliquez sur 'Votre Profil' en haut, à gauche </li><br> 
                                <li> Vous ne pouvez pas inviter sur le topic 'Bienvenue sur Bigchat' </li><br>
                                <li> Vous pouvez éditer vos messages envoyés en cliquant sur le petit crayon d'édition</li><br>
                                <li> Vous pouvez supprimer vos messages en cliquant sur la petite poubelle </li><br>
                            <ol/>                  
                    </li>";
}
require "assets/php/bottom.php";
?>