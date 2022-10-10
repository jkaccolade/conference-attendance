<?php
    //Development Connection
    // $host = 'localhost';
    // $db = 'attendee_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';
    // $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    //Remote Connection
    $host = 'remotemysql.com';
    $db = 'qaIpIVCjR9';
    $user = 'qaIpIVCjR9';
    $pass = 'tUZAiqhBOI';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    try {
        $pdo = new PDO($dsn,$user,$pass);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    //To require the CRUD file
    require_once 'crud.php';
    //To create a new instance of the crud class that was defined in the crud file
    $crud = new crud($pdo);
?>