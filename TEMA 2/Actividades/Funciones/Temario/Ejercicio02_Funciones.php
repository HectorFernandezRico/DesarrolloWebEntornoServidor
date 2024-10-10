<?php
function dupValor ($numero) {
        $numero = $numero * 2;
        echo "dupValor es" . $numero . "<br>";
    }
    function dupReferencia (&$numero) {
        $numero = $numero * 2;
        echo "dupReferencia es $numero <br>";
    }

    $num1 = 10;
    $num2 = 20;
    echo "Num1 es $num1 y Num2 es $num2<br>";
    dupValor($num1);
    dupReferencia($num2);
    echo "Después de las funciones, Num1 es $num1 y Num2 es $num2";
