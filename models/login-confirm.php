<?php
    session_start();
    require_once('../includes/database-infos.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_user = "SELECT * FROM users WHERE username = '" . $username . "';";

    if ($res = $conn->query($check_user)) {

        if ($res->fetchColumn() > 0) {
    
            foreach ($conn->query($check_user) as $row) {

                if(md5($password) == $row['password']) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role_user'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
        
                    header('Location: ../home.php');
                } else {
                    header('Location: ../login.php?error=wrong_password');
                }
            }
        } else {
            header('Location: ../login.php?error=no_user');
        }
    }
    
?>