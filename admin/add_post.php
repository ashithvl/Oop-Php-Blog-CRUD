<?php

include "../libs/database.php";
include "../functions/functions.php";

//$pdo = Database::connect();

$cat_query = "SELECT * FROM categories";

$category = Database::select($cat_query);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cat = $_POST['cat'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if ($title==''||$content== ''||$cat==''||$author==''||$tags='') {
        echo "Please fill all the fields";
    } else {
        move_uploaded_file($image_tmp, "../images/$image");
        $post_query ="INSERT INTO post (title, content, category_id, author, tags, image )
        VALUES ('$title','$content','$cat','$author','$tags','$image')";
        $run =  Database::insert($post_query,"Post");
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
            <a class="nav-link active" href="add_post.php">Add new Post</a>
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
              <h2>Insert a new Post</h2>
              <form action="add_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Post Title</label>
                  <input type="name" name="title" class="form-control" placeholder="Enter the Post Title">
                </div>
                <div class="form-group">
                 <label>Post Content</label>
                 <textarea class="form-control" name="content" placeholder="Enter the Post Content" rows="3"></textarea>
               </div>
                <div class="form-group">
                  <label>select Category</label>
                  <select name="cat" class="form-control">
                  <?php foreach ($category as $row) {
     ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                  <?php
 } ?>
                  </select>
                </div>
                <div class="form-group">
                 <label>Author Name</label>
                 <input type="text" name="author" class="form-control" placeholder="Enter the Author Name">
               </div>
                <div class="form-group">
                 <label >Tags</label>
                 <input type="text" name="tags" class="form-control" placeholder="Enter the Post tags">
               </div>
                <div class="form-group">
                  <label>Post Image</label>
                  <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
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
