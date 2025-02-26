<?php
session_start(); // Iniciar la sesión

$palabra = "PASATIEMPO"; 
$longitud = strlen($palabra);

// Inicializar variables de sesión si no existen
if (!isset($_SESSION['aciertos'])) {
    $_SESSION['aciertos'] = str_repeat('_', $longitud);
}

if (!isset($_SESSION['fallos'])) {
    $_SESSION['fallos'] = 0;
}

// Inicializar mensajes de sesión si no existen
if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}

if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = "";
}

// Procesar la letra ingresada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['letra'])) {
    $letra = strtoupper(trim($_POST['letra'])); // Convertimos a mayúscula y eliminamos espacios en blanco

    // Validación: No vacío, no número y longitud exacta de 1
    if ($letra === "" || is_numeric($letra) || strlen($letra) !== 1) {
        $_SESSION['error'] = "Por favor, introduzca una sola letra válida (A-Z).";
    } else {
        if (letraEnPalabra($palabra, $letra, $_SESSION['aciertos'])) {
            // Si la letra está en la palabra, no hacemos nada adicional
        } else {
            $_SESSION['fallos']++;
        }
    }

    // Redirigir para evitar el reenvío del formulario
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Comprobaciones finales
if ($_SESSION['fallos'] >= 10) {
    $_SESSION['mensaje'] = "¡¡HAS MUERTO AHORCADO!!";
    session_destroy(); // Destruir la sesión
}

if ($_SESSION['aciertos'] === $palabra) {
    $_SESSION['mensaje'] = "¡¡HAS GANADO!!";
    session_destroy(); // Destruir la sesión
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

// Leer mensajes de sesión
$error = $_SESSION['error'];
$mensaje = $_SESSION['mensaje'];

// Limpiar mensajes después de ser mostrados
$_SESSION['error'] = "";
$_SESSION['mensaje'] = "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Juego del Ahorcado</title>
</head>
<body>
    <h1>Juego del ahorcado</h1>
    <p>Pruebe una letra:</p>
    <form method="post">
        <input type="text" name="letra" maxlength="1">
        <button type="submit">Probar</button>
    </form>
    <p style="color: red;"><?php echo $error ? $error : ""; ?></p>

    <p><?php echo implode(" ", str_split($_SESSION['aciertos'])); ?></p>
    <p>Fallos: <?php echo $_SESSION['fallos']; ?>/10</p>

    <h2><?php echo $mensaje ? $mensaje : ""; ?></h2>
</body>
</html>