<?php
session_start();
$username = $_SESSION["user"];
$password = $_SESSION["pswd"];

$servername = "localhost";
$firstname = $_POST["nome"];
$lastname = $_POST["cognome"];
$email = $_POST["email"];
$dbname = "myDB";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";
 
if (mysqli_query($conn, $sql)) {
    $message = "Dati registrati correttamente";
	echo "<script type='text/javascript'>alert('$message');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
mysqli_close($conn);
?>
