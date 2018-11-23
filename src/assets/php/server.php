<?php

    $username = "";
    $email = "";
    $firstname = "";
    $lastname = "";
    $errors = array();
    //CONNECT TO DB
    try {
        $connexion = new PDO("mysql:host=mysql;dbname=messenger", "messenger", "messenger");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo("Connected successfully");
    } catch (PDOException $e) {
        echo("Connection failed".$e->getMessage());
    }
    // IF REGISTER IS CLICKEDz
    if (isset($_POST['register-submit'])) {
        $username = ($_POST['username']);
        $email = ($_POST['email']);
        $firstname = ($_POST['firstname']);
        $lastname = ($_POST['lastname']);
        $password1 = ($_POST['password']);
        $confirmPassword = ($_POST['confirm-password']);
    }
    // ERRORS IF EMPTY FIELD
    if (empty($username)) {
        array_push($errors, "Username required");
    }
    if (empty($email)) {
        array_push($errors, "Email required");
    }
    if (empty($firstname)) {
        array_push($errors, "Firstname required");
    }
    if (empty($lastname)) {
        array_push($errors, "Lastname required");
    }
    if (empty($password1)) {
        array_push($errors, "Password required");
    }
    if ($password1 != $confirmPassword){
        array_push($errors, "Passwords don't match");
    }


    // IF NO ERRORS
    if (count($errors) == 0) {
        $password = password_hash($password1, PASSWORD_BCRYPT); //ENCRYPT PASSWORD
        $sql = "INSERT INTO T_USERS (EMAIL,FIRSTNAME,LASTNAME,USERNAME,PASSWORD) VALUES (:email,:firstname,:lastname,:username,:password)";
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);

        $result = $stmt->execute();

        if ($result) {
            echo("GG for registration");
        }
    }
?>