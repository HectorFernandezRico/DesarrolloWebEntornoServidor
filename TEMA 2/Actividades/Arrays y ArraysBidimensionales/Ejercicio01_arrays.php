<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>

<?php

    
    $array = [];
    for ($i=0; $i < 51; $i++) { 
        $numero = rand(0,99);
        $array[] = $numero;
    }
    echo "<pre>";
    print_r($array);
    echo "</pre>";

?>

</body>
</html>