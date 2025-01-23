<?php
// CÓDIGO DE CONTROL
// Obtención de información financiera con PHP
// A travé de la API de FMP (finantial modeling prep)
$resultado = "";
$mensaje = "";
$json = "";
if (isset($_GET['empresa']) && !empty($_GET['empresa'])) {
    // Accedo a un web service de finanzas
    // INdico la URL de la raiz del servicio
    $baseURL = "https://financialmodelingprep.com/api/v3/profile/";
    // Concateno la clave de la api como parámetro de la URL
    $finalURL = $baseURL . $_GET['empresa']
        . "?apikey=ae49af890537128961fda6b01299ff79";
    // Obtengo la información con file_get_contents, que almacena
    // el resultado en un string.
    if ($resultado = file_get_contents($finalURL)) {
        $json = json_decode($resultado, true);
        foreach ($json as $uno) {
            $mensaje = "Capital de " . $_GET['empresa'] . ": "
                . (isset($uno['mktCap'])
                    ? $uno['mktCap'] . " $" : "No encuentra el capital");
        }
        if (empty($json)) {
            $mensaje = $http_response_header[0] . " Empresa no encontrada";
        }
    } else {
        $mensaje = $http_response_header[0];
    }
} else {
    $mensaje = "Indique el nombre de una empresa y haga click en el botón";
}
?>
<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Obtención de información financiera</h3>
    <p>Indique la empresa y pulse "obtener capital"</p>
    <form action="">
        <p>
            <label for="nombre">Siglas en bolsa de la empresa: </label>
            <input type="text" name="empresa" id="empresa">
        </p>
        <p>
            <input type="submit" value="Obtener capital">
        </p>
    </form>
    <p style="color:blue">
        <?= $mensaje ?>
    </p>
    <pre style="border: 2px solid blue; padding:5px;">
        <?php print_r($json) ?>
    </pre>
</body>

</html>