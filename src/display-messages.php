<?php
require "assets/php/connect2db.php";
require "messages-manager.php";

$msg_db = new MessagesManager($connexion);
$msg_db->getList();
echo
'<li class="sender">
    <strong>'.$donnees['pseudo'].'</strong>
    <span class="date-msg"> '.$donnees['date_crea'].'</span>
    <i class="fas fa-pencil-alt"></i><br />'
    .nl2br(htmlspecialchars($donnees['contenu'])).'<br />
</li>';

?>