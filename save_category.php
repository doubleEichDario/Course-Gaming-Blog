<?php

   if(isset($_POST)) {

     require_once 'includes/connection.php';

     $new_category = isset($_POST['new_category']) ? mysqli_real_escape_string($db, $_POST['new_category']) : false;

     // Validate data from new category form

     $errors = array();

     // Forename
     if(!empty($new_category) && !is_numeric($new_category) && !preg_match("/[0-9]/", $new_category)) {

       $valid_new_category = true;

     } else {

       $valid_new_category = false;
       $errors['new_category'] = "Introduce un nombre de categoria válido";

     }

     if(count($errors) == 0) {

       $insert_category_query = "INSERT INTO categories VALUES(NULL, '$new_category')";
       $db_category_query = mysqli_query($db, $insert_category_query);

     }
   }

   header('Location: index.php');

 ?>
