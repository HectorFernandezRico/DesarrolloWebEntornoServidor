<?php
// Incluir la conexión a la base de datos
//require_once("pdo.php");
require_once("pdoCasa.php");  // Asegúrate de que este archivo está en la misma carpeta o ajusta la ruta

// Función para eliminar un registro del ranking
function eliminarRanking($ranking_id) {
    global $conexion;  // Utiliza la conexión global
    try {
        // Preparamos la consulta para eliminar el registro por ranking_id
        $stmt = $conexion->prepare("DELETE FROM ranking WHERE ranking_id = :ranking_id");
        $stmt->execute([':ranking_id' => $ranking_id]);  // Ejecutamos la consulta
        return "Registro borrado con éxito.";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();  // Si ocurre un error, lo mostramos
    }
}

// Comprobar si se solicita eliminar un registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $ranking_id = $_POST['ranking_id'];  // Obtenemos el ranking_id del formulario
    $mensaje = eliminarRanking($ranking_id);  // Llamamos a la función para eliminar el registro
}

// Obtener todos los registros de la tabla `ranking`, ordenados por el número de intentos
$stmt = $conexion->prepare("SELECT * FROM ranking ORDER BY nIntentos ASC");  // Consulta SQL
$stmt->execute();  // Ejecutamos la consulta
$ranking = $stmt->fetchAll();  // Obtenemos todos los registros
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
</head>
<body>
    <h1>Ranking</h1>

    <!-- Mensaje de eliminación -->
    <?php if (isset($mensaje)): ?>
        <p><?= htmlentities($mensaje) ?></p>
    <?php endif; ?>

    <!-- Tabla de Ranking -->
    <table>
        <thead>
            <tr>
                <th>Orden</th>
                <th>N° Intentos</th>
                <th>N° Adivinado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ranking as $index => $registro): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $registro['nIntentos'] ?></td>
                    <td><?= $registro['nAdivinado'] ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="ranking_id" value="<?= $registro['ranking_id'] ?>">
                            <input type="submit" name="eliminar" value="Borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botón Volver -->
    <br><br>
    <a href="Ejercicio3.php" class="btn-volver">Volver</a>
</body>
</html>
