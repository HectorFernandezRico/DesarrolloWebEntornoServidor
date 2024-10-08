<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensional</title>
    <style>
        table{
            margin: auto;
            margin-top: auto;
        }
        td {
            border: 2px solid blue;
            align-content: center;
        }
    </style>
</head>
<body>
    <table>
    <?php
               
        for ($fila=0; $fila <= 7; $fila++) { 
            echo"<tr>";
            for ($columna=0; $columna <= 9; $columna++) { 
                echo "<td>";
                $array[$fila][$columna] = rand(0,1000);
                echo $array[$fila][$columna];
                echo "</td>";
            }
            echo "</tr>";
        }

    ?>
    </table>
</body>
</html>