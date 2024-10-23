<!-- Código de control -->
<?php
    $recepcion = "No se ha enviado información";
    $campos = [];
    if (! empty($_GET)) {
        $recepcion = "Se recibe request con GET";
        $campos = $_GET;
    } else if (! empty($_POST)) {
        $recepcion = "Se recibe request con POST";
        $campos = $_POST;
    }
?>

<!-- Código para la visualización -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba GET-POST</title>
</head>
<body>
    <h3>Prueba formularios GET y POST</h3>
    <p><?=$recepcion?></p>
    <ul>
        <?php
            foreach($campos as $nombre => $valor) {
                echo "<li><b>" . htmlentities($nombre) . ": </b>"
                    . htmlentities($valor) . "</li>";
            }
        ?>
    </ul>
</body>
</html>