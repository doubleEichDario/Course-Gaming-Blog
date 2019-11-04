<!-- Header and menu -->
<?php require_once 'includes/header.php'; ?>

<!-- Sidebar -->
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">

  <?php

    if(!isset($_POST['search'])) {
      header("Location: index.php");
    }

   ?>

  <h1>Resultados de: <?= $_POST['search'] ?></h1>


  <?php
    $posts = getPostsByKeyWord($db, $_POST['search']);
    if(!empty($posts)):
    while($post = mysqli_fetch_assoc($posts)):
   ?>

   <article class="entrada">
     <a href="post.php?id=<?= $post['id']; ?>">
       <h2><?= $post['title']; ?></h2>
       <span class="category-date-data"><?= '<i>'.$post['name'].'</i>'. ' | '. $post['post_date'];  ?></span>
       <p><?= $post['description']; ?></p>
     </a>
   </article>

 <?php
    endwhile;
    endif;
 ?>
</div>

<!-- Footer -->
<?php require_once '../blog_project/includes/footer.php'; ?>

<!-- Scripts -->
<?php require_once '../blog_project/includes/scripts.php'; ?>
