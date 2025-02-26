<?php


$palabra = "PASATIEMPO"; 
$longitud = strlen($palabra);

// Inicializar cookies si no existen
if (!isset($_COOKIE['aciertos'])) {
    $aciertos = str_repeat('_', $longitud);
    setcookie('aciertos', $aciertos, time() + 3600);
} else {
    $aciertos = $_COOKIE['aciertos'];
}

if (!isset($_COOKIE['fallos'])) {
    $fallos = 0;
    setcookie('fallos', $fallos, time() + 3600);
} else {
    $fallos = $_COOKIE['fallos'];
}

$mensaje = ""; // Mensaje de estado
$error = ""; // Mensaje de error en caso de entrada inválida

// Procesar la letra ingresada
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['letra'])) {
    $letra = strtoupper(trim($_GET['letra'])); // Convertimos a mayúscula y eliminamos espacios en blanco

    // Validación: No vacío, no número y longitud exacta de 1
    if ($letra === "" || is_numeric($letra) || strlen($letra) !== 1 ) {
        $error = "Por favor, introduzca una sola letra válida (A-Z).";
    } else {
        if (letraEnPalabra($palabra, $letra, $aciertos)) {
            setcookie('aciertos', $aciertos, time() + 3600);
        } else {
            $fallos++;
            setcookie('fallos', $fallos, time() + 3600);
        }
    }
}

// Comprobaciones finales
if ($fallos >= 10) {
    $mensaje = "¡¡HAS MUERTO AHORCADO!!";
    setcookie('aciertos', '',  - 3600);
    setcookie('fallos', '', - 3600);
}

if ($aciertos === $palabra) {
    $mensaje = "¡¡HAS GANADO!!";
    setcookie('aciertos', '', - 3600);
    setcookie('fallos', '',  - 3600);
}

// Función para verificar si la letra está en la palabra
function letraEnPalabra($palabra, $letra, &$aciertos) {
    $encontrada = false;
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] === $letra) {
            $aciertos[$i] = $letra;
            $encontrada = true;
        }
    }
    return $encontrada;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Juego del Ahorcado</title>
</head>
<body>
    <h1>Juego del ahorcado</h1>
    <p>Pruebe una letra:</p>
    <form method="get">
        <input type="text" name="letra" maxlength="1">
        <button type="submit">Probar</button>
    </form>
        <p style="color: red;"><?php echo $error? $error: "" ?></p>

    <p><?php echo implode(" ", str_split($aciertos)); ?></p>
    <p>Fallos: <?php echo $fallos; ?>/10</p>

        <h2><?php echo $mensaje ? $mensaje : "" ?></h2>
</body>
</html>
