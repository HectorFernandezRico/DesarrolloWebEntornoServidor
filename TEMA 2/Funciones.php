<?php
    /*FUNCIONES: RETURN*/
    function suma ($sumando1, $sumando2) {
        return $sumando1 + $sumando2;
    }
    echo "La suma de 2 + 3 es: " . suma(2,3);

    /*PARÁMETROS POR VALOR Y POR REFERENCIA: EJEMPLO*/
    function noIncremento ($numero) {
        $numero++;
    }
    function incremento (&$numero) {
        $numero++;
    }

    $valor1 = 10;
    $valor2 = 20;
    echo "Valor1 es $valor1 y valor2 es $valor2<br>";
    noIncremento($valor1);
    incremento($valor2);
    echo "Después de las funciones, valor1 es $valor1 y valor2 es $valor2";

    

?>