<?php

$host = 'localhost';
$dbname = 'student_db';
$username = 'root'; 
$password = '';    

try {
    // 1. The DSN (Data Source Name) tells PDO where to connect.
    $dsn = "mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4";
    
    // 2. Instantiate the PDO object.
    $pdo = new PDO($dsn, $username, $password);
    
    // 3. Set error mode to Exception so it throws errors we can catch.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo ;
    
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>