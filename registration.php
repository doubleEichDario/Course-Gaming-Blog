<?php

  if(isset($_POST)) {

    // Include file where the connection to database is set
    require_once 'includes/connection.php';
    if(!isset($_SESSION)) {
      session_start();
    }

    // Getting data from registration form
    $forename = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $surname = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email =  isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']): false;

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

    // email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $valid_email = true;

    } else {

      $valid_email = false;
      $errors['email'] = "Introduce una dirección de correo electrónico válida";

    }

    // Password
    if(!empty($password)) {
      $valid_password = true;

    } else {

      $valid_password = false;
      $errors['password'] = "La contraseña está vacía";

    }

    $save_users_entry = false;

    if(count($errors) == 0) {

      $save_users_entry = true;

      // Encrypt password
      $encrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

      // Insert user data into users table from blog database
      $insert_user_query = "INSERT INTO users VALUES(NULL, '$forename', '$surname', '$email', '$encrypted_password', CURDATE());";


      $create_user_entry = mysqli_query($db, $insert_user_query);

      // Messages to pop-up if success or failure
      if($create_user_entry) {

        $_SESSION['completed'] = "El registro de usuario se ha completado exitosamente";

      } else {

        $_SESSION['errors']['general'] = "¡ERROR! No se pudo completar el registro de usuario";

      }

    } else {

      $_SESSION['errors'] = $errors;

    }
  }

  header('Location: index.php');


?>
