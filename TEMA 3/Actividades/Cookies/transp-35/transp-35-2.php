<?php
    // Inicializo variables que utilizo en la VISTA
    $visitas = 0;
    $mensaje = "";

    // Si hay una cookie incremento el contador de visitas
    if (isset($_COOKIE['visitas'])) {
        $visitas = $_COOKIE['visitas'] + 1;
    } 

    // Siempre envío una cookie con el valor de las visitas
    setcookie('visitas', $visitas, time() + 3600 * 24 * 7);

    // Según el número de visitas, muestro un mensaje u otro
    if ($visitas >= 10) {
        $mensaje = "Felicidades, eres un usurio premium";
    } else {
        $mensaje = "Bienvenido usuario";
    }

?>
<!-- VISTA -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contadores</title>
</head>
<body>
    <p>Visitas: <?=$visitas?></p>
    <p><?=$mensaje?></p>
</body>
</html>