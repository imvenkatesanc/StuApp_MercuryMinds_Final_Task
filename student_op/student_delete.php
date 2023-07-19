<?php
// student_delete.php

// Retrieve form data
$student_id = $_POST['student_id'];

// Connect to the database
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "student_management_db";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete the student record from the database
$sql = "DELETE FROM Students WHERE student_id = '$student_id'";

if ($conn->query($sql) === TRUE) {
  echo "Student record deleted successfully";
} else {
  echo "Error deleting student record: " . $conn->error;
}

$conn->close();
?>