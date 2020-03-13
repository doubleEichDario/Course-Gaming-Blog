
<aside id="sidebar">

    <!-- successful login -->
    <?php if(isset($_SESSION['user'])): ?>
    <div id="logged-user" class="bloque">
        <h3>Bienvenido, <?= $_SESSION['user']['forename'].' '.$_SESSION['user']['surname']; ?></h3>
        <!-- logged user actions -->
        <a class="block font-oswald lighter link" href="new_post.php">Crear Entrada</a>
        <a class="block font-oswald lighter link" href="new_category.php">Crear Categoría</a>
        <a class="block font-oswald lighter link" href="user_data.php">Mis Datos</a>
        <a class="block font-oswald lighter link" href="logout.php">Cerrar Sesión</a>
    </div>
    <?php endif; ?>

    <!-- searching -->
    <div id="search" class="bloque">
        <h3>Busca Entradas</h3>
        <form action="search_results.php" method="POST">
            <input type="text" name="search">
            <input class="button-attached" type="submit" value="">
            <i class="search-icon fi-magnifying-glass"></i>
        </form>
    </div>

    <!-- access -->
    <?php if(!isset($_SESSION['user'])): ?>
    <div id="acceso" class="bloque">
        <h3>Accede</h3>
    <?php if(isset($_SESSION['login_error'])): ?>
        <div class="alert error-alert">
            <?= $_SESSION['login_error'] ?>
        </div>
    <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Entrar">
        </form>
    </div>

    <!-- registering -->
    <div id="registro" class="bloque">
        <h3>Registrate</h3>
    <?php if(isset($_SESSION['completed'])): ?>
        <div class="alert success-alert">
            <?= $_SESSION['completed']; ?>
        </div>
    <?php elseif(isset($_SESSION['errors']['general'])): ?>
        <div class="alert error-alert"><?= $_SESSION['errors']['general'] ?></div>
    <?php endif; ?>
        <form action="registration.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'forename') : ''; ?>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname') : ''; ?>
            <label for="email">Email</label>
            <input type="email" name="email">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>
            <label for="password">Contraseña</label>
            <input type="password" name="password">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : ''; ?>
            <input type="submit" name="submit" value="Registrarme">
        </form>
    <?php deleteError(); ?>
    </div>
    <?php endif; ?>
   
</aside>
