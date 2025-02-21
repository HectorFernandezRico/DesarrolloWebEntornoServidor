<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Monedas</title>
  </head>
  <body>
    <p>
    </p>
      <?php
      // En esta versión utilizo un bucle único para cálculo y visualización
        $cantidad = 257;
        echo "Para la cantidad $cantidad se emitirán: ";
        // Creo un array que almacena los tipos de moneda de la máquina y su valor
        $maquina = [
          "B100" => 100,
          "B50" => 50,
          "B20" => 20,
          "B10" => 10,
          "M2" => 2,
          "M1" => 1
        ];
        
        // Realizo la división de la cantidad en los tipos de monedas existentes
        // en la máquina
        $resto = $cantidad;
        foreach ($maquina as $tipo => $valortipo) {
          // Averiguo cuántas unidades puedo poner del tipo de moneda
          $unidades = (int)($resto / $valortipo);
          // Guardo en el array $importe una línea con las monedas de ese tipo
          $importe[$tipo] = $unidades;
          // Actualizo el "resto" para seguir calculando con lo que queda
          $resto = $resto % $valortipo;
          // Muestro la información
          if ($unidades > 0) {
            echo "* $unidades $tipo ";
          }
        }
      ?>
    </p>
  </body>
</html>