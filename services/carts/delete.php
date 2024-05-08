<!-- Delete a cart -->
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



$sql = "DELETE FROM carts WHERE id = " . $_GET['id'];


try {
    if ($db->query($sql) === TRUE) {
        echo 'Deleted success';
    } else {
        echo "Deleted failed";
    }
} catch (\Throwable $th) {
    echo "fatal error";
}