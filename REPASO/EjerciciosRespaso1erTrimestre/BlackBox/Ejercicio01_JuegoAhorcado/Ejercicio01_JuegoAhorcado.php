<?php
// Parte 1: Función letraEnPalabra
function letraEnPalabra($palabra, $letra, &$aciertos) {
    $letra = strtoupper($letra); // Convierte la letra a mayúsculas
    $encontrada = false; // Inicializa la variable para verificar si la letra fue encontrada
    
    for ($i = 0; $i < strlen($palabra); $i++) { // Recorre cada carácter de la palabra
        if ($palabra[$i] === $letra) { // Si la letra coincide con el carácter actual
            $aciertos[$i] = $letra; // Coloca la letra en la posición correspondiente de aciertos
            $encontrada = true; // Marca que la letra fue encontrada
        }
    }
    
    return $encontrada; // Retorna true si la letra fue encontrada, false en caso contrario
}

// Parte 2: Ahorcado
session_start(); // Inicia la sesión

$palabra = "PASATIEMPO"; // Define la palabra a adivinar
$longitudPalabra = strlen($palabra); // Obtiene la longitud de la palabra
$fallos = isset($_SESSION['fallos']) ? $_SESSION['fallos'] : 0; // Recupera el número de fallos
$aciertos = isset($_SESSION['aciertos']) ? $_SESSION['aciertos'] : str_repeat(' ', $longitudPalabra); // Recupera los aciertos

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si se ha enviado un formulario mediante POST
    $letra = $_POST['letra']; // Obtiene la letra ingresada por el usuario
    
    if (letraEnPalabra($palabra, $letra, $aciertos)) { // Llama a la función para verificar la letra
        $_SESSION['aciertos'] = $aciertos; // Actualiza los aciertos en la sesión
    } else {
        $fallos++; // Incrementa el contador de fallos
        $_SESSION['fallos'] = $fallos; // Actualiza el número de fallos en la sesión
    }
    
    if ($fallos >= 10) { // Verifica si el número de fallos ha alcanzado 10
        echo "!!HAS MUERTO AHORCADO!!"; // Muestra el mensaje de derrota
        session_destroy(); // Destruye la sesión para resetear el juego
        exit; // Termina la ejecución del script
    } elseif (trim($aciertos) === $palabra) { // Verifica si el usuario ha acertado la palabra completa
        echo "!! HAS GANADO !!"; // Muestra el mensaje de victoria
        session_destroy(); // Destruye la sesión para resetear el juego
        exit; // Termina la ejecución del script
    }
} else {
    $_SESSION['fallos'] = 0; // Inicializa los fallos en la sesión
    $_SESSION['aciertos'] = str_repeat(' ', $longitudPalabra); // Inicializa los aciertos en la sesión
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego del Ahorcado</title>
</head>
<body>
    <h1>Juego del Ahorcado</h1>
    <p>Palabra: <?= htmlspecialchars($aciertos) ?></p> <!-- Muestra la palabra con los aciertos -->
    <p>Fallos: <?= $fallos ?></p> <!-- Muestra el número de fallos -->
    
    <form method="POST"> <!-- Formulario para que el usuario ingrese una letra -->
        <label for="letra">Introduce una letra (mayúscula):</label>
        <input type="text" id="letra" name="letra" maxlength="1" required> <!-- Campo de texto para ingresar la letra -->
        <button type="submit">Probar</button> <!-- Botón para enviar el formulario -->
    </form>
</body>
</html>