<?php
  // Creación y visualización del array en un bucle único
    for ($i=0; $i<50;$i++) {
      $azar[$i] = rand(0,99);
      echo $azar[$i];
      if ($i < 49) {
        echo " - ";
      }
    }
?>