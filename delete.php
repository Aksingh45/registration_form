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

// Get email and password from user input
$email = $_POST["email"];
$password = $_POST["password"];


// Query to check if user exists in database
$sql = "DELETE * FROM reg_form WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Account deletion successful.";
} else {
  // User does not exist, show error message
  echo "Invalid email or password";
}

$conn->close();

?>
