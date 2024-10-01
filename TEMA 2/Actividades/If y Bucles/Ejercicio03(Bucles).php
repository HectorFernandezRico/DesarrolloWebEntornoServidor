<?php
    
    /*BUCLE WHILE*/
    $contador = 13;
    echo"Con bucle while: ";
    while ($contador > 3) {
        $contador -= 2;
        echo"$contador";    
}

    /*BUCLE DO, WHILE*/
    $contador = 13;
    echo "<br>" . "Con bucle do, whyle: ";
    do {
        $contador -= 2;
        echo "$contador";
    } while ($contador > 3);
    
    /*BUCLE FOR*/    
    echo "<br>" . "Con bucle for: ";
    for ($contador = 11; $contador > 3; $contador-=2) {        
        echo"$contador" . "\n";
    }

?>