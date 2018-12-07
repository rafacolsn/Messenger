<?php

    require_once "assets/php/user.php";
    $errors = array();
    //REGISTER

    // IF REGISTER IS CLICKED
    if (isset($_POST['register-submit'])) { // On vérifie que les valeurs sont set quand on clique sur le bouton
        //On affecte un nouvel utilisateur dans une variale grâce à la class User qui permet de récupérer toutes les données dont l'utilisateur a besoin
        $user = new User($_POST['email'],$_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password']);
        $confirmPassword = ($_POST['confirm-password']); // on affecte la confirmation du pot de passe dans une variable
        // ERRORS IF EMPTY FIELD
        //Génération d'erreurs si les champs sont vides
        if (empty($user->username)) {
            array_push($errors, "Username required");
        }
        if (empty($user->email)) {
            array_push($errors, "Email required");
        }
        if (empty($user->firstname)) {
            array_push($errors, "Firstname required");
        }
        if (empty($user->lastname)) {
            array_push($errors, "Lastname required");
        }
        if (empty($user->password)) {
        array_push($errors, "Password required");
        }
        if ($user->password != $confirmPassword){
        array_push($errors, "Passwords don't match");
        }

        if (count($errors) == 0) { // On vérifie qu'il n'y a pas d'erreurs
            $password = password_hash($user->password, PASSWORD_BCRYPT); //On hash le mot de passe avec BCRYPT
            //On insère dans la table T_USERS, les données nécéssaires
            $sql = "INSERT INTO T_USERS (EMAIL,FIRSTNAME,LASTNAME,USERNAME,PASSWORD, avatar) VALUES (:email,:firstname,:lastname,:username,:password, :avatar)";
            $stmt = $connexion->prepare($sql); // On prépare la requête
            $stmt->bindValue(':email', $user->email); // On affecte l'email à la colonne email
            $stmt->bindValue(':firstname', $user->firstname); // On affecte le prénom à la colonne firstname
            $stmt->bindValue(':lastname', $user->lastname); // On affecte le nom à la colonne lastname
            $stmt->bindValue(':username', $user->username); // On affecte le pseudo à la colonne username
            $stmt->bindValue(':password', $password); // On affecte le mot de passe à la colonne password
            $stmt->bindValue(':avatar',""); // On affecte rien à la colonne avatar lors de l'inscription
    
            $result = $stmt->execute(); // On éxécute la requête
    
            if ($result) { // On vérifie que le résultat de la requête est TRUE
                header('Location: ../index.php'); // Redirection vers le login
            }
        }

    }

    //LOGIN
    if (isset($_POST['login-submit'])) { //On vérifie que les valeurs sont set
        $username = $_POST['username']; //On stocke le pseudo rentré
        $passwordAttempt = $_POST['password']; //On stocke le mot de passe rentré
        // On fait un requête pour récupérer le mot de passe et le pseudo de l'utilisateur dans la table T_USERS pour le pseudo rentré
        $sql = "SELECT id_user, username, password FROM T_USERS WHERE username = :username";
        $stmt = $connexion->prepare($sql); // On prépare la requête
        $stmt->bindValue(':username',$username); // On affecte le pseudo au pseudo de la table
        $stmt->execute(); // On éxécute la requête

        $id_user = $stmt->fetch(PDO::FETCH_ASSOC); // On fetch la requête
        if ($id_user === false || count($id_user)==0) { // On vérifie que l'id n'est pas faux ou null
            die('Incorrect username / password combination 2 !'); //On stop le script
        } else {
            
            $validPassword = password_verify($passwordAttempt,$id_user['password']); //On vérifie que le mot de passe rentré correspond au mot de passe crypté

            if ($validPassword) { // Si le mot de passe est correct
                session_start(); // On démarre la session
                $_SESSION['user_id'] = $id_user['id_user']; //On stocke l'id
                $_SESSION['logged_in'] = time(); // On stocke le fait qu'il est connecté
                $_SESSION['username'] = $username; // on stocke le pseudo
                header('Location: ../messenger.php?cv_name=Accueil');//redirection
                exit;//On stoppe la condition
            } else {
                die('Incorrect username / password combination!');// Si le mot de passe est faux, on arrête le script
            }
        }
    }

    
?>