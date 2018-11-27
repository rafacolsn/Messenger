

<?php
require "./assets/php/connect2db.php";

    $get_messages = $connexion->query("SELECT content FROM T_MESSAGES");
    while ($donnees = $get_messages->fetch()) {
         echo '<li>'.$donnees['content'].'<br /></li>';
    };
?>
