<?php
    
    function diaCine () {
        $semana = [
            "Lunes", 
            "Martes", 
            "Miercoles", 
            "Jueves", 
            "Viernes",
            "Sabado",
            "Domingo"
        ];
        
        $diaSemana = rand(0,6);

        echo "Voy al cine el próximo " . $semana[$diaSemana];
    }
    
    diaCine ();

?>