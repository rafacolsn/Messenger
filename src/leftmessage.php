
<div class="messageleft">
    <?php     
    session_start();
    require "./assets/php/connect2db.php";
    

    $get_topics = $connexion->prepare("SELECT id_conversation, subject AS topicname, author_id FROM T_CONVERSATION ORDER BY id_conversation DESC");
    $get_topics->execute();

    while($datatopic = $get_topics->fetch() ) {
<<<<<<< HEAD
        echo utf8_encode('<a href="messenger.php?cv_id='.$datatopic['id_conversation'].'"><li class="topicleft" name="topicname">'.$datatopic['topicname'].'</li></a><br>');
=======
        echo '<a href="messenger.php?cv_id='.$datatopic['id_conversation'].'&cv_name='.$datatopic['topicname'].'"><li class="topicleft" name="topicname">'.$datatopic['topicname'].'</li></a><br>';
>>>>>>> b1bec130fcc8742e7c0239d6294e9e55d4f5c472
    };
    $get_topics->closeCursor();
    $_SESSION['cv_name'] = $_GET['cv_name'];
    ?>
    
</div>