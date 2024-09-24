<?php
    $numero = 0;
    //Con bucle DO...WHILE
    do {
        echo "Bucle do while: $numero <br>";
        $numero += 2;
    } while ($numero < 10);

    $numero = 0;
    //Con bucle WHILE
    echo "------------------------------ <br>";
    while ($numero < 10) {
        echo "Bucle while: $numero <br>";
        $numero++;
    }

    //Con bucle FOR
    echo "------------------------------ <br>";
    for ($numero = 0; $numero <= 10; $numero+=2) {
        echo "Bucle for: $numero <br>";
    }

    //Con bucle FOR inverso
    echo "------------------------------ <br>";
    for ($numero = 10; $numero >= 0; $numero--) {
        echo "Cuenta atras: $numero<br>";
    }

?>