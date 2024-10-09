<?php
  // Parte 1: Almaceno las alturas y calculo la media
  $alturas = [
    "Marta" => 165,
    "Pedro" => 172,
    "Juan" => 187,
    "Nacho" => 177,
    "Lola" => 168,
    "Luis" => 190
  ];
  // Cálculo de la media, redondeada a dos dígitos decimales
  $suma = 0;
  foreach ($alturas as $altura) $suma = $suma + $altura;
  $media = round($suma / count($alturas),2);
?>

<!-- Visualización HTML5 de la información -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Altura media</title>
    <style>
      td {
        border: 2px solid lightblue;
        padding: 10px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <h1>Altura media</h1>
    <table>
      <?php
          // Añado una fila por cada elemento del array
          foreach ($alturas as $nombre => $altura) {
            echo "<tr>";
            echo "<td>$nombre</td><td>$altura</td>";
            echo "</tr>";
          }
      ?>
      <!-- Añado una fila al final con la media -->
      <tr><td>MEDIA</td><td><?=$media?></td></tr>
    </table>
  </body>
</html>
