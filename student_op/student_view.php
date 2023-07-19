<!-- student_view.php -->

<!DOCTYPE html>
<html>

<head>
  <title>View Students</title>
  <style>
    html body {
      background-color: black;
      margin: 0 0 0 0;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #f2f2f2;
      color: white;
    }
  </style>
</head>

<body>
  <header>
    <h2>View Students</h2>
  </header>
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

  // Retrieve the student records from the database
  $sql = "SELECT * FROM Students";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Display the student records in a table
    echo "<table>
            <tr>
              <th>Student ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date of Birth</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Country</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>" . $row["student_id"] . "</td>
              <td>" . $row["first_name"] . "</td>
              <td>" . $row["last_name"] . "</td>
              <td>" . $row["date_of_birth"] . "</td>
              <td>" . $row["email"] . "</td>
              <td>" . $row["phone_number"] . "</td>
              <td>" . $row["address"] . "</td>
              <td>" . $row["city"] . "</td>
              <td>" . $row["state"] . "</td>
              <td>" . $row["country"] . "</td>
            </tr>";
    }

    echo "</table>";
  } else {
    echo "No student records found";
  }

  $conn->close();
  ?>
</body>

</html>