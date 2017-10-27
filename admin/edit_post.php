<?php

include "../libs/database.php";
include "../functions/functions.php";

//$pdo = Database::connect();

$cat_query = "SELECT * FROM categories";

$category = Database::select($cat_query);

$id = $_GET['id'];

$select_post_query = "SELECT * FROM post WHERE id ='$id'";

$post = Database::select($select_post_query);

$row = $post->fetch();

if (isset($_POST['update'])) {
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
        $post_query ="UPDATE post SET title ='$title', content ='$content', category_id = '$cat', author='$author', tags='$tags', image= '$image' WHERE id ='$id'";
        $run =  Database::update($post_query,"Post");

        unlink("../images/".row['image']);
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
              <form action="edit_post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Post Title</label>
                  <input type="name" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Enter the Post Title">
                </div>
                <div class="form-group">
                 <label>Post Content</label>
                 <textarea class="form-control" name="content" placeholder="Enter the Post Content" rows="3">
                   <?php echo $row['content']; ?>
                 </textarea>
               </div>
                <div class="form-group">
                  <label>select Category</label>
                  <select name="cat" class="form-control">
                  <?php foreach ($category as $rows) {
     ?>
                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?></option>
                  <?php
 } ?>
                  </select>
                </div>
                <div class="form-group">
                 <label>Author Name</label>
                 <input type="text" name="author" value="<?php echo $row['author']; ?>"  class="form-control" placeholder="Enter the Author Name">
               </div>
                <div class="form-group">
                 <label >Tags</label>
                 <input type="text" name="tags" value="<?php echo $row['tags']; ?>" class="form-control" placeholder="Enter the Post tags">
               </div>
                <div class="form-group">
                  <label>Post Image</label>
                  <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
                  <img src="../images/<?php echo $row['image']; ?>" width="150" height="100" alt="images">
                </div>
                <button type="submit" name="update" class="btn btn-success">Submit</button>
                <a href="index.php" class="btn btn-primary">cancel</a>
                <a href="delete_post.php?id=<?php echo $id ?>" class="btn btn-danger">Delete</a>
                </div>
              </form>
            </div><!-- /.table-main -->
            <br>
            <?php

            include 'includes/footer.php';

             ?>
