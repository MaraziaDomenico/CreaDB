<?php

session_start();

$servername = "localhost";
$username = $_POST["username"];
$password = $_POST["password"];
$dbname = "myDB";

$_SESSION['user'] = $username;
$_SESSION['pswd'] = $password;

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);

 // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // sql to create table
  $sql = "CREATE TABLE MyGuests (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
   firstname VARCHAR(30) NOT NULL,
   lastname VARCHAR(30) NOT NULL, email VARCHAR(50), 
   reg_date TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
header("location: creaRecord.html");
?>
