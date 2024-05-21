<?php
session_start(); // start a session

if (!isset($_SESSION['user_id'])) {
  echo ("Not authrozied");
  exit;
}

// use mysqli to connection
$host = 'localhost';
$db = 'lithubbook';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
// Connect to the database

$db = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($db, "SELECT * FROM favorites WHERE user_id = " . $_SESSION['user_id']);


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
      <a class="navbar-brand" href="../book/books.php">Lithub Book</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../carts/all.php">Carts</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <h1>Favorites</h1>
  <div class='container'>
    <table class='table'>
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">Book ID</th>
        <th scope="col">Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['user_id']; ?></td>
          <td><?php echo $row['book_id']; ?></td>
          <td>
            <a href="../../services/favorites/remove.php?book_id=<?php echo $row['book_id'] ?>" class="btn btn-danger">
              Remove
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>

</html>