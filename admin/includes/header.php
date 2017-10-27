<?php

include "../libs/database.php";
include "../functions/functions.php";

//$pdo = Database::connect();

$post_query = "SELECT * FROM post ORDER BY id";
//$pdo = Database::connect();

$cat_query = "SELECT * FROM categories";

$post = Database::select($post_query);
$category = Database::select($cat_query);

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
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="#">Dashborad</a>
            <a class="nav-link" href="add_post.php">Add new Post</a>
            <a class="nav-link" href="add_categories.php">Add new Category</a>
            <a class="nav-link mr-auto" href="../index.php">View Post</a>
            <a class="nav-link" href="logout.php">Log Out</a>
          </nav>
        </div>
      </div>

    </header>


        <main role="main" class="container">

          <div class="row">

            <div class="col-sm-12 blog-main">

              <?php if(isset($_GET['msg'])){
                echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
              } ?>

              <h1 style="text-align:center;">Manage Your Posts:</h1>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Post Id</th>
                    <th>Post Title</th>
                    <th>Post Author</th>
                    <th>Post Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($post as $row) { ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo formatDate($row['date']); ?></td>
                </tbody>
              <?php } ?>
              </table>

            </div><!-- /.table-main -->

            <div class="col-sm-12 blog-main">
              <h1 style="text-align:center;">Manage Your Categories:</h1>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Category Id</th>
                    <th>Category Title</th>
                  </tr>
                </thead>
                <tbody>
                      <?php foreach ($category as $row) {?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></td>
                </tbody>
              <?php } ?>
              </table>

            </div><!-- /.table-main -->
