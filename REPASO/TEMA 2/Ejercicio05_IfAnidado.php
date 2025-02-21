<?php
    if (isset($_GET['hora']) && isset($_GET['enviar'])) {
         if ($_GET['hora'] >= 0 && $_GET['hora'] <= 6) {
            $mensaje = "Ya duermete.";
        } else if ($_GET['hora'] >= 7 && $_GET['hora'] <= 12) {
            $mensaje = "Es hora de desayunar.";
        } else if ($_GET['hora'] >= 13 && $_GET['hora'] <= 15) {
            $mensaje = "Es hora de comer.";
        } else if ($_GET['hora'] >= 16 && $_GET['hora'] <= 19) {
            $mensaje = "Es hora de un tentempie.";
        } else if ($_GET['hora'] >= 20 && $_GET['hora'] <= 24) {
            $mensaje = "Es hora de cenar.";
        }
    } else {
       $mensaje = "Tienes que introducir un número del 0 al 24.";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
    <style>
        body {
            margin: auto;
            text-align: center;
            margin-top: 350px;
        }
    </style>
</head>
<body>
    <form method="get">
        <p>
            <label for="hora" name="hora" id="hora">Hora: </label>
            <input type="number" name="hora" id="hora" min="0" max="24">
        </p>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>
    <h1><?=$mensaje?></h1>
</body>
</html>
