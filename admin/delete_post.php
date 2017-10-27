<?php

include "../libs/database.php";
include "../functions/functions.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "DELETE FROM post WHERE id='$id'";

  $delete = Database::delete($query,"Post");

}

 ?>
