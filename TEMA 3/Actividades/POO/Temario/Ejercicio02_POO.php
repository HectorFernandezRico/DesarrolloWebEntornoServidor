<?php

    class Empleado {
        public $nombre = "";
        public $apellido = "";
        public $sueldo = 0;
        private static $salarioMinimo = 1200;

        public function set_sueldo ($valor) {
            if ($this -> sueldo < self::$salarioMinimo) {
                $this -> sueldo = self::$salarioMinimo;
            } else {
                $this -> sueldo = $valor;
            }
        }
        public function __construct($nombre, $apellido, $sueldo){
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> set_sueldo($sueldo);
        }
        public static function get_salarioMinimo() {
            return self::$salarioMinimo;
        }

        public static function set_salarioMinimo($salarioMinimo){
            self::$salarioMinimo = $salarioMinimo;
        }
        public function get_nombre() {
                return $this->nombre;
        }
        public function paga_impuestos () {
            if ($this->sueldo > 3333) {
                echo $this -> nombre . $this -> apellido .  "Su sueldo es de " . $this -> sueldo .". Tiene que pagar impuestos <br>";
               return true;
            } else {
                echo $this -> nombre . $this -> apellido . " Su sueldo es de " . $this -> sueldo . ". No tiene que pagar impuestos<br>";
               return false;
            }
        }
        
    }
    $persona = new Empleado("Marcos", "Fernández", 4000);
    $persona -> paga_impuestos();    
    $persona2 = new Empleado("Pe", "Do", 900);
    $persona2 -> paga_impuestos(); 