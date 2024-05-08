<!-- Show the details of a cart -->
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

$result = mysqli_query($db, "SELECT * FROM cart_items WHERE cart_id = " . $_GET['cart_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Document</title>
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

  <h1>Details</h1>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">cart_id</th>
          <th scope="col">book_id</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <th scope="row"><?php echo $row['cart_id']; ?></th>
            <td><?php echo $row['book_id']; ?></td>
            <td>
              <a href="../../services/carts/remove-item.php?cart_id=<?php echo $row['cart_id'] ?>&book_id=<?php echo $row['book_id'] ?>"
                class="btn btn-danger">
                Delete
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
        <tr>
    </table>
  </div>
</body>

</html>