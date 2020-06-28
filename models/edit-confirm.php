<?php
    session_start();
    require_once('../includes/database-infos.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_POST['idUser'];
    $role = $_POST['role'];

    $update_user = "UPDATE users
    SET username = '" . $username . "',
    email = '" . $email . "',
    password = '" . $password . "',
    role_user = '" . $role . "'
    WHERE id = " . $id  . ";";

    echo $update_user;

    $conn->query($update_user);
    
    header('Location: ../users.php');
    
?>