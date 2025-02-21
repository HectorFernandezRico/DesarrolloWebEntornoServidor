<?php
    $mensaje = "Array Bidimensional";
    
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
        }
        td {
            border: 2px solid blue;
        }
    </style>
</head>
<body>
    <h1><?=$mensaje?></h1>
    <table align="center">
        <?php
            for ($fila=0; $fila < 7; $fila++) { 
                echo "<tr>";
                for ($columna=0; $columna < 9; $columna++) { 
                    $aleatorio[$fila][$columna] = rand(1,1000);
                    echo"<td>";
                    echo $aleatorio[$fila][$columna];
                    echo"</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>