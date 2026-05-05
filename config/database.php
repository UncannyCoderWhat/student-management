<?php

$host = 'localhost';
$dbname = 'student_db';
$username = 'root'; 
$password = '';    

try {
    // The DSN tells PDO where to connect.
    $conn = "mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4";
    
    // Create a PDO object.
    $pdo = new PDO($conn, $username, $password);
    
    // Set error mode to Exception so it throws errors we can catch.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo ;
    
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>