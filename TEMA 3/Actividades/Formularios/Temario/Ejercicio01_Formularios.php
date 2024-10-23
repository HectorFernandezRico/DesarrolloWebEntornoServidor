<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_GET</title>
</head>
<body>
    <?php
        if(empty($_GET)) {
            echo"No se han recibido parámetros.";
        }else {
            echo '<table border="2">';
            echo'<tr>';
            echo '<th>Parámetro</th>
                    <th>Valor</th>';
            echo '</tr>';
            
            foreach ($_GET as $parametro => $valor) {
                echo'<tr>';
                echo "<td>$parametro</td>";
                echo "<td>$valor</td>";
                echo'</tr>';
                
            }
            echo '</table>';
        }
    ?>
</body>
</html>