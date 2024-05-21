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

$sql = "INSERT INTO cart_items (cart_id, book_id) VALUES ('{$_GET['cart_id']}', '{$_GET['book_id']}')";

try {
    if ($db->query($sql) === TRUE) {
        header('Location: ../../pages/carts/all.php');
    } else {
        echo "Created failed";
    }
} catch (\Throwable $th) {
    echo "fatal error";
}

