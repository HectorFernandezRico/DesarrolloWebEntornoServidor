<?php
session_start();
//require_once("pdo.php");
require_once("pdoCasa.php");

$email = "";
$nombre = "";
$direccion = "";
$telefono = "";
$mensaje = "";
$paraGuardarEnBD = "";

// Condición corregida: verificamos si los campos están establecidos en el POST
if (isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["submit"])) {
    // Persistencia de datos
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Validar que no haya campos vacíos
    if (empty($nombre) || empty($direccion) || empty($telefono) || empty($email)) {
        $_SESSION["mensaje"] = "Algún campo vacío";
    } else {
        try {
            // Preparo el String con el INSERT: utilizo placeholders
            $sql = "INSERT INTO institutos (nombre, direccion, telefono, email) 
                    VALUES (:nombre, :direccion, :telefono, :email)";

            // Para mostrar luego
            $_SESSION["mensaje"] = "Datos insertados correctamente.";

            // Preparo la sentencia SQL
            $resultado = $pdo->prepare($sql);

            // Inserto los datos en la base de datos, usando los valores de los inputs
            $resultado->execute([
                ':nombre' => $_POST['nombre'],
                ':direccion' => $_POST['direccion'],
                ':telefono' => $_POST['telefono'],
                ':email' => $_POST['email']

            ]);
        } catch (Exception $e) {
            $_SESSION["mensaje"] = "Ha ocurrido un error: " . $e->getMessage();
            error_log("ERROR: en el programa" . $e->getFile() . " En la linea " .
                $e->getFile() . " ERRORCODE: " . $e->getCode() .
                "ErrorMessage: " . $e->getMessage());
        }
    }
    header("Location: institutos.php");
    return;
}

// Mensajes FLASH
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institutos</title>
</head>

<body>

    <h1>Añade un nuevo Institutos</h1>
    <form method="post">

        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlentities($nombre) ?>">
        </p>
        <p>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" value="<?= htmlentities($direccion) ?>">
        </p>
        <p>
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="<?= htmlentities($telefono) ?>">
        </p>

        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="<?= htmlentities($email) ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Entra">
            <a href="institutos.php"><button type="button">Volver</button></a>

        </p>
    </form>
    <p><?= $mensaje ?></p>


</body>

</html>