<?php

include "libs/database.php";
include "functions/functions.php";

//$pdo = Database::connect();

$query = "SELECT * FROM post ORDER BY id DESC";

$post = Database::select($query);

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>PHP Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="#">All Post</a>
            <a class="nav-link" href="#">Services</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>
        </div>
      </div>

      <div class="blog-header">
        <div class="container">
          <h1 class="blog-title">PHP Tutorials Blog</h1>
          <p class="lead blog-description">A about php tutorials, news and guides.</p>
        </div>
      </div>
    </header>


        <main role="main" class="container">

          <div class="row">

            <div class="col-sm-8 blog-main">

              <?php foreach ($post as $row) {
     ?>

              <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
                <img style="float:left; margin-right:20px;margin-bottom:10px;" src="images/<?php echo $row['image']; ?>" alt="Post image" width="200px" height="200px"/>
                <p style="text-align:justify;"><?php echo substr($row['content'],0,300);?></p>

              <a id="readmore" href="single_post.php?id= <?php echo $row['id']; ?>">Read More</a>
              </div><!-- /.blog-post -->

            <?php } ?>

              <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
              </nav>

            </div><!-- /.blog-main -->
