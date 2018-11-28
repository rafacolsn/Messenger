<?php
session_start();
$username = $_SESSION['username'];
require "./assets/php/connect2db.php";

require "./assets/php/registerlogin.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../assets/js/autoScrollToBottom.js"></script>
    <link rel="stylesheet" href="./assets/css/messenger.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <title>Maquette - Messenger</title>
</head>


<body>
    <div id="allchat">
        <div id="profil-topleft"><img src="https://avatars1.githubusercontent.com/u/42454363?s=400&u=1acfd527896d6fcd3a6f3aa2ab2a1e0be01a162f&v=4"
                alt="" class="profilchat-you">
            <p class="connectedornot"><br>
                <?php echo $username;?>
            </p>
        </div>

        <div id="leftsettings">
            <ul>
                <?php
echo "<h1 style=color:Red;font-size:15px;font-weight:700> Conversation </h1>";
require 'leftmessage.php';
?>
            </ul>
        </div>

        <div id="chat-middle-output">

            <ul>
                <?php

//    require "get-messages.php";


require "chat.php";

?>

            </ul>
        </div>

        <div id="topic-message-right">
            <div id="topic-creating">

                <form action="topic.php" method="post">

                    <textarea name="topic" placeholder="Topic name..." class="form-control" id="chat"></textarea>
                    <div id="send">


                    </div>
                    <input name="create-conv" class="button-topic" name="subject" type="submit" value="Create Topic" />

                </form>

                <div id="send">
                    <form action="">
                        <a href="?action=addmembers"> Add Members </a>
                        <a href="?action=deletemembers"> Delete Members </a>
                        <input type="submit" name="invite-conv" href="?action=addmembers" class="button-invite" value="Invite Members" />
                </div>


                </form>
                <div id="contact">
                    <li class='online'>Online</li>

                </div>
            </div>


        </div>

        <div id="messagebottom">

            <form action="post-message.php" method="post">

                <textarea name="message" placeholder="Write your message..." class="form-control" id="chat"></textarea>
                <div id="send">

                    <input name="send-message" class="button-chat" type="submit" value="Send" />

                </div>
            </form>


            </form>
        </div>
    </div>

</body>

</html>