<?php
$mensaje = "Ejercicio 2.1: Arrays";

for ($i=0; $i<50;$i++) {
    $array[$i] = rand(0,99);
}
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
    <h3>
        <?php 
            echo "El array es: ";
            foreach ($array as $numero) {
                echo "$numero - ";
            }
        ?>
    </h3>
</body>
</html>
