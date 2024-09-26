<?php
    $hora = rand(0,24);
    echo"Son las $hora : ";
    echo "<br>";
    if ($hora >= 7 && $hora <= 11) {
        echo"Es hora de desayunar";
    } else if ($hora >= 13 && $hora <= 15) {
        echo "Es hora de comer";
    } else if ($hora >= 20 && $hora <= 23) {
        echo "Es hora de cenar";
    }
?>