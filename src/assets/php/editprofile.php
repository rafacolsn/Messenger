<?php
    session_start();
    $username = $_SESSION['username'];
    $id_user = $_SESSION['user_id'];
    require "assets/php/connect2db.php";


    //EDIT AVATAR
    //On vérifie que l'endroit où on sélectionne l'avatar n'est pas nul et que son nom n'est pas vide
     if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) { 
        $tailleMax = 2097152; // On défini une taille maximum au fichier d'environ 2mo
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png'); //Déclaration d'un tableau correspondant aux extensions valides pour éviter aux possible un piratage
        if ($_FILES['avatar']['size'] <= $tailleMax) { //On vérifie que la taille de l'avatar est plus petit ou égal à la taille maximum
            /* On cherche à récuperer l'extension, on va donc mettre tout le fichier en minuscule avec strtolower,
               ensuite on va récupérer l'extension gràce au substr qui va ne prendre que ce qu'il y a après le "." tout en ignorant 
               les caractère "." */
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
            if (in_array($extensionUpload,$extensionsValides)) { //On vérifie que l'extension de l'upload est une extension valide dans le tableau
                $chemin = "./assets/upload/".$_SESSION['username'].".".$extensionUpload; //On récupère le chemin pour upload le ficher + l'username + "." + l'extension
                if(!is_dir("./assets/upload/")){ //On vérifie que le dossier upload est crée dans /assets
                    mkdir("./assets/upload/"); // S'il n'est pas crée , on le crée à l'upload du fichier
                }
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin); // On boufe le fichier uploadé avec un nom temporaire dans le chemin
                if ($resultat) { // Si le résultat est true
                    $sql = "UPDATE T_USERS SET avatar = :avatar WHERE id_user = :id_user"; // On update la colone avatar de la table T_USERS
                    $updateAvatar = $connexion->prepare($sql); // on prépare la requête
                    $updateAvatar->execute(array( // on éxécute la requete en affectant comme nom d'avatar username.extension ( ex : Steve.jpg), pour le bon utilisateur gràce à l'ID
                        'avatar' => $username.".".$extensionUpload,
                        'id_user' => $id_user
                    ));
                } else {
                    echo("Erreur pendant l'upload"); // Génération d'erreur si l'upload ne passe pas
                }
            } else {
                echo("Votre photo de profil doit être au format jpg, jpeg, gif, png"); // Erreur si le format n'est pas autorisé
            }
        } else {
            echo("Votre avatar ne doit pas dépasser 2Mo"); // Erreur si la taille est trop grande
        }
    }
    // EDIT PASSWORD
    if(isset($_POST['save-password'])){// On vérifie au moment du POST sur le bouton que les valeurs sont bien set
        $password1 = $_POST['password']; // on affecte dans une variable le mot de passe
        $confirmPassword = $_POST['confirm-password']; // On affecte la confirmation du mot de passe
        if ($password1 === $confirmPassword) { // On vérifie que le mot de passe est pareil àla confirmation de mot de passe
            $cryptPassword = password_hash($password1, PASSWORD_BCRYPT); // on hash le mot de passe avec BCRYPT
            $sql = "UPDATE T_USERS SET password = :password WHERE username = '$username'"; // on fait une requête sql pour update le mot de passe
            $stmt = $connexion->prepare($sql); // On prépare la requête
            $stmt->bindValue(':password',$cryptPassword); // On affecte la valeur du mot de passe crypté dans la colone password
            $stmt->execute(); // On éxécute la requête
        }
    }
    //EDIT FIRSTNAME AND LASTNAME
    if(isset($_POST['change-names'])){ //On vérifie au moment du POST sur le bouton que les valeurs sont bien set
        $firstname = $_POST['firstname']; //On affecte le prénom dans une variable
        $lastname = $_POST['lastname']; //On affecte le nom dans une variable
        $sql = "UPDATE T_USERS SET firstname = :firstname, lastname = :lastname WHERE username = '$username'"; // Requête pour update le nom et prénom
        $stmt = $connexion->prepare($sql); // On prépare la requête
        $stmt->bindValue(':firstname',$firstname); // On affecte la nouvelle valeur dans la colonne firstname
        $stmt->bindValue(':lastname',$lastname); // On affecte la nouvelle valeur dans la colonne name
        $stmt->execute(); // On éxécute la requête
    }

    //BACK TO MESSENGER AFTER MODIFICATION
    // En appuyant sur RETOUR, on retour sur le messenger
    if (isset($_POST['back'])) {
        header('Location: ../messenger.php?cv_name=Accueil');
        exit;
    }
?>
