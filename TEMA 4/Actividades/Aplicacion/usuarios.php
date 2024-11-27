<?php
session_start();
//require_once("pdo.php");
require_once("pdoCasa.php");

$nombre = "";
$email = "";
$password = "";
$mensaje = "";
$paraGuardarEnBD = "";

// Condición corregida: verificamos si los campos están establecidos en el POST
if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["submit"])) {
    // Persistencia de datos
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Validar que no haya campos vacíos
    if (empty($nombre) || empty($email) || empty($password)) {
        $_SESSION["mensaje"] = "Algún campo vacío";
    } else {
        try {
            // Preparo el String con el INSERT: utilizo placeholders
            $sql = "INSERT INTO usuarios (nombre, email, password) 
                    VALUES (:nombre, :email, :password)";

            // Para mostrar luego
            $_SESSION["mensaje"] = "Datos insertados correctamente.";

            // Preparo la sentencia SQL
            $resultado = $pdo->prepare($sql);

            // Inserto los datos en la base de datos, usando los valores de los inputs
            $resultado->execute([
                ':nombre' => $_POST['nombre'],
                ':email' => $_POST['email'],
                ':password' => $paraGuardarEnBD = password_hash($password, PASSWORD_DEFAULT)
            ]);
        } catch (Exception $e) {
            $_SESSION["mensaje"] = "Ha ocurrido un error: " . $e->getMessage();
            error_log("ERROR: en el programa" . $e->getFile() .  " En la linea " .
            $e->getLine() . " ERRORCODE: " . $e->getCode() . 
            "ErrorMessage: " . $e->getMessage());
        }
    }
    header("Location: usuarios.php");
    return;
}

// Eliminar un usuario
if (isset($_POST['borrar'])) {
    if (isset($_POST['usuario_id'])) {
        try {
            $sql = "DELETE FROM usuarios WHERE usuario_id = :usuario_id";
            $resultado = $pdo->prepare($sql);
            $resultado->execute([
                ':usuario_id' => $_POST['usuario_id']
            ]);
            $_SESSION["mensaje"] = "Usuario borrado correctamente.";
        } catch (Exception $e) {
            $_SESSION["mensaje"] = "Ha ocurrido un error al borrar el usuario: " . $e->getMessage();
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

// Mensajes FLASH
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
unset($_SESSION['mensaje']);

// Función para mostrar la tabla de usuarios
function mostrarTabla($pdo) {
    $tabla = "";
    try {
        $query = "SELECT usuario_id, nombre, email, password FROM usuarios";
        $resultado = $pdo->query($query);
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            // Concatenamos las filas a la tabla en vez de sobrescribirla
            $tabla .= '<tr>';
            $tabla .= '<td>' . htmlentities($fila["nombre"]) . "</td>";
            $tabla .= '<td>' . htmlentities($fila["email"]) . "</td>";
            $tabla .= '<td>' . htmlentities($fila["password"]) . "</td>";
            $tabla .= '<td>' . 
                         '<form method="post">
                             <input type="hidden" name="usuario_id" value="' . htmlentities($fila["usuario_id"]) . '">
                             <input type="submit" name="borrar" value="Borrar">
                         </form>' . 
                         '</td>';
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
    <title>Usuarios</title>
</head>

<body>
    <h1>Gestión de Usuarios</h1>
    <br><br>

    <h1>Añade un nuevo Usuario</h1>
    <form method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlentities($nombre) ?>">
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="<?= htmlentities($email) ?>">
        </p>
        <p>
            <label for="password">Contraseña: </label>
            <input type="text" name="password" id="password" value="<?= htmlentities($password) ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Agregar Usuario">
            <a href="loginadmin.php"><button type="button">Volver</button></a>
        </p>
    </form>
    <p><?= $mensaje ?></p>

    <h1>Usuarios</h1>

    <table border="2px" text-align="center">
        <?= mostrarTabla($pdo) ?>
    </table>

</body>

</html>
