<?php

// Esta clase es abstracta, no se puede instanciar
abstract class Persona {
    abstract public function saluda();
}

// Las siguientes clases extienden Persona,
// y están obligadas a implementar saluda()
class Ingles extends Persona {
    public function saluda() {
        echo "<br>Hello";
    }
}

class Aleman extends Persona {
    public function saluda() {
        echo "<br>Hallo";
    }    
}

class Frances extends Persona {
    public function saluda() {
        echo "<br>Bon Jour";
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
    new Ingles,
    new Aleman,
    new Frances,
    new Ingles
];

saluda_gente($personas);

?>