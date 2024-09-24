<?php
    $hora = 14;


    /*
    if ($hora == 8) {
        echo "Es hora de levantarse";
    } else if ($hora == 14){
        echo "Es la hora de comer";
    } else if ($hora == 21) {
        echo "Es la hora de cenar";
    } else {
        echo "Hora desconocida";    //Situación no prevista.
    }
    */

    /* 
    Otro ejemplo más corto del código anterior.
    if ($hora == 8) echo "Es hora de levantarse";
    else if ($hora == 14) echo "Es la hora de comer";
    else if ($hora == 21) echo "Es la hora de cenar";
    else echo "No es la hora de nada";
    */

    $mesaje = $hora == 14 ? "hora de comer" : "No es hora de comer";
    /*
    Es equivalente a:
    if($hora == 14) {
        echo "Hora de comer;
    } else {
        "No es hora de comer. 
    }
    */
    /*
    $rica = true;
    $guapa = false;

    $relacion = ($rica &6 $guapa) ? "novia" : "amiga";

    echo "Ella es mi $relacion";
    */
    