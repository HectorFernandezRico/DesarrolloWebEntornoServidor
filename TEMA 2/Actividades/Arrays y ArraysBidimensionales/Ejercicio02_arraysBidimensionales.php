<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensional</title>
    <style>
        table{
            margin: auto;            
        }
        td {
            border: 2px solid blue;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <?php

            $personas = [
                ["nombre" => "Marta", "altura" => 165, "email" => "marta.olmedilla@educa.madrid.org"],
                ["nombre"=> "Pedro", "altura"=> 173, "email" => "p@gmail.com"],
                ["nombre"=> "Juan", "altura"=> 187, "email" => "j@gmail.com"],
                ["nombre"=> "Carlos", "altura"=> 175, "email" => "c@gmail.com"],
                ["nombre"=> "Nacho", "altura"=> 176, "email" => "n@gmail.com"],
            ];

            echo "<tr><td>Nombre</td><td>Altura</td><td>Email</td></tr>";
            foreach ($personas as $posicion => $valor) {
                echo"<tr>";
                    foreach ($valor as $valorInterno) {
                        echo "<td>$valorInterno</td>";
                    }
                "</tr>";
            }
            

        ?>
    </table>
</body>
</html>