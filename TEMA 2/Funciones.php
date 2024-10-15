<?php
    /*FUNCIONES: RETURN*/
    function suma ($sumando1, $sumando2) {
        return $sumando1 + $sumando2;
    }
    echo "La suma de 2 + 3 es: " . suma(2,3);

    /*PARÁMETROS POR VALOR Y POR REFERENCIA: EJEMPLO*/
    function noIncremento ($numero) {
        $numero++;
    }
    function incremento (&$numero) {
        $numero++;
    }

    $valor1 = 10;
    $valor2 = 20;
    echo "Valor1 es $valor1 y valor2 es $valor2<br>";
    noIncremento($valor1);
    incremento($valor2);
    echo "Después de las funciones, valor1 es $valor1 y valor2 es $valor2";

    /*PARÁMETROS OPCIONALES: VALORES POR DEFECTO*/
    function hola ($nombre, $idioma="es") {
        if ($idioma == "es") return "Hola $nombre";
        else if ($idioma == "fr") return "Bonjour $nombre";
        return "Hello $nombre";
    }
    echo hola("Marta") . "<br>";
    echo hola("Pascal", "fr") . "<br>";
    echo hola("Ang", "??") . "<br>";

    /*FUNCIONES: FUNC_GET_ARGS (OBTIENE UN ARRAY, CADA PARÁMETRO SERÁ UN ELEMENTO),
                 FUNC_NUM_ARGS (OBTIENE EL NÚMERO DE PARÁMETROS RECIBIDO POR LA FUNCIÓN),
                 FUNC_GET_ARG (OBTIENE UN PARÁMETRO CONCRETO POR ÍNDICE DEL ARRAU DE ARGUMENTOS)*/
    function sumaNumeros() {
        if (func_num_args() == 0) return 0; //Si no hay parámetros, retorna 0
        $suma = 0;
        for ($i=0; $i < func_get_args(); $i++) { 
            echo "Parámetro número $i = " . func_get_arg($i) ."<br>";
            $suma = $suma + func_get_arg($i);            
        }
        return $suma;
    }
    $suma = sumaNumeros(1,34,66,2,88,7);
    echo "La suuma de todos los números es: " . $suma ."<br>";

    /*PARÁMETROS CON NOMBRE*/
    function muestra($a, $b=2, $c=4) {
        echo "$a $b $c";
    }
    muestra(c: 3, a: 1);

    /*FUNCIONES TIPADAS*/
    declare (strict_types=1); //El tipado siempre al principio del código.
    function sumaTipado (int $a, int $b) : int {
        return $a + $b;
    }
    echo sumaTipado(3,30) . "<br>";
    echo sumaTipado(3,30);

    /*Funciones anónimas*/
        /*Ejemplo01*/
            $triple = function ($num) { return $num * 3;};
            echo "El triple de 3 es " . $triple(3);

        /*Ejemplo02*/
            $mas = 2;
            $tripleMas = 
                function ($num) use ($mas) { return ($num * 3) + $mas;};
                echo "El triple de 3 es " . $tripleMas(3);
            
        /*Ejemplo03*/
            $arr = [10,3,70,21,54];
            usort($arr, function ($x, $y) {
                return $x > $y;
            });

    /*PARÁMETROS CALLABLE: FUNCIÓN PREDEFINIDA ARRAY_MAP*/
        /*Ejemplo01*/
            function cubo ($elemento) {
                return $elemento * 2;
            }
            $lista = [10,20,30];
            $lista_cubo = array_map("cubo", $lista);
            print_r($lista_cubo);

        /*Ejemplo02*/
            $lista = [10, 20, 30];
            $lista_cubo = array_map(
                function($e1){return $e1 ** 3;},
                $lista );
                print_r($lista_cubo);
    
    