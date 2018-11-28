
<div class="messageleft">
    <?php     
    session_start();
    require "./assets/php/connect2db.php";
    

    $get_topics = $connexion->prepare("SELECT subject AS topicname FROM T_CONVERSATION");
    $get_topics->execute();

    while($datatopic = $get_topics->fetch() ) {

        echo '<li class="topicleft">'.$datatopic['topicname'].'</li><br>';

    };

    $get_topics->closeCursor();

                ?>
            </div>