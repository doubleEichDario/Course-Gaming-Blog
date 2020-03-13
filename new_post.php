<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<div id="principal">
    <div class="container">
        <div class="center">
            <h1>Crear Entrada</h1>
        </div>
        <form action="save_post.php" method="POST">
            <div class="row">
                <div class="col-8 off-2 my-3">
                    <label for="new_title">Título</label>
                    <input type="text" name="new_title">
    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'new_title') : ''; ?>
                    <label for="new_description">Descripción</label>
                    <textarea rows="10" name="new_description"></textarea>
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
                    <input class="my-2 auto" type="submit" value="Crear">
                </div><!-- col-8 off-2 -->
            </div><!-- row -->
            

        </form>
<?php deleteError(); ?>

    </div><!-- container --> 
</div>
<?php require_once 'includes/scripts.php'; ?>
<?php require_once 'includes/footer.php'; ?>
