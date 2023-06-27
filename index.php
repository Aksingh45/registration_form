<?php
  // Establish a connection to the database
  $servername = "localhost";
  $username = "root";
//   $password = "your_password";
  $dbname = "dbms_project";

  $conn = mysqli_connect($servername, $username, '', $dbname);

  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve values from the registration form
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $dob = $_POST["dob"];
  $gender = $_POST["gender"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Hash the password before storing it in the database

  // Insert the values into the database
  $sql = "INSERT INTO reg_form (firstname, lastname, dob, gender, phone, email, password) VALUES ('$firstname', '$lastname', '$dob', '$gender', '$phone', '$email', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
