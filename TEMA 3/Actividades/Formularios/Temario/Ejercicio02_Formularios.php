<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_post</title>
</head>
<body>
    <pre>
        <?php
            print_r($_POST);
        ?>
    </pre>
    <p>Adivina un número del 1 al 10</p>
    <form method="post">
        <p>
            <label for="prueba">Prueba</label>
            <input type="text" name="prueba" id="prueba" min="1" max="10"/>
        </p>
        <input type="submit"/>
    </form>
</body>
</html>