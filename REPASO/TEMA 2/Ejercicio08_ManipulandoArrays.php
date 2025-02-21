<?php
    $mensaje = "Arrays";
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
    </style>
</head>

<body>
    <h1><?= $mensaje ?></h1>
    <?php

        $capitales = array("Madrid", "París", "Roma", "Berlín", "Lisboa");
        $asociativo = [
            "España" => "Madrid",
            "Francia" => "París",
            "Italia" => "Roma",
            "Alemania" => "Berlín",
            "Portugal" => "Lisboa"
        ];

        echo "<h3>----------Información de los arrays----------</h3>";
        print_r($capitales);
        echo "<br>";
        print_r($asociativo);
        echo "<br>";
        var_dump($capitales);
        echo "<br>";
        var_dump($asociativo);


        echo "<h3>----------Bucle For----------</h3>";
        for ($i = 0; $i < count($capitales); $i++) {
            echo "Las capitales son: {$capitales[$i]}<br>";
        }
        echo "<br>";
        for ($i = 0; $i < count($asociativo); $i++) {
            echo "Las capitales son: {$capitales[$i]}<br>";
        }

        

        echo "<h3>----------Bucle For Each----------</h3>";
        foreach ($capitales as $capital) {
            echo "Las capitales son: {$capital}<br>";
        }
        echo "<br>";
        foreach ($asociativo as $pais => $capital) {
            echo "El pais es {$pais} y su capital es {$capital}<br>";
        }
    ?>
</body>
</html>