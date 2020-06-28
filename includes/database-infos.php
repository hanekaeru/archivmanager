<?php
    
    $host = 'localhost';
    $dbname = 'projet';
    $username = 'postgres';
    $password = 'root';
    
    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
    
    try{
        $conn = new PDO($dsn);
        
        if($conn){
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }

?>