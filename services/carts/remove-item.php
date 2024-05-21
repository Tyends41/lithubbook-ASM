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


$sql = "DELETE FROM cart_items WHERE cart_id = " . $_GET['cart_id'] . " AND book_id = " . $_GET['book_id'];


// echo $sql;
if ($db->query($sql) === TRUE) {
    echo 'Deleted success';
} else {
    echo "Deleted failed";
}


