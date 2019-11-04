<?php

  require_once 'includes/connection.php';

  if(isset($_POST['search'])) {
    $search = trim($_POST['search']);
    $sql = "SELECT * FROM posts WHERE title LIKE '$search%'";
    $query = mysqli_query($db, $sql);

    // var_dump($sql);

    // var_dump($query);
    // die();

    $results = array();

    if($query && mysqli_num_rows($query) >= 1) {


      var_dump($row);
      die();

    } else if(!$query){

      // $_SESSION['search_query_error'] = "Query failed ".mysqli_error($db);
      echo "Query failed ".mysqli_error($db);

    } else if(mysqli_num_rows($query) == 0) {

      // $_SESSION['empty_search'] = "No hay resultados";
      echo "No hay resultados";

    }

    // header("Location: search_results?.php");


  }




















 ?>
