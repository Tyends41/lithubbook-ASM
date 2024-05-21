<?php
session_start(); // start a session

if (!isset($_SESSION['user_id'])) {
  header('Location: ../user/login.php'); // redirect to login page if $email is not in the session
  exit;
}

if (!isset($_GET['id'])) {
  echo 'something went wrong';
  exit;
}

$id = $_GET['id'];

// pdo instance

$host = 'localhost';
$db = 'lithubbook';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Assuming you have a PDO instance $pdo
$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

if (!$book) {
  echo 'Book not found';
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Book</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <h1>Edit Book</h1>
  <div class="container">
    <div class="row justfy-content-center">
      <div class="col-lg-8">
        <form method="post" action="../../services/book/update.php">
          <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">

          <div class="form-group">
            <label>Title: </label>
            <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($book['title']) ?>"><br>
          </div>

          <div class="form-group">
            <label>Author </label>
            <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($book['author']) ?>"><br>
          </div>

          <div class="form-group">
            <label>Price:</label>
            <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($book['price']) ?>"><br>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>