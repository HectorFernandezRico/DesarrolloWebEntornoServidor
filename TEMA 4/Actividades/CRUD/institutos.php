<?php
session_start();
//require_once("pdo.php");
require_once("pdoCasa.php");



if (isset($_POST['modificar'])) {
    header("Location: cambiarInsti.php");
    return;
}

if (isset($_POST['borrar'])) {    
    header("Location: borrarInsti.php");
    return;
}

if (isset($_POST['anyadir'])) {
    header("Location: nuevoInsti.php");
    return;
}

?>
<?php
function mostrarTabla($pdo)
{
    $tabla = "";
    try {
        $query = "SELECT * FROM institutos";
        $resultado = $pdo->query($query);
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            // Concatenamos las filas a la tabla en vez de sobrescribirla
            $tabla .= '<tr>';
            $tabla .= '<td>' . htmlentities($fila["nombre"]) . "</td>";
            $tabla .= '<td>' . htmlentities($fila["direccion"]) . "</td>";
            $tabla .= '<td>' . htmlentities($fila["telefono"]) . "</td>";
            $tabla .= '<td>' . htmlentities($fila["email"]) . "</td>";
            $tabla .= '<td>' . '<form method="post">
                                    <input type="hidden" name="id" value="'. $fila["id"] .'">
                                    <input type="submit" name="modificar" value="modificar">
                                </form>' . '</td>';
            $tabla .= '<td>' . '<form method="post">
                                    <input type="hidden" name="id" value="'. $fila["id"] .'">
                                    <input type="submit" name="borrar" value="Borrar">
                                </form>' . '</td>';
            $tabla .= '</tr>';
        }
    } catch (Exception $ex) {
        $_SESSION['mensaje'] = "No se ha podido visualizar la tabla: " . $ex->getMessage();
        error_log("ERROR: en el programa" . $ex->getFile() .  " En la linea " .
            $ex->getFile() . " ERRORCODE: " . $ex->getCode() . 
            "ErrorMessage: " . $ex->getMessage());
    }
    return $tabla;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institutos</title>
</head>

<body>
    <h1>Gestión de Institutos</h1>
    <br>
    <br>

    <h1>Institutos</h1>

    <p>
        <a href="nuevoInsti.php"><button type="button">Añadir Instituto</button></a>
    </p>

    <table border="2px" text-align="center">
        <?= mostrarTabla($pdo) ?>
    </table>

    <a href="loginapp.php"><button type="button">Volver</button></a>

</body>

</html>
