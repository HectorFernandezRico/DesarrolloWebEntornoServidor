<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parámetros</title>
</head>

<body>
    <h2>Contenido del array $_GET</h2>
    <?php
        if (count($_GET) == 0) {
            echo "<h3>No se han recibido parámetros</h3>";
        } else {
            echo '<table border="1">';
            echo "<tr><th>parámetro</th><th>valor</th></tr>";
            foreach ($_GET as $parametro=>$valor) {
                echo "<tr><td>$parametro</td><td>$valor</td></tr>";
            }
            echo '</table>';
        }
    ?>
</body>

</html>