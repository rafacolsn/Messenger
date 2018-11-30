
<div class="messageleft">
    <?php     
    session_start();
    require "./assets/php/connect2db.php";
    

    $get_topics = $connexion->prepare("SELECT id_conversation, subject AS topicname FROM T_CONVERSATION ORDER BY id_conversation DESC");
    $get_topics->execute();

    while($datatopic = $get_topics->fetch() ) {
        echo '<a href="messenger.php?cv_id='.$datatopic['id_conversation'].'"><li class="topicleft" name="topicname">'.$datatopic['topicname'].'</li></a><br>';
        
       
        

    };

    $get_topics->closeCursor();
    ?>
</div>