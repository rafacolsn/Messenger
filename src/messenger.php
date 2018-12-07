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
        <!-- Grid de toutes la page -->
        <div id="profil-topleft">
            <?php if(!empty($userInfo['avatar'])):?>
            <a href="myprofile.php"><img src="./assets/upload/<?php echo $userInfo['avatar'];?>" alt="" class="profilchat"></a>
            <?php else:?>
            <a href="myprofile.php"><img src="./assets/img/avatar.png" alt="avatar" class="profilchat"></a>
            <?php endif;?>
            <a href="myprofile.php">
                <?php echo $username ?><br>Votre profil</a>
        </div>

        <div id="leftsettings">
            <!-- Affichage des conversation à gauche de la page -->

            <?php
                echo "<h3 class='topic-title-left'>Conversation</h3>";
                if ($_GET['action'] == 'delete_conv') { // Si clique sur la croix, suppression de la conversation
                    require "delete-message.php"; // Appel du fichier delete-message supprimant la conversation dans la base de donnée
                }
                require 'leftmessage.php'; // Appel du fichier leftmessage comportant l'appel de la liste des conversations
            ?>
            <form action="messenger.php?cv_name=Accueil" method="post">
                <!-- Redirection vers page d'accueil au clique sur l'input 'backhome' ci dessous-->
                <input name="backhome" class="button-left" type="submit" value="Accueil" />
            </form>
        </div>

    <div id="topic-output-chat">
            <!-- Nom de la conversation ou l'on est, au dessus du chat -->

            <?php 
                    if($_GET['cv_name'] == 'Accueil') {
                    // Si présent sur aucune conversation, affiche le message ci dessous
                        echo "<h1> Bienvenu sur BigChat</h1>";
                    } 
                    
                    else {
                        //sinon affiche le nom de la conversation en titre h1
                        echo "<h1>".$_SESSION['cv_name']."</h1>";
                        // requête pour afficher le nom du créateur du topic
                        $convcreatedby = $connexion->prepare(
                                                    "SELECT tu.username, 
                                                    tc.subject 
                                                    FROM T_USERS tu 
                                                    JOIN T_CONVERSATION tc 
                                                    ON tu.id_user = tc.author_id 
                                                    WHERE tu.id_user = tc.author_id");
                        $convcreatedby->execute();

                        while ($createdby = $convcreatedby->fetch()) {
                            // affiche le créateur du topic
                            if($_GET['cv_name'] == $createdby['subject']) {
                                echo "
                                    <div class='created-by'>
                                        <p>Crée par ". $createdby['username'] ." 
                                        </p>
                                    </div> ";
                            }
                        }
                    }
             ?>
             <div class="invited"><?php require "assets/php/invited-people.php"?></div>
        </div>

        <div id="chat-middle-output">
            <!-- DIV qui affiche les messages, au centre du site-->

            <ul>
                <?php 
                    require "display-messages.php";

                        if ($_GET['action'] == 'edit') {
                            require "edit-message.php";
                        }

            
                        if($_GET['cv_name'] != "Accueil") { // Si l'url de la conversation est vide, affichera le message d'accueuil
                            displayMessage(); 
                        } else {
                            accueil();
                        }
                ?>
            </ul>
        </div>

        <div id="topic-message-right">
            <!-- Colone de droite, Membre en ligne, création de topic -->


            <div class="contact">
                <!-- Liste des membres -->
                <h2 class=" topic-title-left"> Membres </h2>

                <form action="#" method="post">
                    <?php
                        require_once 'function-invite.php';
                        allmembers(); // Fonction de récuperation de tout les membres, présent dans le fichier function-invite.php
                    ?>
                </form>

            </div>
            <div id="topic-creating">
                <!-- Création de topic -->

                <form action="topic.php" method="post">
                    <!-- Au clique sur l'input create-conv ci dessous, redirige sur fichier topic.php qui envoi nom de la conversation, et l'user dans la base de donnée -->
                    <textarea name="topic" placeholder="Votre conversation..." class="form-control" id="chat"></textarea>
                    <input name="create-conv" class="button-topic" type="submit" value="Créer une conversation" />
            </div>
            </form>

             <?php
                    if ($_SESSION['topicempty']  == ""){
                
                        echo "<br> <h3 class='topic-title-left'> <strong> Vous devez choisir un titre de conversation </strong></h3>";
                    } 
                ?>

            <form action="./assets/php/disconnect.php" method="post">
                <!-- Au clique sur l'input disconnect ci dessous, renvoi vers la page disconnect.php qui detruit la session en cours -->
                <input name="disconnect" class="button-disconnect" type="submit" value="Deconnexion" /></a>
            </form>
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

    <!-- Src de tout les dossier lié a la librairie EMOJI -->

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