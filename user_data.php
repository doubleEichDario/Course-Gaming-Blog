<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">
  <h3>Modifica tus datos</h3>

  <!-- Registering Errors -->

  <?php if(isset($_SESSION['completed'])): ?>
     <div class="alert success-alert">
       <?= $_SESSION['completed']; ?>
     </div>

  <?php elseif(isset($_SESSION['errors']['general'])): ?>
    <div class="alert error-alert"><?= $_SESSION['errors']['general'] ?></div>
  <?php endif; ?>

  <form action="update_user_data.php" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= $_SESSION['user']['forename'] ?>">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'forename') : ''; ?>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" value="<?= $_SESSION['user']['surname'] ?>">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname') : ''; ?>

    <input type="submit" name="submit" value="Modificar">
  </form>
  <?php deleteError(); ?>

</div> <!-- Principal -->




























<!-- Scripts -->
<?php require_once 'includes/scripts.php'; ?>
<!-- Sidebar -->
<?php require_once 'includes/footer.php'; ?>
