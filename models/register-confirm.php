<?php

    require_once('../includes/database-infos.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirm'];
    $date = date("d.m.y");
    $role = "visualisation";

    if($password != $password_confirm) {
        header('Location: ../register.php?error=wrong_pass');
    } else {
        $hashed_password = md5($password);
        $inscrire_utilisateur = "INSERT INTO users(username, email, password, inscription_date, role_user) VALUES ('" . $username . "', '" . $email . "', '" . $hashed_password . "', '" . $date . "', '" . $role . "');";
        $conn->query($inscrire_utilisateur);

        header('Location: ../login.php?success=registred');
    }

?>