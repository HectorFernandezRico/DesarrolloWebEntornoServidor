<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crackeo_2</title>
  <style>
    body {
      margin: auto;      
      text-align: center;      
    }
    table {
      margin: auto;      
    }
    th{
      background-color: lightseagreen;
    }
  </style>
   
</head>
<body>
    
    <?php
      function crackea($codigo_hash): string
      {
        // NOTA: Esta función sólo crackea passwords de dos caracteres numéricos
        $solucion = "No existe código de 4 dígitos para este HASH";
        $alfabeto = "0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; // Longitud 10
        // Utilizaré la fuerza bruta, probando todas las combinaciones posibles
        // de los dos dígitos de una password

        for ($i = 0; $i <= strlen($alfabeto) - 1; $i++) { // Para cada posible combinación del primer dígito
          $primerDigito = $alfabeto[$i];
          // Con el dígito anterior, pruebo todas las posibles combinaciones del segundo dígito
          for ($j = 0; $j <= strlen($alfabeto) - 1; $j++) {
            $segundoDigito = $alfabeto[$j];
            for ($k = 0; $k <= strlen($alfabeto) - 1; $k++) { //Recorremos con un tercer array para coger el tercer dígito de la clave
              $tercerDigito = $alfabeto[$k]; 
              for ($l = 0; $l <= strlen($alfabeto) - 1; $l++) { //Recorremos con un cuarto array para coger el cuarto dígito de la clave
                $cuartoDigito = $alfabeto[$l];
                // Obtengo esta combinación de primer y segundo dígitos
                $combinacion = $primerDigito . $segundoDigito . $tercerDigito . $cuartoDigito; //Añadimos el tercer y cuarto dígito a la combinacion y lo movimos dentro de los for.
                // Calculo el hash de la combinacion
                $codigo_prueba = hash("md5", $combinacion);
                // Comparo el hash de la password de prueba con el código que me dan
                // Si coincide, mi combinación es la password correcta!!
                // Si no coincide, sigo probando combinaciones
                if ($codigo_prueba == $codigo_hash) {
                  $solucion = $combinacion;
                }
              }

              data:
            }
          }
        }
        return $solucion;
      }

      $cliente = [
        "marta@europa.es" => "91e50fe1e39af2869d3336eaaeebdb43",
        "pedro@europa.es" => "3c0aec8e759a22ef8b2c6498b3f85a9f",
        "juan@europa.es" => "b75bd27b5a48a1b48987a18d831f6336",
        "alberto@europa.es" => "977f25398b95e1c577802c84a3d90d98",
        "carlos@europa.es" => "581b41df0cd50ace849e061ef74827fc",
        "nacho@europa.es" => "d74a214501c1c40b2c77e995082f3587"
      ];

      echo '<table border="1"><tr>
      <th>Email</th>
      <th>Clave</th>
      <th>Código hash de la clave (MD5)</th>
      </tr>';
      foreach ($cliente as $gmail => $hash) {
        echo "<tr><td>" . $gmail . "</td><td>" . crackea($hash) . "</td><td>" . $hash . "</td></tr>";
      }
      echo "</table>";
?>  
   
</body>
</html>