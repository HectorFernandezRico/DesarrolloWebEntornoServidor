<?php

    class Empleado {
        public $nombre = "";
        public $apellido = "";
        public $sueldo = 4000;

        public function __construct( $sueldo){$this->sueldo = $sueldo;}

        public function get_nombre() {
                return $this->nombre;
        }
        public function paga_impuestos () {
            if ($this->sueldo > 3333) {
                echo "Su sueldo es de " . $this -> sueldo .". Tiene que pagar impuestos";
               return true;
            } else {
                echo "Su sueldo es de " . $this -> sueldo . ". No tiene que pagar impuestos";
               return false;
            }
        }
    }
    $persona = new Empleado(4000);
    $persona -> paga_impuestos();