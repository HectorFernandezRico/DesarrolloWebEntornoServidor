<?php
    
    //El usuario adivina el número 33.
    if (isset($_POST['numero'])) {
        $numero = (int)$_POST['numero'] + 0; //Por si viene vacío.

        //Guardo el número en la sesión.
        $_SESSION['numero'] = $numero;
        if ($nuemro == 33) {
            $_SESSION['mensaje'] = "Has adivinado!!! El número es 33";
        } else if ($numero < 33) {
            $_SESSION['mensaje'] = "El número es demasiado bajo";
        } else if ($numero > 33) {
            $_SESSION['mensaje'] = "El número es demasiado alto";
        }

        //Tras guardar los mensajes de validación en la sesión.
        //Envío al navegador un response de redirección a este mismo programa,
        //pero con GET
        header('Location: ' . $_SERVER['PHP_SELF']);
        return;
    }
?>

    <!-- VISTA - Sólo llegan las peticiones GET -->
<?php
    //Si había un mensaje almacenado en la sesión, lo muestro
    $miMensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
    <style>
        .mensaje {
            color: purple;
        }
    </style>
</head>
<body>
    <h1>Adivina el número del 1 al 100</h1>
    <p class="mensaje"><?=$miMensaje?></p>
    <form method="post">
        <p>
            <label for="numero">Número: </label>
            <input type="number" name="numero" id="numero">
        </p>
        <p>
            <input type="submit" value="Probar">
        </p>
    </form>
</body>
</html>