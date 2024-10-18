<?php

// Esta clase es abstracta, no se puede instanciar
abstract class Persona {
    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    abstract public function saluda();
}

// Las siguientes clases extienden Persona,
// y están obligadas a implementar saluda()
class Ingles extends Persona {
    public function saluda() {
        echo "<br>Hello $this->nombre";
    }
}

class Aleman extends Persona {
    public function saluda() {
        echo "<br>Hallo $this->nombre";
    }    
}

class Frances extends Persona {
    public function saluda() {
        echo "<br>Bon Jour $this->nombre";
    }    
}

// Esto no está en ninguna clase, no es orientado a obejetos
// Es una función que recorre un array de objetos
function saluda_gente($gente) {
    foreach ($gente as $individuo) {
        $individuo->saluda();
    }
}

// Creo un array de objetos de diversas clases que heredan
// de Persona
$personas = [
    new Ingles("Patrick"),
    new Aleman("Johannes"),
    new Frances("Pascal"),
    new Ingles("Sally")
];

saluda_gente($personas);

?>