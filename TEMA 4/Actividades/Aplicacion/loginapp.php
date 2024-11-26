<?php
session_start();
require_once("pdo.php");

$mensaje = "";
$email = "";

if (isset($_POST["enviar"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $_SESSION["mensaje"] = "Algún campo vacío";
    } else {
        try {
            // Consultamos el email en la base de datos para obtener la contraseña encriptada
            $sql = "SELECT email, password FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);

            // Ahora usamos la sintaxis correcta para pasar el parámetro
            $stmt->execute([':email' => $_POST['email']]);

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                // Comparamos la contraseña proporcionada con la contraseña encriptada
                if (password_verify($_POST['password'], $usuario['password'])) {
                    $_SESSION["mensaje"] = "Acceso concedido.";
                    // Aquí iría el código para redirigir a la página principal o dashboard
                        // Redirigimos al usuario después de procesar el formulario
                    header("Location: institutos.php");
                    return;
                } else {
                    $_SESSION["mensaje"] = "Contraseña incorrecta.";
                }
            } else {
                $_SESSION["mensaje"] = "Usuario no encontrado.";
            }
        } catch (Exception $e) {
            $_SESSION["mensaje"] = "Ha ocurrido un error: " . $e->getMessage();
            error_log("ERROR: en el programa" . $e->getFile() .  " En la linea " .
            $e->getFile() . " ERRORCODE: " . $e->getCode() . 
            "ErrorMessage: " . $e->getMessage());
        }
    }

    // Redirigimos al usuario después de procesar el formulario
    header("Location: loginapp.php");
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
    <title>Login</title>
</head>
<body>
    <!-- Mensaje de éxito o error -->
    <p><?= $mensaje ?></p>

    <!-- Formulario para login -->
    <form action="" method="post">
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="password">Contraseña:</label>
            <input type="text" name="password">
        </p>
        <p>
            <input type="submit" name="enviar" value="Iniciar sesión">
            <a href="menu.php"><button type="button">Volver</button></a>
        </p>
    </form>
    

</body>
</html>
