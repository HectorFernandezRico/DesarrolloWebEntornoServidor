<?php 
/*
    echo "A" .false."B<br>";
    echo "X".true."Y<br>";
    $a = (123 == "123");
    $b = (123 == "100" + 23);
    $c = (false == "0");
    $d = ( (5<6) == "2" - " 1");
    $e = ( (5 < 6) == "true");
    echo "Igualdad a es $a" ."<br>";
    echo "Igualdad a es $b" ."<br>";
    echo "Igualdad a es $c" ."<br>";
    echo "Igualdad a es $d" ."<br>";
    echo "Igualdad a es $e" ."<br>";
*/
    echo "A" .false."B<br>";
    echo "X".true."Y<br>";
    $a = (123 === "123");
    $b = (123 === "100" + 23);
    $c = (false === "0");
    $d = ( (5<6) === "2" - " 1");
    $e = ( (5 < 6) === "true");
    echo "Igualdad a es $a" ."<br>";
    echo "Igualdad a es $b" ."<br>";
    echo "Igualdad a es $c" ."<br>";
    echo "Igualdad a es $d" ."<br>";
    echo "Igualdad a es $e" ."<br>";

?>