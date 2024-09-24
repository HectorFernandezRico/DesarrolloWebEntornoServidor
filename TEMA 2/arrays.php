<?php
    /*
    //Formas de declarar un array.
    $frutas=[];
    $frutas = ["manzana", "pera", "mandarina"];
    $frutas = array ("manzana", "pera", "tomate");

    echo $frutas[2]; //Para mostrar el elemento de la posición 2.

    $frutas = [];

    echo $frutas[2]; //Nos da un warning al tener esa posición sin definir.
    */

    //Añadiria al final de la lista el elemento.
    $frutas[] = "cereza";
    $frutas[] = 23;

    /*
    echo $frutas[0] . " " . $frutas[1];

    $frutas = "<br> saludos";
    
    echo $frutas;
    */

    /*
    for ($ind = 0; $ind < count($frutas); $ind++) {
        echo "Posición $ind: $frutas[$ind]<br>";
    }
    */

    //Bucle FOREACH
    foreach ($frutas as $fruta) {
        echo "$fruta <br>";
    }


?>