<?php require_once 'connection.php'; ?>
<!-- Functions -->
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  user-scalable=no">
    <link rel="stylesheet" href="assets\css\style.css">
    <!-- <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache"> -->
    <title>Blog de Videojuegos</title>
  </head>
  <body>
    <header id="cabecera">
      <div id="logo">
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
