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

$cart_id = $_GET["cart_id"];

// Select all books
$result = mysqli_query($db, "SELECT * FROM books");
?>
<!-- Todo: display all books with add to cart button -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Add books to cart</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lithub Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all.php">Carts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../favorites/all.php">Favorites</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Books</h1>
    <h2>Cart Id: <?php echo $cart_id ?></h2>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Add to cart</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <?php $book_id = $row['id'];
                        ?>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="../../services/carts/add-books.php?cart_id=<?php echo $cart_id ?>&book_id=<?php echo $book_id ?>"
                                class="btn btn-primary">
                                Add to current cart
                            </a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>