<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap" rel="stylesheet">
    <title>Student Management System</title>
</head>

<body>
    <header>
        <h1>Student Management System</h1>
    </header>
    <div id="main">
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/add-user-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Student Information -->
                <h2>Create Student</h2>
                <h4>adding new student records <br> into the system</h4>
                <a href="./student_op/create_student.html">Create Student</a>
            </div>
        </div>
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/user-id-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Student Information -->
                <h2>View Student</h2>
                <h4>users to access and see <br> existing student details</h4>
                <a href="./student_op/student_view.php">View Students</a>
            </div>
        </div>
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/refresh-user-profile-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Student Information -->
                <h2>Update Student</h2>
                <h4>modify and edit information for a <br>specific student in the database</h4>
                <a href="./student_op/student_update.html">Update Student</a>
            </div>
        </div>
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/delete-user-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Student Information -->
                <h2>Delete Student</h2>
                <h4>removing a student record from <br>the system entirely</h4>
                <a href="./student_op/student_delete.html">Delete Student</a>
            </div>
        </div>
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/courses-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Courses Information -->
                <h2>Student Courses</h2>
                <h4>courses available for students <br> to enroll in</h4>
                <a href="./courses/courses.php">Student Courses</a>
            </div>
        </div>
        <div class="infocardContainer">
            <div id="main">
                <img src="./assets/enrollment-svgrepo-com.svg"></img>
            </div>
            <div id="textbois">
                <!-- Enrollment Information  -->
                <h2>Student Enrollment</h2>
                <h4>which students register and <br>join specific courses</h4>
                <a href="./enrollment/enrollment.php">Student Enrollment</a>
            </div>
        </div>
    </div>
</body>

</html>