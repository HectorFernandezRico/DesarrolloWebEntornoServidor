<?php
session_start();
require_once("pdo.php");
$mensaje = "";


if (isset($_POST["usuario"]) && isset($_POST["contraseña"]) && isset($_POST["submit"])) {

    if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
        $_SESSION["mensaje"] = "Tienes rellenar los campos";
    } else {

        if ($_POST["usuario"] === "admin" && $_POST["contraseña"] === "admin") {
            header('Location: usuarios.php');
            return;
        } else {
            $_SESSION["mensaje"] = "Error";
        }
    }
    //  Siempre que hago post, redireccion
    header('Location: loginadmin.php');
    return;
}

// AQUÍ SOLO LLEGA CON GET: Tras la redirección, o bien desde URL
        //Si no entró con POST, llega hasta aquí y muestra el formulario
        //Mensajes FLASH
        $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
        unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion</title>
</head>

<body>
    <form method="post">
        <p>
            <label for="usuario" name="usuario">Usuario</label>
            <input type="text" name="usuario">
        </p>
        <p>
            <label for="contraseña" name="contraseña">Contraseña</label>
            <input type="text" name="contraseña">
        </p>
        <p>
            <input type="submit" value="Enviar" name="submit">
            <a href="menu.php"><button type="button">Volver</button></a>

        </p>
        <p><?= $mensaje ?></p>
    </form>
</body>

</html>