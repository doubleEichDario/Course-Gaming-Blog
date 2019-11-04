<!-- Header and menu -->
<?php require_once 'includes/header.php'; ?>

<!-- Sidebar -->
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">

  <h1>Últimas Entradas</h1>

  <?php if(isset($_SESSION['deleting_post_error'])): ?>
    <div class="alert error-alert">
      <?= $_SESSION['deleting_post_error']; ?>
    </div>

  <?php elseif(isset($_SESSION['deleting_post_success'])): ?>
    <div class="alert success-alert">
      <?= $_SESSION['deleting_post_success']; ?>
    </div>
  <?php endif; ?>

  <?php
    $posts = getPosts($db, 3);
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
    $_SESSION['deleting_post_error'] = null;
    $_SESSION['deleting_post_success'] = null;

    endwhile;
    endif;
 ?>

  <div id="ver-todas"><a href="all_posts.php">Ver todas las entradas</a></div>
</div>


<!-- Footer -->
<?php require_once '../blog_project/includes/footer.php'; ?>

<!-- Scripts -->
<?php require_once '../blog_project/includes/scripts.php'; ?>
