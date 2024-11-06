<?php
    $pdo = new PDO ('mysql:host=db;port=3306;dbname=hfernandezdb', 'root', 'root');
    
    $resultado = $pdo -> query("SELECT * FROM pokemon");

    while ($fila = $resultado -> fetch (PDO::FETCH_ASSOC)) {     
        $filas[] = $fila;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table border="2px" text-align="center">
            <tr>
                <th>Pokedex</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripción</th>
            </tr>
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