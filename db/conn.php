<?php
    $host = 'remotemysql.com';
    $db = 'mydWv8PXx5';
    $user = 'mydWv8PXx5';
    $pass= 'yct1hsjzXd';
    $charset = 'utf8mb4';

    // $host = 'remotemysql.com';
    // $db = 'Jc4Cc2q4gX';
    // $user = 'Jc4Cc2q4gX';
    // $pass= 'nhqMxbQDsK';
    // $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try
    {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    }
    catch(PDOException $e)
    {
        throw new PDOException($e->getmessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    //$user->insertUser("admin", "password");
?>