<?php
require_once __DIR__ . '/../model/Student.php';

// Checks if an action was sent via POST or GET
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'add':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            addStudent($_POST['name'], $_POST['course'], $_POST['year_level']);
            header("Location: ../index.php"); // Redirect to main page
            exit;
        }
        break;

    case 'update':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            updateStudent($_POST['id'], $_POST['name'], $_POST['course'], $_POST['year_level']);
            header("Location: ../index.php");
            exit;
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            deleteStudent($_GET['id']);
            header("Location: ../index.php");
            exit;
        }
        break;

}
?>