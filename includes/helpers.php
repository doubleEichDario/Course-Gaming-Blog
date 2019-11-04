<?php

  function showError($error, $field) {
    $alert = '';
    if(isset($error[$field])  && !empty($field)) {

      $alert = "<div class='alert error-alert'>".$error[$field]."</div>";

    }

    return $alert;

  }

  function deleteError() {

    $delete_error = false;

    if(isset($_SESSION['completed'])) {
      $_SESSION['completed'] = null;
      unset($_SESSION['completed']);
    }

    if(isset($_SESSION['errors'])) {
      $_SESSION['errors'] = null;

    }

    return $delete_error;

  }

//----------------------------------------------------------------------------

  function getCategories($database) {

    $categories_query = "SELECT * FROM categories;";
    $get_categories = mysqli_query($database, $categories_query);

    $result = array();
    if($get_categories && mysqli_num_rows($get_categories) >= 1) {

      $result = $get_categories;

    }

    return $result;

  }

//-----------------------------------------------------------------------------

function getCategory($database, $id = null) {

  $result = array();

  if($id) {
    $categories_query = "SELECT name FROM categories WHERE id = $id";
  } else {
    $categories_query = "SELECT * FROM categories";
  }

  $get_categories = mysqli_query($database, $categories_query);

  if($get_categories && mysqli_num_rows($get_categories) >= 1) {

    $result = $get_categories;

  }

  return $result;

}



//-----------------------------------------------------------------------------

  function getPosts($database, $limit = null) {

    $posts_query = "SELECT p.id, c.name AS 'Category', CONCAT(u.forename, ' ', u.surname) AS 'Author', p.title, p.description, p.post_date FROM posts p
                    INNER JOIN categories c ON c.id = p.category_id
                    INNER JOIN users u ON u.id = p.user_id
                    ORDER BY p.post_date DESC";

    if($limit) {
      $posts_query .= " LIMIT ".$limit;
    }

    $get_posts = mysqli_query($database, $posts_query);

    $result = array();
    if($get_posts && mysqli_num_rows($get_posts) >= 1) {

      $result = $get_posts;

    }

    return $result;

  }

  //-----------------------------------------------------------------------------------------



  function getPost($database, $id) {
    $sql = "SELECT * FROM posts WHERE id = $id";
    $query = mysqli_query($database, $sql);

    $result = array();
    if($query && mysqli_num_rows($query) >= 1 ) {
      $result = $query;
    }

    return $result;

  }




  //-----------------------------------------------------------------------------------------



  function getPostsByCategory($database, $category = null, $limit = null) {

    $posts_query = "SELECT p.id, c.name AS 'Category', CONCAT(u.forename, ' ', u.surname) AS 'Author', p.title, p.description, p.post_date FROM posts p
                    INNER JOIN categories c ON c.id = p.category_id
                    INNER JOIN users u ON u.id = p.user_id";

    if($category) {

      $posts_query .= " WHERE p.category_id = $category"." ORDER BY p.post_date DESC";

    } else {

      $posts_query .= " ORDER BY p.post_date DESC;";

    }


    if($limit) {

      $posts_query .= " LIMIT ".$limit;

    }

    $get_posts = mysqli_query($database, $posts_query);

    // var_dump($posts_query);
    // die();

    $result = array();
    if($get_posts && mysqli_num_rows($get_posts) >= 1) {

      $result = $get_posts;

    }

    return $result;

  }

    //-----------------------------------------------------------------------------------------

    function getPostsByKeyWord($database, $keyWord) {

      $posts_query = "SELECT p.*, c.* FROM posts p INNER JOIN categories c ON p.category_id = c.id WHERE p.title LIKE '%$keyWord%'";

      $get_posts = mysqli_query($database, $posts_query);

      $result = array();
      if($get_posts && mysqli_num_rows($get_posts) >= 1) {

        $result = $get_posts;

      }

      return $result;

    }


 ?>
