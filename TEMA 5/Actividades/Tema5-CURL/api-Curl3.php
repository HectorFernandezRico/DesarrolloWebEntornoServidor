<?php
// ACCESO A API FINANCIERA CON CURL
// CÓDIGO DE CONTROL
$resultado = "";
$mensaje = "";
$json = "";
if (isset($_GET["submit"])) {
    // Utilizaremos el web service de finanzas
    // Indicamos la URL de la raiz del servicio
    $URL = "https://xkcd.com/" . rand(0, 3035) . "/info.0.json";

    // Utilizo cURL para acceder al servicio
    // Inicialización del recurso
    $ch = curl_init($URL);
    // Configuración de curl
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ejecuto curl: Envío Request HTTP
    $resultado = @curl_exec($ch);
    // Si curl se ejecutó sin error, retorna 0, sino un código de error.
    if (curl_errno($ch) === 0) {
        // Obtengo el status HTTP de la cabecera del response
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code === 200) {
            $json = json_decode($resultado, true);
            $fecha = "Fecha de publicación: " . $json['day'] . "-" . $json['month'] . "-" . $json['year'];
            $imagen = '<img src="' . $json['img'] . '" alt="' . $json['alt'] . '">';

            if (empty($json)) {
                $mensaje = "No se ha encontrado la empresa.";
            }
        } else { // Si no es 200, obtengo el status HTTP
            $mensaje = "error http: " . $http_code;
        }
    } else { // Si algo falla, muestro el error curl
        $mensaje = "Se produce el error curl: " . curl_error($ch);
    }
    // cierro el curl
    curl_close($ch); // RECORDAD !!! cerrar el curl
}
?>
<!-- CÓDIGO DE LA VISTA -->
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
    </pre>
</body>

</html>