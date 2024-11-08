<?php

    //Escritura
    $nombreFichero = "./files/ficheroEscrito.txt";
    $fichero = fopen($nombreFichero, "w");
    $contenido = "Escribo estooo";

    $bytesEscritos = fwrite($fichero, $contenido);

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
    <h3>Escritura en el fichero <?=$nombreFichero?></h3>
    <p>He escrito: <?=$bytesEscritos?> bytes</p>
</body>
</html>