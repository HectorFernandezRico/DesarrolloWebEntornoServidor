<?php
    /*VALIDANDO CON PHP:FUNCIÓN ISSET*/
    if (isset($_GET["parametro"])) {
        $parametro = $_GET["parametrro"];
        //Aquí valido la información.
    }

    /*EJEMPLO DE PERSISTENCIA: MIRAR PÁGINA 8 DE LA PRESENTACIÓN*/
    $texto_anterior = isset($_GET["prueba"]) ? $_GET["prueba"] :"";