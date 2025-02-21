<?php
    $mensaje = "Hola Mundo";
    echo("Hola Mundo");
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
    <h1><?=$mensaje?></h1>
    <h2><?= "Hola Mundo"?></h2>
    <h3><?= print("Hola Mundo")?></h3>
    <h4><?= print_r("Hola Mundo")?></h4>
</body>
</html>
