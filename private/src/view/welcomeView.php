<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once(dirname(__FILE__, 3) . '/config/config.php'); ?>
</head>

<body>
    <h1>welcome view</h1>

    <a href=" <?= APP_ROOT . 'index.php?view=formulario&activity=gestion' ?>">Ingresar al formulario</a>

</body>

</html>