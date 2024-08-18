<?php require_once(dirname(__FILE__, 2) . '/layout/header.php'); ?>

    <h1>welcome view</h1>

    <a href=" <?= APP_ROOT . 'index.php?view=formulario&activity=gestion' ?>">Ingresar al formulario</a>

    <p>----------</p>

    <form action="index.php?controller=upload&activity=gpio" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php require_once(dirname(__FILE__, 2) . '/layout/footer.php'); ?>
