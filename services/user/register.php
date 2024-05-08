<!--
  Connect to database
  Receive the email and password from Register form
  Insert to users table
  Redirect to Index page
-->
<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

session_start(); // start a session

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'lithubbook');

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($db->query($sql) === TRUE) {
  header('Location: ../../pages/user/login.php');
} else {
  echo "Created failed";
}