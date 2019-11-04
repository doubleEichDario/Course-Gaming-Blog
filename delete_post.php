<?php

    require_once 'includes/connection.php';

    if(isset($_GET['id'])) {

      $id = (int)$_GET['id'];
      $sql = "DELETE FROM posts WHERE id = $id";
      $query = mysqli_query($db, $sql);

      if($query) {

        $_SESSION['deleting_post_success'] = "Post deleted successfully!";

      } else {

        $_SESSION['deleting_post_error'] = "Query failed!".mysqli_error($db);

      }

    }

    header("Location: index.php");

 ?>
