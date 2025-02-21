<?php
  // Creamos el array
  $personas = [
    ["nombre" => "Marta", "altura" => 165, "email" => "marta.olmedilla@educa.madrid.org"],
    ["nombre" => "Pedro", "altura" => 173, "email" => "p@gmail.com"],
    ["nombre" => "Juan", "altura" => 187, "email" => "j@gmail.com"],
    ["nombre" => "Carlos", "altura" => 175, "email" => "c@gmail.com"],
    ["nombre" => "Nacho", "altura" => 176, "email" => "n@gmail.com"]
  ];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Personas</title>
    <style>
      tr:first-child {
        color: black;
        font-weight: bolder;
      }
      td {
        padding: 5px;
        border: 2px solid darkgrey;
      }
    </style>
  </head>
  <body>
    <!-- Mostramos el array en forma de tabla-->
    <table>
      <!-- Pinto una primera fila con las cabeceras -->
     <tr><td>Nombre</td><td>Altura</td><td>email</td></tr>
      <?php
        // Recorro el array para mostrar una persona por fila
          foreach ($personas as $persona) { // Una vuelta de bucle por persona
            echo "<tr>"; //  Una fila por persona
            foreach ($persona as $valor) { // Una vuelta por característica de esa persona
              echo "<td>$valor</td>"; // Un td por característica de esa persona
            }
            echo  "</tr>";
          }
      ?>
    </table>
</body>
</html>
