<?php
    session_start();
    $username = $_SESSION['username'];
    $id_user = $_SESSION['user_id'];
    require "assets/php/connect2db.php";


     //EDIT AVATAR
     if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
            if (in_array($extensionUpload,$extensionsValides)) {
                $chemin = "./assets/upload/".$_SESSION['username'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                if ($resultat) {
                    $sql = "UPDATE T_USERS SET avatar = :avatar WHERE id_user = :id_user";
                    $updateAvatar = $connexion->prepare($sql);
                    $updateAvatar->execute(array(
                        'avatar' => $username.".".$extensionUpload,
                        'id_user' => $id_user
                    ));
                } else {
                    echo("Erreur pendant l'upload");
                }
            } else {
                echo("Votre photo de profil doit être au format jpg, jpeg, gif, png");
            }
        } else {
            echo("Votre avatar ne doit pas dépasser 2Mo");
        }
    }
    // EDIT PASSWORD
    if(isset($_POST['save-password'])){
        $password1 = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        if ($password1 === $confirmPassword) {
            $cryptPassword = password_hash($password1, PASSWORD_BCRYPT);
            $sql = "UPDATE T_USERS SET password = :password WHERE username = '$username'";
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue(':password',$cryptPassword);
            $stmt->execute();
        }
    }
    //EDIT FIRSTNAME AND LASTNAME
    if(isset($_POST['change-names'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sql = "UPDATE T_USERS SET firstname = :firstname, lastname = :lastname WHERE username = '$username'";
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue(':firstname',$firstname);
        $stmt->bindValue(':lastname',$lastname);
        $stmt->execute();
    }
?>
