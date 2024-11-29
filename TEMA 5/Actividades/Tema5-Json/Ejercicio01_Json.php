<?php
    session_start();
    require_once("pdo.php");

    $resultado = $pdo -> query("SELECT * FROM usuarios");

    while ($fila = $resultado -> fetch (PDO::FETCH_ASSOC)) {     
        $filas[] = $fila;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json</title>
</head>
<body>
    <h1>Json</h1>
    <br>
    <p>Este programa lee los datos de la tabla usuarios y los guarda en un archivo en formato JSON.</p>
    <br>
    <h3>Contenido de la tabla</h3>
    <table border="2px">    
            <?php
            foreach ($filas as $indice => $fila) {
                echo"<tr>";
                foreach ($fila as $indice2 => $valor) {
                    echo "<td>".$valor."</td>"     ;           }
               
                echo"</tr>";

            }
            ?>
    </table>
</body>
</html>