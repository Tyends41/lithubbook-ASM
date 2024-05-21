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

// Select all carts
$result = mysqli_query($db, "SELECT * FROM carts");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <title>Cart</title>
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
            <a class="nav-link" href="../book/books.php">Books</a>
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

  <h1>Shopping Cart</h1>
  <div class="container">
    <a href="../../services/carts/new.php" class="btn btn-primary">Add new cart</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User ID</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['user_id']; ?></td>
            <td>
              <a href="details.php?cart_id=<?php echo $row['id'] ?>" class="btn btn-primary">
                Edit
              </a>
              <a href="../../services/carts/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                Delete
              </a>
              <a href="add-books.php?cart_id=<?php echo $row['id'] ?>" class="btn btn-primary">
                Add books
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>

</html>