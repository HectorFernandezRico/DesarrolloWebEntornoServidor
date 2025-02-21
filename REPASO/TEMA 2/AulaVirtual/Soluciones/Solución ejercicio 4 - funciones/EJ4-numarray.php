<?php
// DECLARACIÓN DE FUNCIONES

// FUNCION A: es_par retorna true si el parámetro es par, false si no lo es
function es_par ($numero) {
  if ($numero%2 > 0) return false;
  else return true;
}

// FUNCION B: aleatorio retorna un array de tamaño $tam con números aleatorios
// comprendidos entre $min y $max
function aleatorio($tam, $min, $max) {
  for ($i=0;$i<$tam;$i++) {
    $array[$i] = rand($min,$max);
  }
  return $array;
}
// FUNCION C: num_pares comprueba cuantos números pares
// hay en el array $array, retorna el número de pares
function num_pares (&$array) {
  $numero=0;
  for ($i=0;$i<count($array);$i++) {
    if (($array[$i] % 2) == 0) {
      $numero++;
    }
  }
  return $numero;
}

// INICIO DEL PROGRAMA PHP
// Prueba de la función es_par
$numero = 134;
if (es_par($numero)) echo "$numero es par!!<br/>";
else echo "$numero no es par !! <br/>";
// Visualización del array aleatorio
echo "<pre>";
print_r(aleatorio(10,50,59));
echo "</pre>";
// Prueba de la función num_pares
$array=[12,14,15,17,1,2,3]; // El array tiene 3 pares
$numpares = num_pares($array);
echo "Número de pares en el array: $numpares";

?>
