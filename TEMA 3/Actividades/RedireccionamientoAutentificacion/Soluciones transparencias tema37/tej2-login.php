<?php
    // Gestión del login con una sesión
    session_start();
    $mensaje = "";

    // Miro si han entrado con POST
    if (isset($_POST['usuario']) &&  isset($_POST['password'])) {
        // Valido la información
        if (empty($_POST['usuario'])) {
            $_SESSION['mensaje'] = "Debes indicar un usuario";
            header('Location: tej2-login.php');
            return;
        } else if ($_POST['password'] == 'marta1234') {
            $_SESSION['mensaje'] = "Bienvenido a la aplicación";
            $_SESSION['usuario'] = $_POST['usuario'];
            header('Location: tej2-aplicacion.php');
            return;
        } else {
            $_SESSION['mensaje'] = "Password incorrecta. Es el nombre de tu profe + 1234";
            header ('Location: tej2-login.php');
            return;
        }
    }

    // Gestión de mensajes en caso de entrada con GET
    $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']);
?>

<!-- VISTA -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Haz login a mi aplicación</h3>
    <form method="POST">
        <p>Usuario: <input type="text" name="usuario"></p>
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="Enviar"></p>
    </form>
    <p style="color: blue"><?=$mensaje?></p>
</body>
</html>