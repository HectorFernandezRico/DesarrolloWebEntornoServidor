<?php
// Inicializamos la variable $galleta con un valor de 0 y $mensaje como una cadena vacía.
$galleta = 0;
$mensaje = '';

// Verificamos si la cookie 'galletas' no está configurada
if (!isset($_COOKIE['galletas'])) {
    // Si no está configurada, configuramos una cookie 'galletas' con el valor de $galleta (0) que durará 24 horas.
    setcookie('galletas', $galleta, (time() + 3600 * 24));
} else {
    // Si la cookie 'galletas' está configurada, asignamos su valor a la variable $galleta.
    $galleta = $_COOKIE['galletas'];
}

// Verificamos si el parámetro 'comprar' ha sido enviado a través de la URL
if (isset($_GET['comprar'])) {
    // Si está presente, incrementamos la variable $galleta en 10.
    $galleta = $galleta + 10;
}

// Verificamos si el parámetro 'comer' ha sido enviado a través de la URL
if (isset($_GET['comer'])) {
    // Si está presente, verificamos si el valor de $galleta es 0.
    if ($galleta == 0) {
        // Si es 0, asignamos el mensaje de error a la variable $mensaje y mantenemos $galleta en 0.
        $mensaje = 'No te quedan galletas';
        $galleta = 0;
    } else {
        // Si no es 0, decrementamos el valor de $galleta en 1.
        $galleta = $galleta - 1;
    }
}

// Configuramos la cookie 'galletas' nuevamente con el valor actualizado de $galleta para que dure 24 horas.
setcookie('galletas', $galleta, (time() + 3600 * 24));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galletas</title>
    <style>
        div {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h1>Galletas</h1>

        <!-- Mostramos el número de galletas -->
        <p>Tienes <?= $galleta ?> galletas</p>

        <!-- Mensaje para indicar la acción a realizar -->
        <p>Indica si quieres comprar o comer galletas</p>

        <!-- Formulario con botones para comprar o comer galletas -->
        <form action="" method="get">
            <input type="submit" name="comprar" value="Comprar 10 galletas">
            <input type="submit" name="comer" value="Comer una galleta">
        </form>
    </div>
    
    <!-- Mostramos el mensaje de error si existe -->
    <?= $mensaje ?>
</body>

</html>
