<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

  <div id="principal">
    <h1>Crear Entrada</h1>

    <form action="save_post.php" method="POST">

      <div class="new_block_form_box">
        <label for="new_category">Introduce la nueva entrada</label>
        <input type="text" name="new_category">
        <input type="submit" name="send_new_category" value="Crear">
      </div>

    </form>

  </div>
  <!-- Scripts -->
  <?php require_once 'includes/scripts.php'; ?>
  <!-- Sidebar -->
  <?php require_once 'includes/footer.php'; ?>
