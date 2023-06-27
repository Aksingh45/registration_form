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
$sql = "SELECT * FROM reg_form WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // User exists, update their data in the database
  $new_firstname = $_POST["firstname"];
  $new_lastname = $_POST["lastname"];
  $new_dob = $_POST["dob"];
  $new_gender = $_POST["gender"];
  $new_phone = $_POST["phone"];

  $sql = "UPDATE reg_form SET firstname='$new_firstname', lastname='$new_lastname', dob='$new_dob',gender='$new_gender', phone='$new_phone' WHERE email='$email' AND password='$password'";

  if ($conn->query($sql) === TRUE) {
    echo "User data updated successfully";
  } else {
    echo "Error updating user data: " . $conn->error;
  }

} else {
  // User does not exist or password is incorrect, show error message
  echo "Email or password is incorrect";
}

$conn->close();

?>
