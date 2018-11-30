<?php 
session_start();
$username = $_SESSION['username'];
$id = intval($_SESSION['user_id']);
require "./assets/php/connect2db.php";
require "./assets/php/registerlogin.php";
require "./assets/php/editprofile.php";
$reqUser = $connexion->prepare("SELECT * FROM T_USERS WHERE id_user = $id");
$reqUser->execute();
$userInfo = $reqUser->fetch();
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>Maquette - Messenger</title>
</head>


<body>
    <div id="allchat">
        <div id="profil-topleft">
        <?php if(!empty($userInfo['avatar'])){?>
        <img src="./assets/upload/<?php echo $userInfo['avatar'];?>" alt="" class="profilchat-you">
        <?php
        }
        ?>
            <a href="myprofile.php">Mon Profil</a>
            <p class="connectedornot"><br>Connected !</p>
        </div>

        <div id="leftsettings">
            <?php require 'leftmessage.php'; ?>
        </div>


        <div id="chat-middle-output">

            <ul>
                <?php 
          
               require "get-messages.php";

            ?>

            </ul>
        </div>

        <div id="topic-message-right">
            <div id="topic-creating">

                <form action="topic.php" method="post">

                    <textarea name="topic" placeholder="Topic name..." class="form-control" id="chat"></textarea>
                    <div id="send">


                    </div>
                    <input name="create-conv" class="button-topic" type="submit" value="Create Topic" />

                </form>

                <div id="send">

                    <form action="invite.php">
                        <input type="submit" name="invite-conv" class="button-invite" value="Invite Members" />
                </div>


                </form>
                <div id="contact">
                    <?php include 'invite.php';
            ?>
                </div>
            </div>


        </div>

        <div id="messagebottom">

            <form action="post-message.php" method="post">

                <input type="text" name="message" placeholder="Write your message..." class="form-control" id="chat">
                <div id="send">

                    <input name="send-message" class="button-chat" type="submit" value="Send" />
                    <?php 
                    
                    
                    echo $username;
                    ?>
                </div>
            </form>


            </form>
        </div>
    </div>
</body>

</html>