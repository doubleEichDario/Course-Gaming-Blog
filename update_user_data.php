<?php

  if(isset($_POST)) {

    // Include file where the connection to database is set
    require_once 'includes/connection.php';

    // Getting data from updating form
    $forename = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $surname = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;

    $errors = array();

    // Validate data from registration form

    // Forename
    if(!empty($forename) && !is_numeric($forename) && !preg_match("/[0-9]/", $forename)) {

      $valid_forename = true;

    } else {

      $valid_forename = false;
      $errors['forename'] = "Introduce un nombre válido - <strong>No</strong> números o símbolos";

    }

    // Surname
    if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
      $valid_surname = true;

    } else {

      $valid_surname = false;
      $errors['surname'] = "Introduce un(os) apellido(s) válido - <strong>No</strong> números o símbolos";

    }

    $save_users_entry = false;

    if(count($errors) == 0) {

      // Insert user data into users table from blog database
      $update_query = "UPDATE users SET forename = '$forename', surname = '$surname' WHERE id = ".$_SESSION['user']['id']."";

      $update_user_entry = mysqli_query($db, $update_query);

      // Messages to pop-up if success or failure
      if(!$update_user_entry) {

        $_SESSION['errors']['general'] = "¡ERROR! No se pudo completar la actualización de usuario";
        header("Location: user_data.php");

      } else {

        $_SESSION['user']['forename'] = $forename;
        $_SESSION['user']['surname'] = $surname;
        header('Location: index.php');

      }

    } else {

      $_SESSION['errors'] = $errors;
      header("Location: user_data.php");

    }
  }


?>
