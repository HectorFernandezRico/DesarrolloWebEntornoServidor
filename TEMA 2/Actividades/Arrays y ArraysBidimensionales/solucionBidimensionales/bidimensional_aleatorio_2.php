<?php
  /* Creo mis propias funciones:
      1- en_el_array: Comprobará que un número existe en mi tabla. in_array no funciona en anidados.
      2- minimo: Obtendrá el número mínimo de la tabla. min no funciona en anidados
      3- maximo: Obtendrá el número máximo de la tabla. max no funciona en anidados
  */
  /* Como la función in_array de PHP no funciona con arrays anidados (bidimensionales).
    me hago mi propia función y la llamo: en_el_array
  */
  function en_el_array($numero,$array) { // Indica si $numero está en un $array bidimensional
    // Recorro el array para recuperar cada fila
    foreach ($array as $fila) {
      if (in_array($numero,$fila)) return true;
    }
    return false;
  }
  /* Como la función max de PHP no funciona con arrays anidados (bidimensionales),
  me hago mi propia función y la llamo maximo
  */  
  function maximo ($array) {
    $max = 0;
    foreach ($array as $fila) {
      $maxfila = max($fila);
      if ($max < $maxfila) $max = $maxfila;
    }
    return $max;
  }

  /* Como la función min de PHP no funciona con arrays anidados (bidimensionales),
    me hago mi propia función y la llamo minimo
  */
  function minimo ($array) {
    $min = 1000000;
    foreach ($array as $fila) {
      $minfila = min($fila);
      if ($min > $minfila) $min = $minfila;
    }
    return $min;
  }
  ?>

<?php
  // RELLENO EL ARRAY Y CALCULO MÍNIMO Y MÁXIMO
  // Inicializo el array con un primer elemento, para que no de error la primera comprobación
  $aleatorio[][]=null;
  // Relleno el array de arrays: 7 x 9
  for ($fila=0; $fila<7; $fila++) { // Cada vuelta creará una fila
    for ($columna=0; $columna<9; $columna++) { // De esa fila, cada vuelta crea un dato          
      // Voy a calcular números aleatorios hasta encontrar uno que no esté repetido
      do {
          $numero = rand(1,70);
      } while (en_el_array($numero,$aleatorio));          
      // Una vez averiguado un aleatorio no repetido, se lo asigno a la celda
      $aleatorio[$fila][$columna] = $numero; // En la posición $columna de la $fila concreta, asigna el númreo
    }
  }
  // Calculo el mínimo
  $min = minimo($aleatorio);
  // Calculo el máximo
  $max = maximo($aleatorio);
?>

<!-- VISUALIZACIÓN HTML5 DE LA INFORMACIÓN -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Aleatorio 2</title>
    <style>
      td {
        border: 2px solid darkgrey;
        padding: 5px;
      }
      tr.filamax td {
        background-color: yellow;
      }
      td.maximo {
        color: red;
        font-weight: bold;
      }
      tr td.minimo {
        background-color: lightgray;
        font-weight: bolder;
      }
    </style>
  </head>
  <body>
    <table>
      <?php
        foreach ($aleatorio as $fila) { // Una vuelta por fila (en $fila)
          // Si en la fila está el máximo de la tabla, pongo fondo amarillo
          if (max($fila) == $max) echo "<tr class='filamax'>";
          else echo "<tr>";
          // Recorro la fila, una vuelta por dato (en $dato)
          foreach ($fila as $dato) {
              // Si el dato es el máximo, lo pongo en rojo y en negrita
              // Si el dato es el mínimo, lo pongo en fondo gris y negrita
              if ($dato == $max) echo "<td class='maximo'>$dato</td>";
              else if ($dato == $min) echo "<td class='minimo'>$dato</td>";
              else echo "<td>$dato</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>