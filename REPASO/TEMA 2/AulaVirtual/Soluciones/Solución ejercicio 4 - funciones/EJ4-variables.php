<?php
  // Función que retorna el número mayor de los parámetros indicados
  function mayor() {
    // Opción A: He comentado el código de esta opción, es una sola línea !!!
    // Basta aplicar la función max de php al array de parámetros recibidos.
    // --->>>   return max(func_get_args());
    // Hasta aquí la opción A

    // Opción B: Aquí practicamos bucles y las funciones de argumentos variables
    $maximo = 0;
    for ($i=0; $i<func_num_args();$i++) {
      if ($maximo < func_get_arg($i))
            $maximo = func_get_arg($i);
    }
    return $maximo;
  }

  function otroMayor(...$numeros) {
    // OPCIÓN  A: Con bucles y manipulación del array $numero
    $maximo = 0;
    foreach($numeros as $numero) {
      if ($maximo < $numero) {
        $maximo = $numero;
      }
    }
    return $maximo;

    // OPCIÓN B: Utilizando max de php, sólo una línea !!
    // --->>>  return max($numeros);
  }

  // Pruebo la función mayor
  echo "El numero mayor es: " . mayor(23,1,67,3,9) ."<br/>";
  echo "El numero mayor es: " . otroMayor(23,1,67,3,9) . "<br/>";

  // Pruebo

?>