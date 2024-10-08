<?php

    /*CONDICIONES: EJEMPLOS: */

    /*SUENA EL DESPERTADOR*/    
    $hora = 8; //La hora en formato de 24 horas.
    if ($hora == 8) {
        echo"Suena el despertador";
    }

    /*El número es 3!!!*/
    $numero = 3;
    if ($numero == 3) {
        echo "El número es 3!!!";
    } else {
        echo " Resulta que el número no es 3!!!";
    }

    /*CONDICIONES: IF ANIDADOS*/
    $hora = 14; //La hora en formato de 24 horas.
    if ($hora == 8) {
        echo "Es la hora de desayunar";
    } else if ($hora == 14) {
        echo "Es la hora de comer";
    }else if ($hora == 21) {
        echo "Es la hora de cenar";
    }

    /*CONDICIONES: ABREVIATURAS*/
    $hora =14; //La hora en formato de 24 horas.
    if ($hora == 8) echo "Es la hora de desayunar";
    else if ($hora == 14) echo "Es la hora de comer";
    else if ($hora == 21) echo "Es la hora de cenar";

    /*CONDICIONES: OPERADOR TERNARIO*/
    $rica = false;
    $guapa = true;
    $relacion = ($rica and  $guapa)?"novia": "amiga";
    echo "Ella es mi$relacion.";

    /*CONDICIONES: SWITCH*/
    $hora = 14; //La hora en formato de 24 horas.
    switch ($hora) {
        case 8:
            echo "Es la hora de desayunar";
            break;
        case 14:
            echo "Es la hora de comer";
            break;
        case 21:
            echo "Es la hora de cenar";
            break;
        default:
            echo "Ahora no toca comer";
    }


    /*BUCLES*/

    /*BUCLE MAL HECHO*/
    $hora = 8;
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";
    if ($hora == 8) echo "Suena el despertador <br>";

    /*BUCLES: DO WHILE*/
    $numero = 1;
    do {
        echo "$numero ";
        $numero++;
    } while ($numero <= 10);

    /*BUCLES: FOR*/
    $numero = 1;
    for ($contador = 1; $contador <= 10; $contador++) {
        echo "$contador ";
    }

    /*BUCLES: FOR ASCENDENTE Y DESCENDENTE*/
    /*BUCLE ASCENDENTE:*/
    $numero = 1;
    for ($contador = 1; $contador <= 10; $contador++) {
        echo "$contador ";
    }
    /*BUCLE DESCENDENTE:*/
    $numero = 1;
    for ($contador = 10; $contador > 0; $contador--) {
        echo "$contador ";
    }

    /*OTRA FORMA DE SALIR DE UN BUCLE... NO SE RECOMIENDA!!!*/
    $numero = 1;
    for ($contador = 1; $contador <= 600; $contador++) {
        if ($contador == 5) break;
            echo "$contador ";        
    }

?>