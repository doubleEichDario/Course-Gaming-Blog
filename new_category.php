<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

  <div id="principal">
      <div class="center">
          <h1>Crear Categorías</h1>
      </div>
      <div class="row my-3">
          <div class="col-4 off-4">
            <form action="save_category.php" method="POST">
                <label for="new_category">Introduce la nueva categoría</label>
                <input type="text" name="new_category">
                <input type="submit" name="send_new_category" value="Crear">
            </form>
          </div>
      </div>
  </div>

<?php require_once 'includes/scripts.php'; ?>
<?php require_once 'includes/footer.php'; ?>
