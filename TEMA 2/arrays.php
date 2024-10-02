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
    
    /*ARRAYS ASOCIATIVOS: CLAVE => VALOR*/
    $capitales = array (
        "España" => "Madrid", //España es la clave y Madrid es el valor
        "Francia" => "París",
        "Italia" => "Roma"
    );
    $telefonos = [
        "Pedro" => "915732525", //Pedro es la clave y su número de teléfono el valor.
        "Juan" => "630524178",
        "Carlos" => "627586944"
    ];

    $telefonos[] = ["Nacho" => "914458963"];

    /*ARRAYS ASOCIATIVOS: AÑADIR ELEMENTOS AL FINAL*/
    $telefonos = [
        "Pedro" => "915732525", //Pedro es la clave y su número de teléfono el valor.
        "Juan" => "630524178",
        "Carlos" => "627586944"
    ];
    $telefonos["Lola"] = "621258974";
    $telefonos[] = ["Nacho" => "914458963"];
    $telefonos["mascota"] = 3;

    /*MANIPULACIÓN DE ARRAYS ASOCIATIVOS:*/
    echo "Telefono de Carlos: " . $telefonos['Carlos'] ."<br>";
    echo "<h1>capitales</h1>";
    foreach ($capitales as $valor) //EN CADA ITERACIÓN TENDREMOS EL VALOR DEL ELEMENTO.
        echo "Capital: $valor <br>";
    echo "<h1>Países y sus capitales</h1>";
    foreach ($capitales as $clave => $valor) //EN CADA ITERACIÓN TENDREMOS LA CLAE Y EL VALOR DEL ELEMENTO.
        echo "La capital de $clave es $valor <br>";

    /*FUNCIONES: PRINT_R*/
    $capitales = array (
        "España" => "Madrid", //España es la clave y Madrid es el valor
        "Francia" => "París",
        "Italia" => "Roma"
    );
    $telefonos = [
        "Pedro" => "915732525", //Pedro es la clave y su número de teléfono el valor.
        "Juan" => "630524178",
        "Carlos" => "627586944"
    ];
    $telefonos["Lola"] = "621258974";
    $telefonos[] = ["Nacho" => "914458963"];
    $telefonos["mascota"] = 3;

    echo("<br><b> Capitales : </b><br>");
    print_r($capitales); //MUESTRA EL CONTENIDO DE LA VARIABLE.
    echo("<br><b> Telefonos : </b><br>");
    print_r($telefonos); //MUESTRA EL CONTENIDO DE LA VARIABLE.

    /*FUNCIONES: VAR_DUMP: MUESTRA LOS TIPOS DE DATOS DE CADA VALOR, Y LAS LONGITUDES DE LOS ARRAYS Y STRINGS.*/
    $capitales = array (
        "España" => "Madrid", //España es la clave y Madrid es el valor
        "Francia" => "París",
        "Italia" => "Roma"
    );
    $telefonos = [
        "Pedro" => "915732525", //Pedro es la clave y su número de teléfono el valor.
        "Juan" => "630524178",
        "Carlos" => "627586944"
    ];
    $telefonos["Lola"] = "621258974";
    $telefonos[] = ["Nacho" => "914458963"];
    $telefonos["mascota"] = 3;

    echo("<br><b> Capitales : </b><br>");
    var_dump($capitales); //MUESTRA EL CONTENIDO DE LA VARIABLE Y LOS TIPOS DE DATOS.
    echo("<br><b> Telefonos : </b><br>");
    var_dump($telefonos); //MUESTRA EL CONTENIDO DE LA VARIABLE Y LOS TIPOS DE DATOS.

    /*FUNCIONES: ARRAY_POP (ELIMINA EL ÚLTIMO ELEMENTO DEL ARRAY), 
                 ARRAY_PUSH (AÑADE UNO O VARIOS ELEMENTOS AL FINAL DEL ARRAY), 
                 IN_ARRAY(AVERIGUA SI UN ELEMENTO ESTÁ EN EL ARRAY)*/
    $amigos = ["Pedro", "Juan", "Carlso"];
    print_r($amigos);
    echo "<br>";
    array_pop($amigos); //ELIMINA EL ELEMENTO "CARLOS", PORQUE ES EL ÚLTIMO ARRAY.
    print_r($amigos);
    echo "<br>";

    if (!in_array("Pedro", $amigos))//COMPRUEBA SI ESTÁ "PEDRO".
        array_push($amigos,"Pedro"); //COMO SI ESTÁ, NO LO AÑADE OTRA VEZ .
    print_r($amigos);
    echo "<br>";
    if (!in_array("Nacho", $amigos)) //COMPRUEBA SI ESTÁ "NACHO".
        array_push($amigos,"Nacho", "Nieves"); //COMO NO LO ESTÁ, AÑADE A "NACHO Y A "NIEVES" AL FINAL DEL ARRAY.
    print_r($amigos);
    echo "<br>";

    /*ARRAYS ANIDADOS:*/
    $persona = [
        "nombre"=> "Bruce Wayne",
        "profesion"=> ["dia" => "Filántropo","noche"=> "Caballero Oscuro"]
    ];

    echo "La persona " . $persona['nombre'] . ' de noche trabaja como '. $persona['profesion']['noche'] . "<br>";

    /*SIMULAMOS UN ARRAY BIDIMENSIONAL: */
    /*DOS FILAS Y TRES COLUMNAS : UNA MATRIZ (TABLA)*/
    $tabla = [
       "fila1"=> [11,12,13],
       "fila2"=> [21,22,"23"]
    ];

    echo "Fila1 Elemento 1: ". $tabla["fila1"][0] . "<br>";
    echo "Fila2 Elemento 3: ". $tabla["fila2"][2] . "<br>";

?>