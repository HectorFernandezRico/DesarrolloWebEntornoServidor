<?php
    if (!isset($_GET["texto"])) {
        $mensaje = "Texto no recibido en el servidor";
    } else {

        // Valido la información
        if (empty(trim($_GET["texto"]))) {
            $mensaje = "El texto está en blanco";
        } else if (is_numeric($_GET["texto"])) {
            $mensaje = "El texto enviado es numérico";
        } else if (is_string($_GET["texto"])) {
            $mensaje = "El texto enviado es un string";
        }
    }
?>

<!-- VISTA -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="./transp-33-1.css"/>
</head>
<body>
    <h2>Mi formulario</h2>
    <p><?=$mensaje?></p>
    <form class="celeste">
        <label for="texto">Texto </label>
        <input class="separado"id="texto" name="texto"/>
        <input class="separado" type="submit" value="Enviar"/>
    </form>
</body>
</html>