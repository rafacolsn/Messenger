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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/messenger.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/emoji.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <title>Maquette - Messenger</title>
</head>


<body>
    <div id="allchat">
        <div id="profil-topleft">
            <?php if(!empty($userInfo['avatar'])):?>
            <a href="myprofile.php"><img src="./assets/upload/<?php echo $userInfo['avatar'];?>" alt="" class="profilchat-you"></a>
            <?php else:?>
            <a href="myprofile.php"><img src="./assets/img/avatar.png" alt="avatar" class="profilchat-you"></a>
            <?php endif;?>
            <a href="myprofile.php">
                <?php echo $username ?><br>Votre profil</a>
        </div>

        <div id="leftsettings">

            <?php
                echo "<h3 class='topic-title-left'>Conversation</h3>";
                if ($_GET['action'] == 'delete_conv') {
                    require "delete-message.php";
                }
                require 'leftmessage.php';
            ?>
        <form action="messenger.php" method="post">
                <input name="backhome" class="button-left" type="submit" value="Accueil" />
                </form>
        </div>

        <div id="topic-output-chat">

            <?php 
                

            if($_GET['cv_id'] == NULL || $_GET['cv_name'] == NULL ) {
                echo "<h1> Bienvenu sur BigChat</h1>";
               
            } else {
              echo "<h1>". $_SESSION['cv_name'] . "</h1>";
              echo "<br> <p class='created-by'> Crée par ". $username ." </p> ";
            }

             ?>
        </div>

        <div id="chat-middle-output">

            <ul>

            
                <?php 


                if ($_GET['action'] == 'edit') {
                    require "edit-message.php";
                }

                require "display-messages.php";
                if($_SESSION['cv_id'] == "") { 
                    echo '
                    <li class="sender">
                        <strong> Big Chat </strong><br/>
                       <p> Bienvenu sur Big Chat </p>                       
                    </li>';

                   echo  "
                   <li class='sender'>
                        <strong> Big Chat </strong><br/><br/>
                        <ol>
                       <li> Vous devez d'abord crée une conversation </li> <br>
                      <li> Ensuite cliquer sur la conversation crée sur votre gauche </li> <br> 
                      <li> Il ne vous reste plus qu'à inviter vos membres  </li>  
                      <br>   
                      <ol/>                  
                    </li>";
                }
                ?>
            </ul>
        </div>

        <div id="topic-message-right">


            <div class="contact">
                <h2 class=" topic-title-left"> Membres </h2>

                <form action="#" method="post">
                    <?php
                        require_once 'function-invite.php';
                        allmembers();
                    ?>
                </form>

            </div>
            <div id="topic-creating">

                <form action="topic.php" method="post">
                    <textarea name="topic" placeholder="Votre conversation..." class="form-control" id="chat"></textarea>
                    <input name="create-conv" class="button-topic" type="submit" value="Créer une conversation" />
            </div>

            </form>
            <form action="" method="post">

                <input name="disconnect" class="button-disconnect" type="submit" value="Deconnexion" />
                </form>
                    <?php
                        if(isset($_POST['disconnect'])) {
                
                        session_destroy();
                        echo " <br> <h3 class='topic-title-left'>Vous avez été deconnecté</h3>";
                            
                        }

                    ?>
        </div>
        
       
        <div class="send">
            <form action="post-message.php" method="post">
                <div id="messagebottom">

                    <div class=emo>
                        <textarea data-emojiable="true" name="message" placeholder="Exprimez-vous..." class="form-control"
                            id="chat"></textarea>
                        <input name="send-message" class="button-chat" type="submit" value="Envoi" />
                    </div>

                </div>
      
        </form>
        </div>
  
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/jquery.emojiarea.js"></script>
    <script src="assets/js/emoji-picker.js"></script>
    <script>
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: 'assets/img',
            popupButtonClasses: 'fa fa-smile-o'
        });


        // Finds all elements with emojiable_selector and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again


        window.emojiPicker.discover();
    </script>
</body>

</html>