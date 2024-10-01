<?php
    
    $año = 2000;
    $edad = 30;
    $juventud = 40;
    do{
        $edad++;
        $año++;
        if ($edad < 40 ) {
            echo "En el año $año tengo $edad años y soy joven <br>";
        } else {
            echo "En el año $año tengo $edad años y se acabó la juventud";

        }
    }
    while ($edad < $juventud) ;
           
?>