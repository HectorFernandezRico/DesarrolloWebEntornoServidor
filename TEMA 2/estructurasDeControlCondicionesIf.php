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

    /*PAGINA 6 DEL PDF*/

?>