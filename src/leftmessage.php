<div class="messageleft">
    <?php     
    session_start();
    require "./assets/php/connect2db.php";
    

    $get_unread_topics = $connexion->prepare("SELECT 
                                        c.id_conversation, 
                                        c.subject AS topicname,
                                        c.author_id, 
                                        p.unread_msg,
                                        p.user_id AS u_id
                                        FROM T_CONVERSATION c
                                        INNER JOIN T_PARTICIPATION_CONVERSATION p ON c.id_conversation = p.conversation_id
                                        ORDER BY id_conversation DESC");
    
    $get_unread_topics->execute();
    
    $u_id=$_SESSION['user_id'];
    


    while($datatopic = $get_unread_topics->fetch()) {

        if ($datatopic['u_id'] == $u_id) {
            echo '
                <br>
                <a href="delete-message.php?action=delete_conv&id='.$datatopic['id_conversation'].'">
                    <i class="fa fa-close font-size:12px"></i>
                </a> 

                <a href="messenger.php?cv_id='.$datatopic['id_conversation'].'&cv_name='.$datatopic['topicname'].'">
                    <li class="topicleft" name="topicname">'.$datatopic['topicname'].'
                        <div class="notifs">'.$datatopic['unread_msg'].'</div>
                    </li>
                </a>';
        }
    };

    $get_other_topics = $connexion->prepare("SELECT 
                                                c.id_conversation, 
                                                c.subject AS topicname, 
                                                c.author_id, 
                                                p.unread_msg, 
                                                p.user_id AS u_id 
                                                FROM T_CONVERSATION c 
                                                INNER JOIN T_PARTICIPATION_CONVERSATION p 
                                                ON c.id_conversation = p.conversation_id 
                                                GROUP BY c.id_conversation");
    $get_other_topics->execute();

    while ($other_topics = $get_other_topics->fetch()) {
        echo '
            <br>
            <a href="delete-message.php?action=delete_conv&id='.$other_topics['id_conversation'].'">
                <i class="fa fa-close font-size:12px"></i>
            </a> 

            <a href="messenger.php?cv_id='.$other_topics['id_conversation'].'&cv_name='.$other_topics['topicname'].'">
                <li class="topicleft" name="topicname">'.$other_topics['topicname'].'</li>
            </a>';
    }

    $_SESSION['cv_name'] = $_GET['cv_name'];
    $get_unread_topics->closeCursor();

    ?>

</div>