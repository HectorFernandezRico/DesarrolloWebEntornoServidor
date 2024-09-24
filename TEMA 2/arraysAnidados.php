<?php
    $persona = [
        "nombre"=> "Bruce Wayne",
        "profesion"=> ["dia" => "Filántropo","noche"=> "Caballero Oscuro"]
    ];

    echo "La persona " . $persona['nombre'] . ' de noche trabaja como '. $persona['profesion']['noche'] . "<br>";

    /*DOS FILAS Y TRES COLUMNAS : UNA MATRIZ (TABLA)*/
    $tabla = [
        "fila1"=> [11,12,13],
        "fila2"=> [21,22,"23"]
    ];

    echo "Fila1 Elemento 1: ". $tabla["fila1"][0] . "<br>";
    echo "Fila2 Elemento 3: ". $tabla["fila2"][2] . "<br>";
?>