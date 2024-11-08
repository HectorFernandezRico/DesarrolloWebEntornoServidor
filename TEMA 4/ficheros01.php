<?php

    //Abrir el fichero
    $nombreFichero = "./files/fichero01.txt";

    $fichero = fopen($nombreFichero, "r");

    //Ver su longitud
    $longitud = filesize($nombreFichero);
    
    //Leerlo y mostrar los datos
    if ($longitud > 0) {
        $contenido = fread($fichero, $longitud);
    } else {
        $longitud = "Longitud 0!!!";
        $contenido = "Fichero Vacio!!!";
    }

    //Cerrar el fichero
    fclose($fichero);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros</title>
</head>
<body>
    <h4>Lectura del fichero <?=$nombreFichero?></h4>
    <p>Longitud: <?=$longitud?></p>
    <p>Contenido: <?=$contenido?></p>
</body>
</html>