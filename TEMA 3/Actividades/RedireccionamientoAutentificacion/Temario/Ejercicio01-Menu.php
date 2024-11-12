<?php
    $mensaje = "";
    if (isset($_POST['numero']) and !empty($_POST['numero'])) {
        if (!is_numeric($_POST['numero'])) {
            $mensaje = "Tienes que poner un número";
        } else if ($_POST['numero'] < 1 || $_POST['numero'] > 4) {
            $mensaje = "Tienes que poner un número del 1 al 4";
        } else if ($_POST['numero'] == 1) {
            header('Location: https://www.google.es');
            return;
        } else if ($_POST['numero'] == 2) {
            header('Location: https://www.wikipedia.org');
            return;
        } else if ($_POST['numero'] == 3) {
            header('Location: https://stackoverflow.com/');
            return;
        } else if ($_POST['numero'] == 4) {
            header('Location: https://www.php.net/manual/es/index.php');
            return;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <h1>Elige una página del menú</h1>
    <p style="color:red"><?=$mensaje?></p>
    <ol>
        <li>
            Buscador de Google
        </li>
        <li>
            Wikipedia
        </li>
        <li>
            StackOverflow
        </li>
        <li>
            Manual de PHP
        </li>
    </ol>
    <form method="post">
        <p>
            <label for="numero">
                Introduzca un número para navegar a la página
            </label>
            <input type="text" name="numero" id="numero">
        </p>    
        <p>
            <input type="submit" name="submit" id="submit">
        </p>
    </form>
</body>
</html>