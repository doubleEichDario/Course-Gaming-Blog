<?php require_once 'includes/header.php'; ?>

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
    <div class="row">
        <div class="col-4 off-4 my-2">
            <a class="button" href="all_posts.php" role="button">Ver todas las entradas</a>
        </div>
    </div>

</div>
<?php require_once 'includes/sidebar.php'; ?>
<?php require_once '../blog_project/includes/footer.php'; ?>
<?php require_once '../blog_project/includes/scripts.php'; ?>
