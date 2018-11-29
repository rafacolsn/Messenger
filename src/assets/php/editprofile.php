<?php
    session_start();
    $username = $_SESSION['username'];
    require "assets/php/connect2db.php";

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
