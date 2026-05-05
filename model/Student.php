<?php
// model/student_model.php
require_once __DIR__ . '/../config/database.php';

function getAllStudents() {
    global $pdo;
    // Step 1: Prepare the query template
    $stmt = $pdo->prepare("SELECT * FROM tbl_students");
    
    // Step 2: Execute the query
    $stmt->execute();
    
    // Step 3: Fetch all results as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addStudent($name, $course, $year_level) {
    global $pdo;
    // Notice the placeholders (?, ?, ?). This is crucial for PDO security.
    $sql = "INSERT INTO tbl_students (name, course, year_level) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Execute the statement by passing an array of the actual values.
    // PDO safely binds these values to the placeholders.
    return $stmt->execute([$name, $course, $year_level]);
}

function updateStudent($id, $name, $course, $year_level) {
    global $pdo;
    $sql = "UPDATE tbl_students SET name = ?, course = ?, year_level = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$name, $course, $year_level, $id]);
}

function deleteStudent($id) {
    global $pdo;
    $sql = "DELETE FROM tbl_students WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$id]);
}
?>