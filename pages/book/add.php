<!-- Design the HTML form to add new book  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Add new Book</title>
</head>

<body>
  <h1>Adding new Book</h1>
  <div class="container">
    <div class="row justfy-content-center">
      <div class="col-lg-8">
        <form action="../../services/book/add.php" method="post">
          <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control" name="title" /><br>
          </div>
          <div class="form-group">
            <label>Author:</label>
            <input type="text" class="form-control" name="author" /><br>
          </div>
          <div class="form-group">
            <label>Price:</label>
            <input type="number" class="form-control" name="price" /><br>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new book</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>