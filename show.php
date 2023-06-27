<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Tables</title>
  <link rel="stylesheet" href="project.css">
</head>

<body>
  <div class="container">
    <div class="tabs">
      <a href="register.html"><div class="tab" id="link">Register Account</div></a>
      <a href="delete.html"><div class="tab" id="link">Delete Account</div></a>
      <a href="modify.html"><div class="tab" id="link">Modify Account</div></a>
      <div class="tab">Show Tables</div>
  </div>
  <div id="show">

  <?php

  // Set database connection variables
  $servername = "localhost";
  $username = "root";
  // $password = "password";
  $dbname = "dbms_project";
  
  // Create connection
  $conn = new mysqli($servername, $username, '', $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  
  // Query to check if user exists in database
  $sql = "SELECT * FROM reg_form";
  
  $result = $conn->query($sql);
  
  if (mysqli_num_rows($result) > 0) {
      // Display data in HTML table
      echo "<table>";
      echo "<tr><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Gender</th><th>Phone No</th><th>Email ID</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["firstname"] . "</td>";
          echo "<td>" . $row["lastname"] . "</td>";
          echo "<td>" . $row["dob"] . "</td>";
          echo "<td>" . $row["gender"] . "</td>";
          echo "<td>" . $row["phone"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }
  
  $conn->close();
  
  ?>
  

  </div>
</body>

</html>