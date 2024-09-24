<?php
    //En vez de asociar un indice(número) al valor se le asigna una clave
    $capitales = [
        "España" =>"Madrid",
        "Francia" => "Paris",
        "Italia" => "Roma"
    ];
    $capitales[] = "Londres";
    $capitales["Portugal"] = "Lisboa"; //Coloca el dato en la ultima posición, si no tuviera etiqueta le asignaria el número disponible empenzando desde el 0.
    $capitales[] = "Dublin";

    //echo $capitales[1];

    //$capitales["cositas"] = [1,2,3,4,5,6,7,8,9]; //array(1,2,3,4,5,6,7,8,9);

    //print_r ($capitales["cositas"]); //Nos muestra la información del array

    echo $capitales["Portugal"]. "<br>";

    //Se puede recorrer con un FOREACH
    foreach ($capitales as $capital) {
        echo $capital . "<br>";
    }

    //Para ver las claves
    foreach ($capitales as $pais => $capital) {
        echo "La capital de $pais es $capital. <br>";
    }

    //print_r($capitales); //Nos muestra la información del array
?>