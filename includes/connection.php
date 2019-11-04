<?php

  // Connection
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'blog';
    $db = mysqli_connect($host, $user, $password, $database);

  // Spanish language support
    mysqli_query($db, "SET NAMES 'utf8'");

  // Initialize Session
    if(!isset($_SESSION)) {
      session_start();
    }

?>
