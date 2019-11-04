<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

  <div id="principal">
    <h1>Crear Entrada</h1>

    <form action="save_post.php" method="POST">

      <div class="new_block_form_box">
        <label for="new_title">Título</label>
        <input type="text" name="new_title">
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'new_title') : ''; ?>
        <label for="new_description">Descripción</label>
        <textarea name="new_description"></textarea>
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'new_description') : ''; ?>
        <label for="category">Categorías</label>
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
        <input type="submit" name="send_new_category" value="Crear">
      </div>

    </form>
    <?php deleteError(); ?>

  </div>
  <!-- Scripts -->
  <?php require_once 'includes/scripts.php'; ?>
  <!-- Sidebar -->
  <?php require_once 'includes/footer.php'; ?>
