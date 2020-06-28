<?php
session_start();

require('./includes/database-infos.php');

if(isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    $idUserASuppr = $_GET['user'];

    $sql = "DELETE FROM users WHERE id = " . $idUserASuppr . ";";
    
    $conn->query($sql);

    header('Location: users.php');
}

?>