<?php
    $nombre = "Héctor Fernández";
    $resultado = hash("sha256", $nombre);
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
    <h1><?=$nombre?></h1>
    <p>El hash tipo "sha256" de "Héctor Fernández" es <?=$resultado?></p>
    <h3><b>Arte ASCII:</b></h3>    

    <pre>
    H           H
    H           H
    H           H
    H           H
    H           H
    H H H H H H H
    H           H
    H           H
    H           H
    H           H 
    H           H
    </pre>
</body>
</html>
