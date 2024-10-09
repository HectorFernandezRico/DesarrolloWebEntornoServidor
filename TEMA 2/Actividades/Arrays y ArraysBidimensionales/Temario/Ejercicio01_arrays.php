<?php

    /*Array asociativo*/
    echo"Array asociativo: <br>";
    $nacionalidades = [
        "Alex"=> "Ecuatoriano",
        "Enrique"=> "Peruano",
        "Saúl"=> "Español",
        "Dani"=> "Argentino",
        "Alin"=> "Rumano"
    ];
    foreach ($nacionalidades as $clave => $valor) //EN CADA ITERACIÓN TENDREMOS LA CLAE Y EL VALOR DEL ELEMENTO.
        echo "La nacionalidad de $clave es: $valor <br>";
    
    /*Array no asociativo*/
    echo "<br> Array no asociativo: <br>";
    $amigos = ["Alex", "Enrique", "Saúl", "Dani", "Alin"];
    print_r($amigos);
    echo "<br>";
    array_pop($amigos); //ELIMINA EL ELEMENTO "Alin", PORQUE ES EL ÚLTIMO ARRAY.
    print_r($amigos);
    echo "<br>";

    if (!in_array("Alex", $amigos))//COMPRUEBA SI ESTÁ "Alex".
        array_push($amigos,"Alex"); //COMO SI ESTÁ, NO LO AÑADE OTRA VEZ .
    print_r($amigos);
    echo "<br>";
    if (!in_array("Nader", $amigos)) //COMPRUEBA SI ESTÁ "Nader".
        array_push($amigos,"Nader", "Turpin"); //COMO NO LO ESTÁ, AÑADE A "NACHO Y A "NIEVES" AL FINAL DEL ARRAY.
    print_r($amigos);
    echo "<br>";

?>