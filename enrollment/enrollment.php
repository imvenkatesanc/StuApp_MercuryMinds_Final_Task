<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
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
    </style>
    <title>Enrollment</title>
</head>

<body>
    <header>
        <h2>Create Enrollment</h2>
    </header>
    <div class="container">
        <!-- Enrollment Form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="enrollment_id">Enrollment ID:</label>
            <input type="text" name="enrollment_id" required>

            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required>

            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" required>

            <label for="enrollment_date">Enrollment Date:</label>
            <input type="date" name="enrollment_date" required>

            <label for="grade">Grade:</label>
            <input type="text" name="grade" required>

            <input type="submit" value="Create Enrollment">
        </form>
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

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $enrollment_id = $_POST['enrollment_id'];
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $enrollment_date = $_POST['enrollment_date'];
            $grade = $_POST['grade'];

            // Perform necessary validations here
        
            // Insert the enrollment record into the database
            $sql = "INSERT INTO Enrollments (enrollment_id, student_id, course_id, enrollment_date, grade)
                    VALUES ('$enrollment_id', '$student_id', '$course_id', '$enrollment_date', '$grade')";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Enrollment record created successfully</h2>";
            } else {
                echo "<h2>Error creating enrollment record: " . $conn->error . "</h2>";
            }
        }

        // Retrieve the enrollment records from the database
        $sql = "SELECT * FROM Enrollments";
        $result = $conn->query($sql);

        // Check if there are any enrollment records
        if ($result && $result->num_rows > 0) {
            echo "<h2>Enrollment Records</h2>";

            // Display the enrollment records in a table
            echo "<table>";
            echo "<tr><th>Enrollment ID</th><th>Student ID</th><th>Course ID</th><th>Enrollment Date</th><th>Grade</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["enrollment_id"] . "</td>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["course_id"] . "</td>";
                echo "<td>" . $row["enrollment_date"] . "</td>";
                echo "<td>" . $row["grade"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>No enrollment records found</h2>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>