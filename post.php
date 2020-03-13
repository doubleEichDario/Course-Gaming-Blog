<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">

<?php
  $current_post = getPost($db, $_GET['id']);
  $post = mysqli_fetch_assoc($current_post);
  // Redirect to index.php if 'getPost()' fails
  !isset($post) ? header("Location: index.php") : false;
?>

<?php if(isset($_SESSION['editing_post_succes'])): ?>
  <div class="alert success-alert"><?= $_SESSION['editing_post_succes']; ?></div>
<?php elseif(isset($_SESSION['editing_post_query_error'])): ?>
  <div class="alert error-alert"><?= $_SESSION['editing_post_query_error']; ?></div>
<?php endif; ?>

   <article class="entrada">
     <h1><?= $post['title'] ?></h1>
     <?php

      $category = getCategory($db, $post['category_id']);
      $current_category = mysqli_fetch_assoc($category);
     ?>

       <a href="categories.php?id=<?= $post['category_id'] ?>">
         <h2><?= $current_category['name'] ?></h2>
       </a>

     <p><?= $post['description']; ?></p>

   </article>

   <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $post['user_id']): ?>

     <a class="button red-button" href="delete_post.php?id=<?= $post['id'] ?>">Borrar Entrada</a>
     <a class="button" href="edit_post.php?id=<?= $post['id'] ?>">Editar Entrada</a>

   <?php endif; ?>

 <?php
 $_SESSION['editing_post_succes'] = null;
 $_SESSION['editing_post_query_error'] = null;
 ?>


</div>

<?php require_once '../blog_project/includes/footer.php'; ?>
<?php require_once '../blog_project/includes/scripts.php'; ?>
