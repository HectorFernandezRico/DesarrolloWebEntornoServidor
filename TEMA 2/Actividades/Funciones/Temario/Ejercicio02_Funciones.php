function dupValor ($numero) {
        $numero++;
    }
    function dupReferencia (&$numero) {
        $numero++;
    }

    $num1 = 10;
    $num2 = 20;
    echo "Num1 es $num1 y Num2 es $num2<br>";
    noIncremento($num1);
    incremento($Num2);
    echo "Después de las funciones, Num1 es $num1 y Num2 es $num2";
