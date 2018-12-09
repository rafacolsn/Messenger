<?php
session_start();
require "assets/php/connect2db.php";


$req=$connexion->prepare(
    "SELECT u.username 
    FROM T_USERS u 
    INNER JOIN T_PARTICIPATION_CONVERSATION p 
    ON u.id_user=p.user_id
    WHERE p.conversation_id=:cv_id");
$req->bindValue(':cv_id', $_GET['cv_id']);
$req->execute();

?>
<span class="invited-name">
    <?= 'participent à la conversation :'; 
        $counter_invited = 0;
        while($data=$req->fetch()) {

            echo ' '.$data['username'].' |';
          $counter_invited =  $counter_invited+1;
            
        } 

        if($counter_invited <= 1) {
        echo "<span> Total : ".$counter_invited." participant</span>";
    } 
    
    else {
        echo "<span> Total : ".$counter_invited." participants</span>";
    }
    ?>
</span>