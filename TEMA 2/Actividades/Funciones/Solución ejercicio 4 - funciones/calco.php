<?php
  $titulo="aleatorio";
  include_once("cabecera.php");
?>
<?php
  // AQUÍ TU CÓDIGO ESPECÍFICO
  function aleatorio($tam, $min, $max) {
    for ($i=0;$i<$tam;$i++) {
      $array[$i] = rand($min,$max);
    }
    return $array;
  }

  echo "<pre>";
  print_r (aleatorio(5,1,10));
  echo "</pre>";
?>

<?php
  include_once("pie.html");
?>
