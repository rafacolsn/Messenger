<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>MEssenger</title>

<body>

    <?php 
   //CONNECT TO DB
   try {
    $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("Connected successfully");
       }  
    catch (PDOException $e) {
    echo("Connection failed".$e->getMessage());
       }

?>


    <div id="profil">

    </div>


    <div id="allmessage">


    </div>

    <div id="conversations">
        <form method="post" action="">
            <div id="messaging">
                <div id="conv">
                    <p> <strong>You : </strong> Hello !</p>
                    <p> <strong>Andy : </strong> J'ai faim</p>
                    <p> <strong>Raphaël : </strong>Base de donnée, base de donnée,..</p>
                    <p> <strong>Steve : </strong> Boushaba ?</p>
                </div>
            </div>
            <textarea class="area" type="text" name="message" placeholder="test"> </textarea> <br>

            <div id="send">
                <input type="submit" value="Send" />

            </div>
        </form>



    </div>
</body>

</html>