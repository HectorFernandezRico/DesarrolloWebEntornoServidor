<?php
echo "-------------AQUI SIN MODIFICAR LOS == POR LOS ===-----------------<br>";
echo "A" . false . "B<br>";
echo "X" . true . "Y<br>";

$a = (123 == "123");
$b = (123 == "100" + 23);
$c = (false == "0");
$d = ((5 < 6) == "2" - "1");
$e = ((5 < 6) === true);

echo "Igualdad a es $a" . "<br>";
echo "Igualdad b es $b" . "<br>";
echo "Igualdad c es $c" . "<br>";
echo "Igualdad d es $d" . "<br>";
echo "Igualdad e es $e" . "<br>";

echo "<br>-------------AQUI MODIFICADOS LOS == POR LOS ===-----------------<br>";
echo "A" . false . "B<br>";
echo "X" . true . "Y<br>";

$a = (123 === "123");
$b = (123 === "100" + 23);
$c = (false === "0");
$d = ((5 < 6) === "2" - "1");
$e = ((5 < 6) == true);

echo "Igualdad a es $a" . "<br>";
echo "Igualdad b es $b" . "<br>";
echo "Igualdad c es $c" . "<br>";
echo "Igualdad d es $d" . "<br>";
echo "Igualdad e es $e" . "<br>";

/*
    == (igualdad): Compara los valores sin tener en cuenta el tipo de dato. Es decir, convierte los valores a un tipo común antes de compararlos. Por ejemplo:

    php
    $a = 5;
    $b = "5";

    var_dump($a == $b); // Esto devolverá true, porque PHP convierte la cadena "5" al número 5 antes de compararlos
    === (identidad): Compara tanto el valor como el tipo de dato. Los valores deben ser exactamente iguales y del mismo tipo para que la comparación sea verdadera. Por ejemplo:

    php
    $a = 5;
    $b = "5";

    var_dump($a === $b); // Esto devolverá false, porque aunque los valores son iguales, sus tipos de datos (entero y cadena) son diferentes
    En resumen, == verifica solo los valores, mientras que === verifica tanto los valores como los tipos de datos.
*/
