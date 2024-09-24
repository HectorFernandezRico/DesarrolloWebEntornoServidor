<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio01: Arte y Passwords</title>
</head>
<body>
    <h1><b>Héctor Fernández</b></h1>
    <?php
        echo"El hash tipo " . '"sha256"' . " de " . '"Héctor Fernández"' . " es ";    
        echo hash("sha256","Héctor Fernández");
    ?>

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