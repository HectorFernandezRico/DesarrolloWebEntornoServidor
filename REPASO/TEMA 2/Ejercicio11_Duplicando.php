<?php
    function dupValor ($numero) {
        $numero *= 2;
        echo "dupValor es $numero <br>";
    }

    function dupReferencia (&$numero) {
        $numero *= 2;
        echo "dupReferencia es $numero <br>";
    }

    $num1 = 10;
    $num2 = 20;
    
    echo "Num 1 es $num1 y Num 2 es $num2";
    echo "<br>";
    echo "<br>";
    echo "-------------DupValor----------";
    echo "<br>";
    echo "Num1: dupValor($num1)";
    echo "<br>";
    echo "Num2: dupValor($num2)";
    echo "<br>";
    echo "<br>";
    echo "-------------DupReferencia----------";
    echo "<br>";
    echo "Num1: dupReferencia(&$num1)";
    echo "<br>";
    echo "Num2: dupReferencia(&$num2)";