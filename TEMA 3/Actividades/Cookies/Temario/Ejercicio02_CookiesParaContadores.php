<?php 
//Este programa genera una cookie llamada visitas, cuyo valor es el número de visitas
// de un navegador a esta página.
$visitas = 0;
if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas']; // Recupero la cookie
    $visitas = $visitas + 1; // Incremento en 1 el nº de visitas
}
setcookie('visitas', $visitas, time() + 3600 * 7); // Vuelvo a generar la cookie, con el nuevo valor.
echo "El número de visitas es: $visitas";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies para Contadores</title>
</head>
<body>
    <h1>Cookies para Contadores</h1>
    <pre>
        <p>Estas son las veces que has entrado a la página: </p>
        <?php print_r($_COOKIE) ?>
    </pre>
    <?php 
        if ($visitas <= 9) {
            echo "Bienvenido usuario";
        } else if ($visitas >= 10 && $visitas <= 19) {
            echo "Felicidades, eres usuario avanzado.";
        } else if ($visitas >= 20) {
            echo "Felicidades, eres usuario premium.";
        }
    ?>
</body>
</html>