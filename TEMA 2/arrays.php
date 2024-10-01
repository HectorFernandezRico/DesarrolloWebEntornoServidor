<?php

    /*ARRAYS EN PHP: CREACIÓN Y ASIGNACIÓN DE INFORMACIÓN.*/
    $frutas = ["naranja", "manzana", "pera"]; //Asignando directamente la información entre corchetes.
    $verduras = array("acelga","brocoli"); //Asignando la información mediante la función array.
    $verduras[] = "coliflor"; //Se añade al final del array.
    $semillas = []; //El array se rellenará más tarde.
    $semillas[0] = "nuez"; //Le damos a nuez la posición 0 del array.
    $semillas[] = "avellana"; //Se añade al final del array.
    $semillas[] = "pipa"; //Se añade al final del array.

    /*ARRAYS EN PHP: COUNT Y FOREACH.*/
    $frutas = ["naranja", "manzana", "pera"]; //Asignando directamente la información entre corchetes.
    $verduras = array("acelga","brocoli"); //Asignando la información mediante la función array.
    $verduras[] = "coliflor"; //Se añade al final del array.
    $semillas = []; //El array se rellenará más tarde.
    $semillas[0] = "nuez"; //Le damos a nuez la posición 0 del array.
    $semillas[] = "avellana"; //Se añade al final del array.
    $semillas[] = "pipa"; //Se añade al final del array.
    
    $nVerduras = count($verduras);  //Guardo en nVerduras mediante el count la longitud del array.
    for ($i = 0; $i < $nVerduras; $i++) //Recorro la longitud del array
        echo "Verdura número " . $i + 1 . ": $verduras[$i]<br/>";   //Muestro el array u la posición de lo que tenga guardado.

    foreach ($semillas as $semilla){ //Recorremos el array y lo guardo en semilla todo lo que hay en semillas.
            echo "Semilla: $semilla <br/>";} //Muestro el array mediate el foreach de antes.
    
?>