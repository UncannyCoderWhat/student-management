<!-- views/student_list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Student App</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Student Management</h1>

    <!-- Action Form -->
    <form action="../controller/StudentController.php" method="POST">
        <input type="hidden" name="action" value="add">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="course" placeholder="Course" required>
        <input type="number" name="year_level" placeholder="Year" required>
        <button type="submit">Add Student</button>
    </form>

    <hr>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
        
        </tr>
        <?php 




        ?>
    </table>
</body>
</html>