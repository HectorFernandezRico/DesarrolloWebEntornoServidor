<?php

function generarNumeroAleatorio() {
    return rand(1, 100);
}

// Verifica si la cookie ya existe
if (!isset($_COOKIE['numCorrecto'])) {
    $numCorrecto = generarNumeroAleatorio();
    setcookie('numCorrecto', $numCorrecto, time() + 3600 * 3); // 3 horas
} else {
    $numCorrecto = $_COOKIE['numCorrecto'];
}

// Procesa la entrada del usuario si está disponible
$mensaje = '';
if (isset($_GET['numero'])) {
    $numeroIngresado = $_GET['numero'];
    if (empty($numeroIngresado)) {
        $mensaje = "<p style='color: red;'>Debes indicar un número</p>";
    } elseif (!is_numeric($numeroIngresado)) {
        $mensaje = "<p style='color: red;'>Dato incorrecto. Debes poner un número.</p>";
    } elseif ($numeroIngresado < 1 || $numeroIngresado > 100) {
        $mensaje = "<p style='color: red;'>El número tiene que estar entre 1 y 100</p>";
    } else {
        $numeroIngresado = (int)$numeroIngresado;
        if ($numeroIngresado > $numCorrecto) {
            $mensaje = "<p style='color: blue;'>El número correcto es menor</p>";
        } elseif ($numeroIngresado < $numCorrecto) {
            $mensaje = "<p style='color: blue;'>El número correcto es mayor</p>";
        } else {
            $mensaje = "<p style='color: blue;'>¡Has acertado! $numCorrecto es el número correcto.</p>";
            $numCorrecto = generarNumeroAleatorio();
            setcookie('numCorrecto', $numCorrecto, time() + 3600 * 3); // 3 horas
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adivina un número</title>
</head>
<body>
    <h1>Adivina un número entre 1 y 100</h1>
    <form method="GET" action="">
        <input type="text" name="numero" value="<?= isset($_GET['numero']) ? htmlentities($_GET['numero']) : '' ?>">
        <input type="submit" value="Prueba">
    </form>
    <?= $mensaje ?>
</body>
</html>