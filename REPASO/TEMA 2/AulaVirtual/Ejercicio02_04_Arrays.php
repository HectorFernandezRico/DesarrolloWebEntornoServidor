<?php
    $mensaje = "Altura Media";
    $asociativo = [
        'Marta' => '165' ,
        'Juan' => '180' ,
        'Pedro' => '175' ,
        'Ana' => '170' ,
        'Luis' => '190' ,
        'Sara' => '160'
    ];

    $media = 0;
    
    foreach ($asociativo as $nombre => $altura) {
        $media += $altura;
    }
    $media /= count($asociativo);

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
    <h3><?php print_r($asociativo); ?></h3>
    <h3>Media: <?=$media?> cm</h3>
    <table align="center">
        <?php
            foreach ($asociativo as $nombre => $altura) {
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$altura</td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td>MEDIA</td>
            <td><?=$media?></td>
        </tr>
    </table>
</body>
</html>