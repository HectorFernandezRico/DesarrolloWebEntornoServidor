<?php
    // Relleno el array
    for ($i=0; $i<50;$i++) {
      $azar[$i] = rand(0,99);
    }
?>
<!-- Visualización HTML5 del array creado -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Aleatorio</title>
  </head>
  <body>
    <h3>Array con 50 números aleatorios</h3>
    <?php
    // Muestro el array
      echo "El array es: ";
      foreach ($azar as $numero) {
        echo "$numero - ";
      }
    ?>
  </body>
</html>