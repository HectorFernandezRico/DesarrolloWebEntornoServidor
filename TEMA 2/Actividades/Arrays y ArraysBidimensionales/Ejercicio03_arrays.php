<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <style>
        h1 {
            margin: auto;
        }
        table{
            margin: auto;
        }
        td {
            border: 2px solid blue;
            align-content: center;
        }
    </style>
</head>
<body>
    <h1>Altura media: </h1>
    <table>
        
        <?php
                $alturaMedia = 0;
                    $personas = [
                        "Pablo" => "185",
                        "José"=> "187",
                        "Alejandro"=> "176",
                        "Alex"=> "186",
                        "Enrique"=> "188",
                        "Saúl"=> "179"
                    ];

                    foreach ($personas as $nombre => $altura) {
                        $alturaMedia += $altura;
                    }
                    $alturaMedia= $alturaMedia/count( $personas );
                    
                    $personas["Media"] = $alturaMedia;

                   foreach ($personas as $nombre => $altura) {
                    echo "<tr><td>$nombre</td><td>$altura</td></tr>";
                   }
            ?>

    </table>
    
</body>
</html>
