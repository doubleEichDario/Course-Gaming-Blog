<?php

   if(isset($_POST)) {

     require_once 'includes/connection.php';

     $new_title = isset($_POST['new_title']) ? mysqli_real_escape_string($db, $_POST['new_title']) : false;
     $new_description = isset($_POST['new_description']) ? mysqli_real_escape_string($db, $_POST['new_description']) : false;
     $category = isset($_POST['category']) ? (int)$_POST['category'] : false;
     $user_id = (int)$_SESSION['user']['id'];

     // Validate data from new category form

     $errors = array();

     // Title
     if(empty($new_title)) {

       $errors['new_title'] = "Introduce un titulo para la entrada";

     }

     // Description
     if(empty($new_description)) {

       $errors['new_description'] = "Introduce la descripción de la entrada";

     }

     if(count($errors) == 0) {

       $insert_post_query = "INSERT INTO posts VALUES(NULL, $category, $user_id, '$new_title', '$new_description', CURDATE())";
       $db_post_query = mysqli_query($db, $insert_post_query);
       header('Location: index.php');

     } else {

     $_SESSION['errors'] = $errors;
     header('Location: new_post.php');

    }
  }
 ?>
