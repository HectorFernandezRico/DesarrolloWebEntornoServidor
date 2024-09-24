<?php
    $hora = 16;
    $texto;

    if($hora >= 7 && $hora <= 11) {
        $texto = "Es hora de desayunar";
    } else if ($hora >= 13 && $hora <= 15) {
        $texto = "Es hora de comer";
    } else if ($hora >= 20 && $hora <= 23) {
        $texto = "Es hora de cenar";
    } else {
        $texto = "Es hora de un tentempié";
    }

    echo "Son las $hora: <br> $texto";