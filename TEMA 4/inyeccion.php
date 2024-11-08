<?php
    session_start();
    require_once("pdo.php");
    $mensaje ="";
    
    //Si viene un POST, realizo las acciones y redirecciono.
    if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
        
        //Compruebo que me hayan escrito un email y una password.
        if (empty($_POST['email']) && empty($_POST['password'])) {
            $_SESSION['mensaje'] = "Debe indicar un email y una password";
        } else {

            //Miro si en la tabla está ese email con esa password, y entonces dejo entar.
            //Si no existe en la tabla un email con esa password, no dejo entar
            $sql = "SELECT * FROM usuarios WHERE email = '" . $_POST['email']
                . "' and password = '" . $_POST['password'] . "'";
                $_SESSION['sql'] = $sql;
            $resultado = $pdo -> query($sql);
            $numeroRegistros = $resultado -> rowCount();

            if ($numeroRegistros > 0) {
                $_SESSION['mensaje'] = "Puedes entrar, login y password correctos";
            } else {
                $_SESSION['mensaje'] = "No puedes entrar, login y/o password correctos";
            }
        }

        //Redirecciono
        header('Location: ' . $_SERVER['PHP_SELF']);
        return;
    }
    
    //Si no entró con POST, llega hasta aquí y muestra el formulario
    //Mensajes FLASH
    $sql = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']);

    $sql = isset($_SESSION['sql']) ? $_SESSION['sql'] : "";
    unset($_SESSION['sql']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <p><?= $sql?></p>
    <form method="post">
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="submit" value="Enviar">
        </p>
    </form>
    <p><?= $mensaje?></p>
</body>
</html>