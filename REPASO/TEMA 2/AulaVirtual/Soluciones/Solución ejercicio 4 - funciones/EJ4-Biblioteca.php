<?php
  function arr_suma ($array, $numero) {
    foreach($array as $elemento) {
      $nuevoArray[] = $elemento + $numero;
    }
    return $nuevoArray;
  }
  function arr_resta ($array, $numero) {
    foreach($array as $elemento) {
      $nuevoArray[] = $elemento - $numero;
    }
    return $nuevoArray;
  }

  function arr_multiplica ($array, $numero) {
    foreach($array as $elemento) {
      $nuevoArray[] = $elemento * $numero;
    }
    return $nuevoArray;
  }

  function arr_divide ($array, $numero) {
    foreach($array as $elemento) {
      $nuevoArray[] = $elemento / $numero;
    }
    return $nuevoArray;
  }

  // Pruebo la biblioteca
  $array1 = [1,50,23,567,23];
  echo "<pre>";
  print_r (arr_suma($array1,1000));
  print_r (arr_resta($array1,1000));
  print_r (arr_multiplica($array1,1000));
  print_r (arr_divide($array1,1000));
  
  echo "</pre>";
?>