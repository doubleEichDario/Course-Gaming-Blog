<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>
<?php

    if(isset($_GET['id'])) {
      $post = getPost($db, $_GET['id']);
      $row = mysqli_fetch_assoc($post);

      // var_dump($row);
      // die();
    }


 ?>

  <div id="principal">
    <h1>Editar Entrada</h1>


    <form action="process_editing_post.php" method="POST">

      <div class="new_block_form_box">
        <input type="hidden" name="editing_post_id" value="<?= $row['id'] ?>">
        <label for="edit_title">Cambia el Título</label>
        <input type="text" name="edited_title" value="<?= $row['title'] ?>">

        <label for="edited_description">Cambia la Descripción</label>
        <textarea name="edited_description"><?= $row['description'] ?></textarea>

        <label for="category">Cambia la Categoría</label>
        <select name="category">
          <?php
            $categories = getCategories($db);
            if(!empty($categories)):
             while($category = mysqli_fetch_assoc($categories)):
          ?>
              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php
             endwhile;
            endif;
          ?>

        </select>
        <input type="submit" name="send_new_category" value="Cambiar">
      </div>

    </form>
    



  </div>
  <!-- Scripts -->
  <?php require_once 'includes/scripts.php'; ?>
  <!-- Sidebar -->
  <?php require_once 'includes/footer.php'; ?>
