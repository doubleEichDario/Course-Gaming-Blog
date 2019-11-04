<!-- Header and menu -->
<?php require_once 'includes/header.php'; ?>

<!-- Sidebar -->
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">

  <h1>Todas Las Entradas</h1>

  <?php
    $posts = getPosts($db);
    if(!empty($posts)):
    while($post = mysqli_fetch_assoc($posts)):
   ?>

   <article class="entrada">
     <a href="post.php?id=<?= $post['id']; ?>">
       <h2><?= $post['title']; ?></h2>
       <span class="category-date-data"><?= '<i>'.$post['Category'].'</i>'. ' | '. $post['post_date'];  ?></span>
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
