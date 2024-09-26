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
           

    /*
    do {
        if ($edad != 40) {
            for ($año = 0; $año <= 2010; $año++) {
                $edad++;
                echo "En el año $año tengo $edad años y soy joven <br>";
            }
        } else if ($edad == 40) {
            echo "En el año $año tengo $edad años y se acabó la juventud";
        }
    } while ( $edad != 40); 
    */

?>