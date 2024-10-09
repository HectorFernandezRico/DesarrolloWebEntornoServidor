<?php
  // Relleno el array de arrays: 7 filas x 9 columnas
  for ($fila=0; $fila<7; $fila++) { // Cada vuelta creará una fila
    for ($columna=0; $columna<9; $columna++) { // De esa fila, cada vuelta crea un dato
      $aleatorio[$fila][$columna] = rand(0, 1000); // En la posición $columna de la $fila concreta, asigna un aleatorio
    }
  }
?>

<!-- Visualizo la información en HTML5 -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Aleatorio 1</title>
    <style>
      td {
        border: 2px solid darkgrey;
        padding: 5px;
      }
    </style>
  </head>
  <body>

    <!-- PARTE2 - Muestro el resultado en forma de tabla -->
    <table>
      <?php
        foreach ($aleatorio as $fila) { // Una vuelta por fila (en $fila)
          echo "<tr>";
          foreach ($fila as $dato) { // Recorre la fila, una vuelta por dato (en $dato)
              echo "<td>$dato</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>