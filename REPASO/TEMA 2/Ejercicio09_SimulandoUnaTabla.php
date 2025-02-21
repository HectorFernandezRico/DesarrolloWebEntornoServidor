<?php
    $mensaje = "Simulando una tabla";
    $tabla = array(
        [11,12,13],
        [21,22,23],
        [31,32,33],
        [41,42,43]
    );
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
    <style>
        body {
            margin: auto;
            text-align: center;
            margin-top: 350px;
        }
        td {
            border: 2px solid blue;
        }
    </style>
</head>

<body>
    <h1><?= $mensaje ?></h1>
    <?php print_r($tabla); ?>
    <table align="center">
        <?php
            foreach ($tabla as $fila) {
                echo "<tr>";
                foreach ($fila as $columna) {
                    echo "<td>$columna</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>