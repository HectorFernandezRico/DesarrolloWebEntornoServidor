<?php
// CÓDIGO DE CONTROL
// Obtención de información financiera con PHP
// A travé de la API de FMP (finantial modeling prep)
$resultado = "";
$mensaje = "";
$json = "";
$fecha = "";
$imagen = "";

if (isset($_GET['numero']) && isset($_GET['submit'])) {
    if (!empty($_GET['numero'])) {
        $URL = "https://xkcd.com/" . $_GET['numero'] . "/info.0.json";

        // Obtengo la información con file_get_contents, que almacena
        // el resultado en un string.
        if ($resultado = @file_get_contents($URL)) {
            $json = json_decode($resultado, true);
            $fecha = "Fecha de publicación: " . $json['day'] . "-" . $json['month'] . "-" . $json['year'];
            $imagen = '<img src="' . $json['img'] . '" alt="' . $json['alt'] . '">';

            if (empty($json)) {
                $mensaje = $http_response_header[0] . " Numero no encontrada";
            }
        }
        // Accedo a un web service de finanzas
        // INdico la URL de la raiz del servicio

    } else {
        $mensaje = $http_response_header[0];
    }
} else {
    $mensaje = "Indique el numero del chiste y haga click en el botón";
}

?>
<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XKCD</title>
</head>

<body>
    <h3>Consigue tu chiste</h3>
    <p>Indica que numero entre el 1 y el 3035</p>
    <form method="get" action="">
        <p>
            <label for="numero">Escriba su número: </label>
            <input type="number" name="numero" id="numero">
        </p>
        <p>
            <input type="submit" name="submit" value="Obten tu chiste">
        </p>
    </form>
    <p>
        <?= $fecha ?></p>
    <p><?= $imagen ?></p>
    <p style="color:blue">
        <?= $mensaje ?>
    </p>
    <pre style="border: 2px solid blue; padding:5px;">
        <?php print_r($json) ?>
        <?php print_r($resultado) ?>
    </pre>
</body>

</html>