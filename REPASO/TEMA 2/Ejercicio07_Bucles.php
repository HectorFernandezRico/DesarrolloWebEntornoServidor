<?php
$mensaje = "Bucles";
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
    <h1><?= $mensaje ?></h1>
    <?php
        $numero = 11;
        echo "<h3>----------Bucle While----------</h3>";
        while ($numero >= 3) {
            echo "<p>El número es: $numero</p>";
            $numero -= 2;
        }
    ?>

    <?php
        $numero = 11;
        echo "<h3>----------Bucle Do...While----------</h3>";
        do {
            echo "<p>El número es: $numero</p>";
            $numero -= 2;
        } while ($numero >= 3);
    ?>
    <?php
        $numero = 11;
        echo "<h3>----------Bucle For----------</h3>";
        for ($i = $numero; $i >= 3; $i -= 2) {
            echo "<p>El número es: $i</p>";
        }
    ?>
    <?php
        $numero = 11;
        echo "<h3>----------Bucle For (Alternativo)----------</h3>";
        for ($i = $numero; $i >= 3; $i -= 2) :
            echo "<p>El número es: $i</p>";
        endfor;
    ?>
    <?php
        $numero = 11;
        echo "<h3>----------Bucle For Each----------</h3>";
        foreach (range($numero, 3, -2) as $i) {
            echo "<p>El número es: $i</p>";
        }
    ?>
</body>
</html>