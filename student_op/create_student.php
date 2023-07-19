<?php
// Retrieve form data
$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];

// Perform necessary validations here

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "student_management_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the student record into the database
$sql = "INSERT INTO Students (student_id, first_name, last_name, date_of_birth, email, phone_number, address, city, state, country)
        VALUES ('$student_id', '$first_name', '$last_name', '$date_of_birth', '$email', '$phone_number', '$address', '$city', '$state', '$country')";

if ($conn->query($sql) === TRUE) {
  echo "Student record created successfully";
} else {
  echo "Error creating student record: " . $conn->error;
}

$conn->close();
?>
