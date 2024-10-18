<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de formulariot</title>
</head>
<body>
    <pre>
        <?php print_r($_POST)?>
    </pre>
    <p>Adivina un número del 1 al 10</p>
    <form method="post">
        <label for="prueba">Prueba</label>
        <input type="number" name="prueba" id="prueba" min="1" max="10" title="Selecciona un número entre 1 y 10"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>