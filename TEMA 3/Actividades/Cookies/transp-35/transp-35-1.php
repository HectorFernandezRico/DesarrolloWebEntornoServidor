<?php
    if (! isset($_COOKIE['marta'])) {
        setcookie('marta', 'junio', time() + 3600 * 3);
    }

    function muestra_cookies() {
        $tabla = "<table border=1>";
        foreach ($_COOKIE as $nombre => $valor) {
            $tabla .= "<tr>";
            $tabla .= "<td>$nombre</td><td>$valor</td>";
            $tabla .= "</tr>";
        }
        $tabla .= "</table>";
        return $tabla;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiCookie</title>
</head>
<body>
    <h3>Cookies</h3>
    <?=muestra_cookies();?>
</body>
</html>