<?php
// Iniciamos la sesión
session_start();

// Inicializamos las variables
$nombres = "";
$nombre = "";
$mensaje = "";
$color = "";

// Verificamos si existen las variables de sesión, si no existen las inicializamos
if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}

if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = "";
}

if (!isset($_SESSION['nombres'])) {
    $_SESSION['nombres'] = "";
}

if (!isset($_SESSION['color'])) {
    $_SESSION['color'] = "";
}

// Procesamos el formulario cuando se envía
if (isset($_POST['enviar']) && isset($_POST['nombre'])) {
    // Guardamos el nombre en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
    // Establecemos el color del mensaje como rojo (indicando un error)
    $_SESSION['color'] = "red";
    
    // Validamos el campo nombre
    if (empty($_POST['nombre'])) {
        $_SESSION['mensaje'] = "Debe indicar un nombre";
    } else if (strlen($_POST['nombre']) > 10) {
        $_SESSION['mensaje'] = "No tiene que ser mayor de 10 carácteres";
    } else if (is_numeric($_POST['nombre'])) {
        $_SESSION['mensaje'] = "No debe ser un número";
    } else {
        // Si el nombre es válido, lo limpiamos de la sesión y actualizamos los mensajes y colores
        $_SESSION['nombre'] = "";
        $_SESSION['color'] = "green";
        $_SESSION['mensaje'] = "Nombre anotado con éxito";
        // Agregamos el nombre a la lista de nombres
        $_SESSION['nombres'] .= "<p>" . $_POST['nombre'] . "</p>";
    }
    // Redireccionamos a la misma página para evitar reenvío de formularios
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

// Procesamos la solicitud de borrar nombres
if (isset($_POST['borrar'])) {
    // Eliminamos la lista de nombres de la sesión
    unset($_SESSION['nombres']);
    // Establecemos el color del mensaje como verde (indicando éxito)
    $_SESSION['color'] = "green";
    $_SESSION['mensaje'] = "Se han eliminado todos los nombres de la lista";
    // Redireccionamos a la misma página para evitar reenvío de formularios
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

// Asignamos los valores de las variables de sesión a las variables locales y luego las eliminamos
$mensaje = $_SESSION['mensaje'] ? $_SESSION['mensaje'] : "";
unset($_SESSION['mensaje']);

$nombre = $_SESSION['nombre'] ? $_SESSION['nombre'] : "";
unset($_SESSION['nombre']);

$nombres = $_SESSION['nombres'] ? $_SESSION['nombres'] : "";

$color = $_SESSION['color'] ? $_SESSION['color'] : "";
unset($_SESSION['color']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <style>
        .color {
            color: <?= $color ?>;
        }
    </style>
</head>

<body>
    <h1>Nombre de tu futuro hijo</h1>
    <p>Lista de nombres cortos para un niño</p>
    <form action="" method="post">
        <!-- Campo para ingresar el nombre -->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlentities($nombre) ?>"> <br>
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Borrar todo" name="borrar">
    </form>
    
    <!-- Mostramos el mensaje con el color correspondiente -->
    <p class="color"><?= $mensaje ?></p>
    
    <h2>Mis nombres preferidos:</h2>
    <!-- Mostramos la lista de nombres -->
    <?= $nombres ?>
</body>

</html>
