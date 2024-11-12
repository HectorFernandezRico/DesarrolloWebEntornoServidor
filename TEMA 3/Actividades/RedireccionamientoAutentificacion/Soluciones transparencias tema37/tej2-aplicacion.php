<?php
    // Inicializo la información
    session_start();
    $usuario = "";
    $mensaje = "";

    // Compruebo si estoy logada o no. Si no lo estoy, requiero un login
    if (isset($_SESSION['usuario'])) {
        $usuario = "Usuario: " . $_SESSION['usuario'];
        $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
        unset ($_SESSION['mensaje']);
    } else { // Si no estaba logado, voy al programa de login
       $_SESSION['mensaje'] = "Haz login para iniciar la sesión";
       header("Location: tej2-login.php");
       return;
    }

    // Compruebo si he accedido con un POST, en cuyo caso guardo los datos y
    // salgo para entrar de nuevo con GET
    if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['sexo'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellidos'] = $_POST['apellidos'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['sexo'] = $_POST['sexo'];
        header("Location: tej2-aplicacion.php");
        return;
    }
    // AQUÍ SÓLO LLEGO SI HE ENTRADO CON UN GET!!!!

    // Gestión de la persistencia. Si tengo datos en la sesión los muestro en el form
    $nombre_val = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
    $apellidos_val = isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : "";
    $email_val = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $sexo_val = isset($_SESSION['sexo']) ? $_SESSION['sexo'] : "";

    // Para la persistencia del radio button, necesito la palabra "checked"
    function chequeado($sexo, $sexo_val) {
        if ($sexo == $sexo_val) {
            return "checked";
        } else {
            return "";
        }
    }

    // Gestión de los mensajes. Si hay mensajes en la sesión, los muestro con un flash
    // y luego los borro
    $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLICACION</title>
</head>
<body>
    <h2>APLICACIÓN</h2>
    <p style="color:darkmagenta"><?=$usuario?></p>
    <p style="color:blue"><?=$mensaje?></p>
    <form method="post">
        <fieldset>
            <legend>Datos</legend>
            <p>Nombre <input name="nombre" value="<?=$nombre_val?>"></p>
            <p>Apellidos <input name="apellidos" value="<?=$apellidos_val?>"></p>
            <p>Email <input type="email" name="email" value="<?=$email_val?>"></p>
            <p>Sexo 
                <input type="radio" name="sexo" value="H" <?=chequeado("H",$sexo_val)?>> Hombre
                <input type="radio" name="sexo" value="M" <?=chequeado("M",$sexo_val)?>> Mujer
            </p>
        </fieldset>
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>

    <!--a href="login.php">Login</!--a-->
    <p><a href="tej2-logout.php">Logout</a></p>
</body>
</html>