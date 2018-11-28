<?php
    session_start();
    $username = $_SESSION['username'];
    require "assets/php/editprofile.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <div class="container">
        <div class="pseudo-profil">
            <?php echo("Profil de ".$username) ?>
        </div>
        <div class="modify-password">
        <form action="" method="post">
        <p>Modifier Mot de passe :</p>
            <input type="password" name="password" id="password">
            <p>Confirmer le nouveau mot de passe :</p>
            <input type="password" name="confirm-password" id="confirm-password">
            <input type="submit" name="change-password" id="change-password" value="Change password">
        </form>
            
        </div>
    </div>
</body>
</html>