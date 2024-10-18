<?php

class Persona {
    protected $nombre;
    protected $apellidos;

    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function get_nombreCompleto() {
        return $this->nombre . " " . $this->apellidos;
    }
}

class Empleado extends Persona {
    private static $sueldo_impuestos = 1200;
    private $salario;
    private $telefonos=[];

    public function __construct($nombre, $apellidos, $salario) {
        parent::__construct($nombre,$apellidos);
        $this->set_salario($salario);
    }

        // GETTERS Y SETTERS
    public function get_salario() {
        return $this->salario;
    }
    public function set_salario($salario) {
        $this->salario = $salario;
    }
    public static function set_sueldo_impuestos($sueldoImpuestos) {
        self::$sueldo_impuestos = $sueldoImpuestos;
    }

        // OTROS MÉTODOS
    public function paga_impuestos() {
        if (self::$sueldo_impuestos <= $this->salario) {
            return true;
        } else {
            return false;
        }
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

    public function informe_HTML() {
        $listado = "<h3>". $this->get_nombreCompleto() ."</h3>";
        $listado = $listado . "<p><b>Lista de teléfonos</b></p>";
        foreach ($this->telefonos as $telefono) {
            $listado = $listado . "<li>$telefono</li>";
        }
        $listado = $listado . "</ul>";
        $listado = $listado . "<p><b>Salario:</b> " . $this->get_salario() . "</p>";
        return $listado;
    }
}

Empleado::set_sueldo_impuestos(1000);

$empleado1 = new Empleado("Marta", "Olmedilla", 10000);
$empleado1->set_salario(20000);
if ($empleado1->paga_impuestos()) {
    echo "<br>Sí paga impuestos";
} else {
    echo "<br>No paga impuestos";
}

echo $empleado1->informe_HTML();
$empleado1->aniade_telefono("234432234");
$empleado1->aniade_telefono("923243342");
echo $empleado1->informe_HTML();
$empleado1->borra_telefonos();
echo $empleado1->informe_HTML();

?>