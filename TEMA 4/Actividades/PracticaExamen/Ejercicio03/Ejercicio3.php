<?php
session_start();
require_once("pdo03.php");

// Inicializar sesión y número correcto
if (!isset($_SESSION['numCorrecto'])) {
    $_SESSION['numCorrecto'] = rand(1, 100);
    $_SESSION['nIntentos'] = 0;
}

// Función para guardar ranking en la base de datos
function guardaRanking($nIntentos, $numeroAdivinado, $conexion) {
    try {
        $stmt = $conexion->prepare("INSERT INTO ranking (nIntentos, nAdivinado) VALUES (:nIntentos, :nAdivinado)");
        $stmt->bindParam(':nIntentos', $nIntentos, PDO::PARAM_INT);
        $stmt->bindParam(':nAdivinado', $numeroAdivinado, PDO::PARAM_INT);
        $stmt->execute();
        return "Ranking guardado con éxito.";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// Verifica la conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=nombre_de_la_base_de_datos', 'usuario', 'contraseña');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

// Procesar entrada del usuario
$mensaje = '';
$numeroIngresado = isset($_GET['numero']) ? $_GET['numero'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero'])) {
    if (empty($numeroIngresado)) {
        $mensaje = "<p style='color: red;'>Debes indicar un número</p>";
    } elseif (!is_numeric($numeroIngresado)) {
        $mensaje = "<p style='color: red;'>Dato incorrecto. Debes poner un número.</p>";
    } elseif ($numeroIngresado < 1 || $numeroIngresado > 100) {
        $mensaje = "<p style='color: red;'>El número tiene que estar entre 1 y 100</p>";
    } else {
        $numeroIngresado = (int)$numeroIngresado;
        $_SESSION['nIntentos']++; // Incrementar contador de intentos solo si es válido

        if ($numeroIngresado > $_SESSION['numCorrecto']) {
            $mensaje = "<p style='color: blue;'>El número correcto es menor</p>";
        } elseif ($numeroIngresado < $_SESSION['numCorrecto']) {
            $mensaje = "<p style='color: blue;'>El número correcto es mayor</p>";
        } else {
            $nIntentos = $_SESSION['nIntentos'];
            $numeroCorrecto = $_SESSION['numCorrecto'];

            // Guardar ranking en la base de datos
            $resultadoRanking = guardaRanking($nIntentos, $numeroCorrecto, $conexion);

            // Mensaje de acierto
            $mensaje = "<p style='color: green;'>¡Has acertado en $nIntentos intentos! El número correcto es $numeroCorrecto.</p>";
            $mensaje .= "<p>$resultadoRanking</p>";

            // Reiniciar juego
            $_SESSION['numCorrecto'] = rand(1, 100);
            $_SESSION['nIntentos'] = 0;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina un número</title>
</head>
<body>
    <h1>Adivina un número entre 1 y 100</h1>
    <form method="GET" action="">
        <input type="text" name="numero" value="<?= htmlentities($numeroIngresado) ?>">
        <input type="submit" value="Prueba">
    </form>
    <p><strong>Intentos realizados:</strong> <?= $_SESSION['nIntentos'] ?></p>
    <?= $mensaje ?>

    <!-- Botón para ver el ranking -->
    <br><br>
    <a href="HectorFernandez.php" class="btn-volver">Ver Ranking</a>
</body>
</html>
