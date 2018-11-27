<?php
    $get_messages = $connexion->prepare("SELECT m.content, m.date_modif AS date_modif, u.username AS pseudo
    FROM T_MESSAGES m 
    INNER JOIN T_USERS u ON m.author_id = u.id_user 
    ORDER BY date_modif ASC");
    $get_messages->execute();
    while ($donnees = $get_messages->fetch()) {
       
         echo utf8_encode('<li class="sender"><strong>'.$donnees['pseudo'].'</strong>
         <span class="date-msg"> '.$donnees['date_modif'].'</span><br />'
         .nl2br($donnees['content']).'<br /></li>');
    }
    $get_messages->closeCursor();
?>