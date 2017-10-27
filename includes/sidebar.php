<?php

// include "libs/database.php";
// include "functions/functions.php";

//$pdo = Database::connect();

$query = "SELECT * FROM categories";

$categories = Database::select($query);

 ?>
        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
                          <?php foreach ($categories as $row) {
                 ?>
              <li><a href="categories.php?id= <?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
            <?php } ?>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->
