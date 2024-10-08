<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>    
        td {
            border: 1px solid blue;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        
        <?php

            $tabla = [
                "fila1" => ["11", "12", "13"],
                "fila2"=> ["21","22","23"],
                "fila3"=> ["31","32","33"],
                "fila4"=> ["41","42","43"],
            ];
            foreach ($tabla as $Tb => $Tabla) {
                echo"<tr>";
                foreach ($Tabla as $key => $value) {
                    echo"<td>";
                    echo $value;
                    echo "</td>";
                }
                echo "</tr>";
            }

        ?>
    </table>
</body>
</html>
