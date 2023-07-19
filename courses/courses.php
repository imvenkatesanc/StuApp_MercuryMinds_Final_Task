<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Courses</title>
  <style>
    html body {
      background-color: black;
      margin: 0 0 0 0;
      color: #fff;
    }

    h2 {
      font-weight: 600;
      font-style: italic;
      font-family: "Fira Sans Condensed", sans-serif;
    }

    header {
      height: 2em;
      background-color: #111122;
      margin: 0 0 0 0;
      padding: auto;
      font-size: 2em;
      text-align: center;
      line-height: 2em;
      color: white;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    table td a {
      color: #3498db;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .container {
        padding: 10px;
      }

      h1 {
        font-size: 24px;
      }

      h2 {
        font-size: 18px;
      }

      form label {
        margin-top: 5px;
      }

      input[type="text"],
      textarea {
        padding: 3px;
      }

      input[type="submit"] {
        padding: 8px;
      }

      table th,
      table td {
        padding: 8px;
      }
    }
  </style>
</head>

<body>
  <header>
    <h2>Courses Management</h2>
  </header>
  <div class="container">

    <!-- Create Course -->
    <h2>Create Course</h2>
    <form method="post" action="">
      <label for="course_id">Course ID:</label>
      <input type="number" name="course_id" required>
      <label for="course_name">Course Name:</label>
      <input type="text" name="course_name" required>
      <label for="course_description">Course Description:</label>
      <textarea name="course_description" required></textarea>
      <input type="submit" name="create" value="Create Course">
    </form>

    <!-- Course List -->
    <h2>Course List</h2>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "student_management_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // CREATE
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['create'])) {
        $courseId = $_POST['course_id']; // Assuming you have a course_id field in your form
        $courseName = $_POST['course_name'];
        $courseDescription = $_POST['course_description'];

        $sql = "INSERT INTO Courses (course_id, course_name, course_description) VALUES ('$courseId', '$courseName', '$courseDescription')";

        if ($conn->query($sql) === TRUE) {
          echo "Course created successfully.";
        } else {
          echo "Error creating course: " . $conn->error;
        }
      }
    }


    // DELETE
    if (isset($_GET['delete'])) {
      $courseId = $_GET['delete'];

      $sql = "DELETE FROM Courses WHERE course_id = $courseId";

      if ($conn->query($sql) === TRUE) {
        echo "Course deleted successfully.";
      } else {
        echo "Error deleting course: " . $conn->error;
      }
    }

    // UPDATE
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['update'])) {
        $courseId = $_POST['course_id'];
        $courseName = $_POST['course_name'];
        $courseDescription = $_POST['course_description'];

        $sql = "UPDATE Courses SET course_name = '$courseName', course_description = '$courseDescription' WHERE course_id = $courseId";

        if ($conn->query($sql) === TRUE) {
          echo "Course updated successfully.";
        } else {
          echo "Error updating course: " . $conn->error;
        }
      }
    }

    // Retrieve the courses from the database
    $sql = "SELECT * FROM Courses";
    $result = $conn->query($sql);

    // Check if there are any courses
    if ($result->num_rows > 0) {
      // Start building the HTML table
      echo '<table>';
      echo '<tr><th>Course ID</th><th>Course Name</th><th>Course Description</th><th>Actions</th></tr>';

      // Loop through each course
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['course_id'] . '</td>';
        echo '<td>' . $row['course_name'] . '</td>';
        echo '<td>' . $row['course_description'] . '</td>';
        echo '<td><a href="?delete=' . $row['course_id'] . '">Delete</a> | <a href="update_course.php?id=' . $row['course_id'] . '">Update</a></td>';
        echo '</tr>';
      }

      // Close the HTML table
      echo '</table>';
    } else {
      echo "No courses found.";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>

</html>