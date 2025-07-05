<?php
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $attendance = $_POST['attendance'];

    // Insert data into the database
    $sql = "INSERT INTO students (name, grade, attendance) VALUES ('$name', '$grade', '$attendance')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Dashboard</h1>

        <!-- Add Student Form -->
        <form method="POST" action="">
            <h2>Add Student</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter student name" required><br>
            <label for="grade">Grade:</label>
            <input type="number" step="0.01" id="grade" name="grade" placeholder="Enter grade (e.g., 85.5)" required><br>
            <label for="attendance">Attendance:</label>
            <input type="number" id="attendance" name="attendance" placeholder="Enter attendance (%)" required><br>
            <button type="submit">Add Student</button>
        </form>

        <hr>

        <!-- Display Students Table -->
        <h2>Student List</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Grade</th>
                <th>Attendance</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM students");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['grade']}</td>
                        <td>{$row['attendance']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>


</body>

</html>
