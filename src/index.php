<?php 

require "connexion.php";


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="js/autoScrollToBottom.js" type="text/javascript"></script>
    <title>Messenger</title>
</head>
<body>

    <div id="allchat">
        <div id="profil-topleft"><img src="https://avatars1.githubusercontent.com/u/42454363?s=400&u=1acfd527896d6fcd3a6f3aa2ab2a1e0be01a162f&v=4"
                alt="" class="profilchat-you">
            <p class="connectedornot"><br>Connected !</p>
        </div>

        <div id="leftsettings">
            <div class="messageleft">
                <div class="messageboxleft">
                    <img src="https://avatars0.githubusercontent.com/u/32648214?s=400&v=4" alt="" class="profilchat">
                    <strong>Andy : </strong>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi totam corrupti quis id odit
                        sequi veritatis molestiae laboriosam tenetur temporibus in deleniti earum quos eius debitis aut
                        recusandae, vero perferendis. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe
                        repellendus at possimus reprehenderit, similique inventore recusandae neque eaque voluptate
                        quibusdam, totam itaque quisquam dicta enim tenetur impedit consectetur vero culpa! LOL et moi
                        donc Lorem ipsum dolor, sit amet consectetur
                    </p>
                </div>
            </div>

            <div class="messageleft">
                <div class="messageboxleft">
                    <img src="https://avatars0.githubusercontent.com/u/32648214?s=400&v=4" alt="" class="profilchat">
                    <strong>Andy : </strong>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi totam corrupti quis id odit
                        sequi veritatis molestiae laboriosam tenetur temporibus in deleniti earum quos eius debitis aut
                        recusandae, vero perferendis. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe
                        repellendus at possimus reprehenderit, similique inventore recusandae neque eaque voluptate
                        quibusdam, totam itaque quisquam dicta enim tenetur impedit consectetur vero culpa! LOL et moi
                        donc Lorem ipsum dolor, sit amet consectetur
                    </p>
                </div>
            </div>



        </div>

    
        <div id="chat-middle-output">
            
            <ul>
               <?php require "get-messages.php" ?>
            </ul>


        </div>


        <div id="connected-right">
        </div>
    
        <div id="messagebottom">

            <form action="post-message.php" method="post">

                <textarea name="message" placeholder="Write your message..." class="form-control" rows="7" id="chat"></textarea>
                <div id="send">

                    <input name="send-message" class="button-conv" type="submit" value="Send" />
                </div>
            </form>
        </div>

        

</body>

</html>
