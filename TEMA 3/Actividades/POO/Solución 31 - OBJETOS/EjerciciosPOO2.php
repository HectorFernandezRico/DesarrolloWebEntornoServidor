<?php
namespace EjerciciosPOO2;
    class Persona {
        protected $nombre;
        protected $apellidos;
        protected $edad;

        public function __construct($nombre, $apellidos, $edad) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
        }

        public function get_nombreCompleto() {
            return $this->nombre . " " . $this->apellidos;
        }
    }

    // Clase abstracta. No se puede instanciar. Obligatoriamente tendrá clases
    // hijas, que implementarán los métodos abstractos, heredarán variables y 
    // heredarán métodos no abstractos. Las hijas instanciarán objetos.
    abstract class Trabajador extends Persona {
        protected static $sueldo_impuestos;
        protected $telefonos=[];

        // Métodos abstractos -> Los tendrá que implementar la clase hija
        public abstract function calcular_sueldo();
        public abstract function informe_HTML();
        public abstract function paga_impuestos();

        // Métodos no abstractos --> los heredarán las clases hijas
        public static function set_sueldo_impuestos($sueldoImpuestos) {
            self::$sueldo_impuestos = $sueldoImpuestos;
        }
        public function aniade_telefono($telefono) {
            $this->telefonos[] = $telefono;
        }

        public function lista_telefonos () {
            $lista = "";
            foreach ($this->telefonos as $telefono) {
                $lista = $lista . " " . $telefono;
            }
        }
        public function borra_telefonos() {
            $this->telefonos = [];
        }
    };

     class Gerente extends Trabajador { //El abstract se lo metí yo porque daba error.
        private $salario=3000;

        public function set_salario($salario) {
            $this->salario = $salario;
        }

        public function get_salario() {
            return $this->salario;
        }

        public function paga_impuestos() {
            if ($this->calcular_sueldo() > self::$sueldo_impuestos) {
                return true;
            } else {
                return false;
            }
        }
        public function calcular_sueldo() {
            return $this->salario + ($this->salario * $this->edad / 100);
        }

        public function informe_HTML()
        {
            $informe = "<h3>GERENTE: " . $this->get_nombreCompleto() . "</h3>";
            $informe = $informe . "<p><b>Teléfonos:</b></p>";
            foreach ($this->telefonos as $telefono) {
                $informe = $informe . "<li>$telefono</li>";
            }
            $informe = $informe . "</ul>";
            $informe = $informe . "<p>Edad: ".$this->edad."</p>";
            $informe = $informe . "<p><b>Salario Base: </b>" . $this->get_salario() . "</p>";
            $informe = $informe . "<p><b>Sueldo: ".$this->calcular_sueldo()."</b></p>";
            $informe = $informe . "<p>Paga Impuestos: ". ($this->paga_impuestos() ? "SI" : "NO") . "</p>"; 
            return $informe;
        }
    }

     class Empleado extends Trabajador { //El abstract se lo metí yo porque daba error.
        private $horasTrabajadas=160;
        private $precioPorHora=10;

        public function set_salario($horasTrabajadas, $precioPorHora) {
            $this->horasTrabajadas = $horasTrabajadas;
            $this->precioPorHora = $precioPorHora;
        }

        public function calcular_sueldo() {
            return $this->horasTrabajadas * $this->precioPorHora;
        }

        public function paga_impuestos()
        {
            if ($this->calcular_sueldo() > self::$sueldo_impuestos) {
                return true;
            } else {
                return false;
            }
        }
        public function informe_HTML()
        {
            $informe = "<h3>EMPLEADO: " . $this->get_nombreCompleto() . "</h3>";
            $informe = $informe . "<p><b>Teléfonos:</b></p>";
            foreach ($this->telefonos as $telefono) {
                $informe = $informe . "<li>$telefono</li>";
            }
            $informe = $informe . "</ul>";
            $informe = $informe . "<p>Edad: ".$this->edad."</p>";
            $informe = $informe . "<p>Horas trabajadas: " . $this->horasTrabajadas . "</p>";
            $informe = $informe . "<p>Precio por hora: " . $this->precioPorHora . "</p>";
            $informe = $informe . "<p><b>Sueldo: ".$this->calcular_sueldo()."</b></p>";
            $informe = $informe . "<p>Paga Impuestos: ". ($this->paga_impuestos() ? "SI" : "NO") . "</p>"; 
            return $informe;
        }        
    }

    $gerente1 = new Gerente("Pepe", "Garcia", 45, 1500); //El 1500 de salario se lo puse yo porque daba error
    $empleado1 = new Empleado("Alonso", "García", 23);
    echo $empleado1->informe_HTML();
    echo $gerente1->informe_HTML();

    Trabajador::set_sueldo_impuestos(3000);
    $gerente1->set_salario(4500);
    $empleado1->set_salario(160, 8);
    $gerente1->aniade_telefono("2344253");
    $gerente1->aniade_telefono("535353453");
    $empleado1->aniade_telefono("69696969");
    echo $empleado1->informe_HTML();
    echo $gerente1->informe_HTML();
