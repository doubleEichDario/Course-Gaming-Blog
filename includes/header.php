<?php require_once 'connection.php'; ?>
<!-- Functions -->
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  user-scalable=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/mylib.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/icons/foundation-icons/foundation-icons.css">
    <title>Blog de Videojuegos</title>
  </head>
  <body>
    <header>

      <div class="logo">
        <a href="index.php">
          Blog de Videojuegos
        </a>
      </div>

      <nav id="menu">
        <ul>
          <li><a href="index.php">Inicio</a></li>

          <?php
            $categories = getCategories($db);
            if(!empty($categories)):
            while($category = mysqli_fetch_assoc($categories)):
          ?>
          <li>
              <a href="categories.php?id=<?= $category['id'] ?>"><?= $category['name']?></a>
          </li>

          <?php
            endwhile;
            endif;
          ?>

          <li><a href="index.php">Sobre mi</a></li>
          <li><a href="index.php">Contacto</a></li>
        </ul>
      </nav>
    </header>
    <div id="contenedor">
