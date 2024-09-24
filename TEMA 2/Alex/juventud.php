<?php
    $anio = 2000;

    for ($edad = 30; $edad <= 40; $edad++) {
        if($edad >= 40) $juventud = "se acabó la juventud";
        else $juventud = "soy joven";

        echo "En el año $año tengo $edad años y $juventud <br>";
        $anio++;
    }


?>