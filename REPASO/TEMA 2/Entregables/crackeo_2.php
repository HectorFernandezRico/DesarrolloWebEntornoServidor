<?php
function crackea($codigo_hash) {
  // NOTA: Esta función sólo crackea passwords de dos caracteres numéricos
  $solucion = "No existe código de 2 dígitos para este HASH";
  $alfabeto="0123456789"; // Longitud 10
  // Utilizaré la fuerza bruta, probando todas las combinaciones posibles
  // de los dos dígitos de una password
  
  for ($i=0; $i<=9 ; $i++) { // Para cada posible combinación del primer dígito
    $primerDigito = $alfabeto[$i];
    // Con el dígito anterior, pruebo todas las posibles combinaciones del segundo dígito
    for ($j=0; $j<=9; $j++) {
      $segundoDigito = $alfabeto[$j];

      // Obtengo esta combinación de primer y segundo dígitos
      $combinacion = $primerDigito . $segundoDigito;
      // Calculo el hash de la combinacion
      $codigo_prueba = hash("md5",$combinacion);
      // Comparo el hash de la password de prueba con el código que me dan
      // Si coincide, mi combinación es la password correcta!!
      // Si no coincide, sigo probando combinaciones
      if ($codigo_prueba == $codigo_hash) {
        $solucion = $combinacion;
      }
    }
  }
  return $solucion;
}

$codigos=[
  "6512bd43d9caa6e02c990b0a82652dca",
  "b6d767d2f8ed5d21a44b0e5886680cb9",
  "182be0c5cdcd5072bb1864cdee4d3d6e",
  "f7177163c833dff4b38fc8d2872f1ec6",
  "ac627ab1ccbdb62ec96e702f07f6425b"
];

$claves=[];
foreach ($codigos as $codigo) {
  $claves[]=crackea($codigo);
}
echo "<h3>Claves</h3><pre>";
print_r($claves);
echo "</pre>";
?>