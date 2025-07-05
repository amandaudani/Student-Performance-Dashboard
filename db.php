<?php
$host = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (leave empty)
$dbname = "student_tracker"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
