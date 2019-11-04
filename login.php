<?php
    require_once 'includes\connection.php';

    // Get data from access form
    if(isset($_POST)) {
      $email = trim($_POST['email']);
      $password = $_POST['password'];
    }

    // Create a database query to select user credentials
    $select_user_query = "SELECT * FROM users WHERE email = '$email'";
    $login = mysqli_query($db, $select_user_query);

    if($login && mysqli_num_rows($login) == 1) {

      $user = mysqli_fetch_assoc($login);

      // Validate password
      $verify_password = password_verify($password, $user['password']);
      if($verify_password) {

        // Create a session to store logged user data
        $_SESSION['user'] = $user;
        if(isset($_SESSION['login_error'])) {
          unset($_SESSION['login_error']);
        }


      } else {
        // Create a session in case of failure to connect
        $_SESSION['login_error'] = "ERROR! Datos incorrectos";
      }

    } else {
      // Error message
      $_SESSION['login_error'] = "ERROR! Datos incorrectos";
    }

    // Redirect to index.php
    header('Location: index.php');
 ?>
