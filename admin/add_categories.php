<?php

include "../libs/database.php";
include "../functions/functions.php";

//$pdo = Database::connect();
//
// $cat_query = "SELECT * FROM categories";
//
// $category = Database::select($cat_query);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];

    if ($title=='') {
        echo "Please fill all the fields";
    } else {
        $cat_query ="INSERT INTO categories (title) VALUES ('$title')";
        $run =  Database::insert($cat_query,"Category");
    }
}

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="#">Dashborad</a>
            <a class="nav-link" href="add_post.php">Add new Post</a>
            <a class="nav-link active" href="add_categories.php">Add new Category</a>
            <a class="nav-link mr-auto" href="../index.php">View Post</a>
            <a class="nav-link" href="logout.php">Log Out</a>
          </nav>
        </div>
      </div>

    </header>

        <main role="main" class="container">

          <div class="row">

            <div class="col-sm-12 blog-main">
              <h2>Insert a new Post</h2>
              <form action="add_categories.php" method="post">
                <div class="form-group">
                  <label>Category Title</label>
                  <input type="name" name="title" class="form-control" placeholder="Enter the Post Title">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <a href="index.php" class="btn btn-danger">cancel</a>
                </div>
              </form>
            </div><!-- /.table-main -->
            <br>
            <?php

            include 'includes/footer.php';

             ?>
