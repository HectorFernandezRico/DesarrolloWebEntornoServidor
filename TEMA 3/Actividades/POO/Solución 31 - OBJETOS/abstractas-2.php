<?php

// Esto es un interface, no se puede instanciar
// Tampoco podemos implementar código, sólo es una plantilla
// Tampoco puede tener variables de clase (atributos)
interface Persona {
    public function saluda();
}

// Las siguientes clases implementan el interfaz Persona,
// y están obligadas a implementar saluda()
class Ingles implements Persona {
    public function saluda() {
        echo "<br>Hello";
    }
}

class Aleman implements Persona {
    public function saluda() {
        echo "<br>Hallo";
    }    
}

class Frances implements Persona {
    public function saluda() {
        echo "<br>Bon Jour";
    }    
}

// Esto no está en ninguna clase, no es orientado a objetos
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