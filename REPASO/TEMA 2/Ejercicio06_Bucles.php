<?php
    $edad = 30;
    $año = 2000;
    $mensaje = "";
    do {
        $edad += 1;
        $año += 1;
        if ($edad < 40) {
            $mensaje = "En el año $año tengo $edad años y soy joven";
            
        } else {
            $mensaje = "En el año $año tengo $edad años y se acabó la juventud";
        }
        
    } while ($edad <= 40);
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
    $edad = 30;
    $año = 2000;
    $mensaje = "";
    do {
        $edad += 1;
        $año += 1;
        if ($edad <= 39) {
            echo "En el año $año tengo $edad años y soy joven" . "<br>";
            
        } else {
            echo "En el año $año tengo $edad años y se acabó la juventud" . "<br>";
        }
        
    } while ($edad <= 39);
?>
</body>
</html>