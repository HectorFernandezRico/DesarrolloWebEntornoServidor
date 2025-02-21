<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Monedas</title>
  </head>
  <body>
    
  <!-- VERSION 2: Utilizando bucles -->
  <?php
  // Esta es la VERSION OPTIMA. Almaceno en el array $máquina la información
  // de los tipos de moneda que admite la máquina, y lo que vale cada una
  /*
     NOTA IMPORTANTE: Si añado a mi máquina un nuevo tipo, por ejemplo
     billetes de 5€, sólo tengo que modificar el contenido del array
     $máquina. El resto va solo, no utilizo cantidades fijas para calcular.
  */
    // La cantidad a dividir es 257
    $cantidad = 257;

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
    }
    // Muestro el resultado
    echo "Para la cantidad $cantidad se emitirán: ";
    foreach ($importe as $tipoMoneda => $unidades) {
      if ($unidades > 0) echo "* $unidades $tipoMoneda ";
    }
  ?>
  </body>
</html>