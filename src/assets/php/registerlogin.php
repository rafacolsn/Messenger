<?php

    require_once "assets/php/user.php";
    $errors = array();
    //REGISTER

    // IF REGISTER IS CLICKEDz
    if (isset($_POST['register-submit'])) {
        $user = new User($_POST['email'],$_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password']);
        $confirmPassword = ($_POST['confirm-password']);
        // ERRORS IF EMPTY FIELD
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

        if (count($errors) == 0) {
            $password = password_hash($user->password, PASSWORD_BCRYPT); //ENCRYPT PASSWORD
            $sql = "INSERT INTO T_USERS (EMAIL,FIRSTNAME,LASTNAME,USERNAME,PASSWORD,AVATAR) VALUES (:email,:firstname,:lastname,:username,:password,:avatar)";
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue(':email', $user->email);
            $stmt->bindValue(':firstname', $user->firstname);
            $stmt->bindValue(':lastname', $user->lastname);
            $stmt->bindValue(':username', $user->username);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':avatar',""); 
    
            $result = $stmt->execute();
    
            if ($result) {
                header('Location: ../index.php');
            }
        }

    }

    //LOGIN
    if (isset($_POST['login-submit'])) {
        $username = $_POST['username']; 
        $passwordAttempt = $_POST['password'];
        $sql = "SELECT id_user, username, password FROM T_USERS WHERE username = :username";
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->execute();

        $id_user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($id_user === false || count($id_user)==0) {
            die('Incorrect username / password combination 2 !');
        } else {
            
            $validPassword = password_verify($passwordAttempt,$id_user['password']);

            if ($validPassword) {
                session_start();
                $_SESSION['user_id'] = $id_user['id_user'];
                $_SESSION['logged_in'] = time();
                $_SESSION['username'] = $username;
                header('Location: ../messenger.php');
                exit;
            } else {
                die('Incorrect username / password combination!');
            }
        }
    }

    
?>