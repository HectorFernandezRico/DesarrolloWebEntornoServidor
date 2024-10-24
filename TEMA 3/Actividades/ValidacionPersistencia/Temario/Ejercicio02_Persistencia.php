<?php
$texto = "";
if (isset($_GET["texto"])) {
    $texto = htmlentities($_GET["texto"]);
    if (strlen($texto) <= 0) {
        echo "Texto no recibido en el servidor";
    } else if (is_numeric($texto)) {
        echo "El texto " . $texto . " es numérico";
    } else if (strlen($texto) > 0) {
        echo "El texto " . $texto . " es un string";
    }
} else {
    echo "Texto no recibido en el servidor";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Isset</title>
    
</head>
<style>
        body {
            text-align: center;
        }

        div {
            border: 2px solid black;
            background-color: lightseagreen;
        }
    </style>
<body>
    <h1>Mi formulario.</h1>

    <div>
        <form method="get">
            <p>
                <label for="texto">Texto</label>
                <input type="text" name="texto" id="texto" value="<?= $texto ?>">
                <input type="submit" value="enviar" />
            </p>
        </form>
    </div>
    <?php
    print_r(value: $_GET["texto"]);
    ?>
</body>

</html>