<?php
    $get_messages = $connexion->prepare("SELECT m.content AS contenu, DATE_FORMAT(date_creation, '%d/%m/%Y %Hh%i') AS date_crea, u.username AS pseudo
    FROM T_MESSAGES m 
    INNER JOIN T_USERS u ON m.author_id = u.id_user 
    ORDER BY date_crea ASC");
    $get_messages->execute();
    while ($donnees = $get_messages->fetch()) {
<<<<<<< HEAD
       
         echo utf8_encode('<li class="sender"><strong>'.$donnees['pseudo'].'</strong>
         <span class="date-msg"> '.$donnees['date_modif'].'</span><br />'
         .nl2br($donnees['content']).'<br /></li>');
    }
=======
         echo '<li class="sender"><strong>'.$donnees['pseudo'].'</strong>
         <span class="date-msg"> '.$donnees['date_crea'].'</span><br />'
         .nl2br(htmlspecialchars($donnees['contenu'])).'<br /></li>';
    };
>>>>>>> 6c92b482cd2bdbe41b8ebd7977b3f3d41316a30d
    $get_messages->closeCursor();
?>