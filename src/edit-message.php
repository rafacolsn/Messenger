<?php
session_start();
require "assets/php/connect2db.php";
$req = $connexion->prepare("SELECT content FROM T_MESSAGES WHERE id_message = :msg_id");
$req->bindValue(':msg_id', $_GET['id']);
$req->execute(); 
$donnees = $req->fetch();

if ($_GET['action'] == 'edit') {
    echo '<li class="you">
                <strong>'.$donnees['pseudo'].'</strong>
                <form action="edit-message.php" method="post">
                    <div class="send">
                        <textarea name="edit-message">'.nl2br(htmlspecialchars($donnees['content'])).'</textarea>
                        <input  name="send-edited-message" class="button-chat" type="submit" value="Send" />
                    </div>
                </form>
        <br />
    </li>';
} 


// if(isset($_POST['send-edited-message'])) {
//     $req_edit = $connexion->prepare("UPDATE T_MESSAGES SET content = :msg WHERE id_message = :msg_id");
//     $req_edit->bindValue(':msg', $_POST['message']);
//     $req_edit->bindValue(':msg_id', $_GET['id']);
//     $req_edit->execute();
// };
// header("Location: messenger.php?cv_id=".intval($_SESSION['cv_id'])); // renvoie à la page de la conversation
?>