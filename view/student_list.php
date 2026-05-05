<!-- views/student_list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Student App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Function for the edit button where the SQL Update Query will be used -->
    <?php
    require_once __DIR__ . '/../model/Student.php';

    $students = getAllStudents();

    $editStudent = null;

    if (isset($_GET['edit'])) {
        foreach ($students as $s) {
            if ($s['id'] == $_GET['edit']) {
                $editStudent = $s; 
            }
        }
    }
    ?>

    <h1>Student Management</h1>

    <!-- Action Form -->
    <form action="controller/StudentController.php" method="POST">

    <input type="hidden" name="id" value="<?= $editStudent['id'] ?? '' ?>">

    <input type="hidden" name="action"
           value="<?= isset($editStudent) ? 'update' : 'add' ?>">

    <input type="text" name="name" placeholder="Name"
           value="<?= $editStudent['name'] ?? '' ?>" required>

    <input type="text" name="course" placeholder="Course"
           value="<?= $editStudent['course'] ?? '' ?>" required>

    <input type="number" name="year_level" placeholder="Year"
           value="<?= $editStudent['year_level'] ?? '' ?>" required>

    <button type="submit">
        <?= isset($editStudent) ? 'Update Student' : 'Add Student' ?>
    </button>

    <!-- A simple function for the Cancel button where it will reset the contents inside the textbox -->
    <?php if (isset($editStudent)): ?>
    <a href="index.php">
        <button type="button">Cancel</button>
    </a>
    <?php endif; ?>

    </form>

    <hr>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>

        <?php
        require_once __DIR__ . '/../model/Student.php';

        $students = getAllStudents();

        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student['id']}</td>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['course']}</td>";
            echo "<td>{$student['year_level']}</td>";

            echo "<td>
                <a href='?edit={$student['id']}'>Edit</a>
                |
                <a href='controller/StudentController.php?action=delete&id={$student['id']}'
                onclick=\"return confirm('Delete this student?')\">
                Delete
                </a>
            </td>";

            echo "</tr>";
        }
        ?>
    </table>
    
</body>
</html>