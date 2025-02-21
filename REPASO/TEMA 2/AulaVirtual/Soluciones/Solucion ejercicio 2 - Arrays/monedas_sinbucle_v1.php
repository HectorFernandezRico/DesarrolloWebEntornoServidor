<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=Device-width, initial-scale="1.0">
    <title>Monedas</title>
  </head>
  <body>
    <!-- VERSION 1 - SIN BUCLE PARA EL CÁLCULO Y SIN COMPROBAR SI QUEDA DINERO -->
    <?php
      // Parte 1: Cálculo sin controlar que queda dinero
      // Cuando ya se ha repartido todo, seguimos calculando
      $cantidad = 257;
      $b100 = (int) ($cantidad / 100);
      $resto = $cantidad % 100;
      $b50 = (int)($resto / 50);
      $resto = $resto % 50;
      $b20 = (int) ($resto / 20);
      $resto = $resto % 20;
      $b10 = (int)($resto / 10);
      $resto = $resto % 10;
      $m2 = (int)($resto / 2);
      $resto = $resto % 2;
      $m1 = $resto;

      // Parte 2 - Almaceno en array asociativo
      $importe["B100"] = $b100;
      $importe["B50"] =$b50;      
      $importe["B20"] =$b20;      
      $importe["B10"] =$b10;      
      $importe["M2"] =$m2;      
      $importe["M1"] =$m1;    
      
      // Parte 3 - Muestro una lista con la información
      echo "<br/>";
      echo "Para la cantidad $cantidad se emitirán: ";
      foreach ($importe as $tipoMoneda => $unidades) {
        if ($unidades > 0) echo "* $unidades $tipoMoneda ";
      }
      
  ?>
    </body>
</html>