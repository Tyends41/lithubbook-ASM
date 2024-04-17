<?php
session_start(); // start a session

if (!isset($_SESSION['user_id'])) {
  header('Location: ../user/login.html'); // redirect to login page if $email is not in the session
  exit;
}

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'lithubbook');

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select all books
$result = mysqli_query($db, "SELECT * FROM carts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
</head>
<body>
  <h1>This is cart</h1>
</body>
</html>