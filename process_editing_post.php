<?php

  require_once 'includes/connection.php';

  // echo mysqli_connect_errno() ? "Failed to connect to MySQL: ". mysqli_error($db) : "Connected";

  $edited_title = isset($_POST['edited_title']) ? $_POST['edited_title'] : false;
  $edited_description = isset($_POST['edited_description']) ? $_POST['edited_description'] : false;
  $editing_post_id = isset($_POST['editing_post_id']) ? (int)$_POST['editing_post_id'] : false;


  $sql = "UPDATE posts SET title = '$edited_title', description = '$edited_description' WHERE id = $editing_post_id";

  $query = mysqli_query($db, $sql);


  if(!$query) {

    $_SESSION['editing_post_query_error'] = "Query Failed". mysqli_error($db);

  } else {

    $_SESSION['editing_post_succes'] = "Post updated successfully!";

  }

  header("Location: post.php?id=$editing_post_id")

 ?>
