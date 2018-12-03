<?php
session_start();
require "assets/php/connect2db.php";
$req = $connexion->prepare("SELECT content, conversation_id FROM T_MESSAGES WHERE id_message = :msg_id");
$req->bindValue(':msg_id', $_GET['id']);
$req->execute(); 
$donnees = $req->fetch();

if ($_GET['action'] == 'edit') {
    echo '<li class="you">
                <strong>'.$donnees['pseudo'].'</strong>
                <form action="update-message.php?id='.$_GET['id'].'&cv_id='.$donnees['conversation_id'].'" method="post">
                    <div class="send">
                        <textarea name="edited-message">'.nl2br(htmlspecialchars($donnees['content'])).'</textarea>
                        <input name="update-message" class="button-chat" type="submit" value="Send" />
                    </div>
                </form>
        <br />
    </li>';
} 




?>