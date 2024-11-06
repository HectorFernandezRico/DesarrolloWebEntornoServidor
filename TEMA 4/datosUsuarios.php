<?php
    session_start();
    require_once('pdo.php');

    $mensaje = "";
    //Miro si entran con POST - valido, guardo y siempre redirecciono
    if (!(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password']))) {
        $_SESSION['mensaje'] = "Tiene que indicar todos los campos: nombre, email y password";
    } else { // Todos los datos son correctos
        // Inserto el registro
        $sql = "INSERT INTO usuarios (nombre, email, password)
                VALUES (:nombre, :email, :password)";

        $resultado = $pdo->prepare($sql);

        $resultado -> execute([
            ":nombre" => $_POST['nombre'],
            ":email" => $_POST['email'],
            ":password" => $_POST['password']
            ]);
            $_SESSION['mensaje'] = "Usuario insertado con éxito";
    //Aqui fuera de comprobaciones y acciones, redirecciono
    header('Location: ' . $_SERVER['PHP_SELF']);
    return;
    }

    

    //Si no entró con POST, ejecutará a partir de aquí
    //Gestión de mensajes - FLASH
    $mensaje = isset($_SESSION['mensaje'])? $_SESSION['mensaje']: "";
    unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertando con FORM</title>
</head>
<body>
    <h2>Registro Usuario</h2>
    <p><?=$mensaje?></p>
    <form method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre">
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email">
        </p>
        <p>
            <label for="nombre">Password: </label>
            <input type="text" id="password" name="password">
        </p>
        <div>
            <input type="submit" value="Registrarse" name="adduser">
        </div>
    </form>
</body>
</html>