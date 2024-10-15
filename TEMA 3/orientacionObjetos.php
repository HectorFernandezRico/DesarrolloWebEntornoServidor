<?php

    /*DEFINICIÓN DE CLASES:*/
    class ClaseSencilla {
        //Declaración de una propiedad.
        public $var = 'un valor predeterminado';

        //Declaración de un método.
        public function mostrarVar () {
            echo $this -> var;
        }
    }

    /*INSTANCIACIÓN Y USO DE OBJETOS DE UNA CLASE: NEW Y ->*/
    class Persona {
        private $nombre = "A";
        public $altura = "0";
        public function set_nombre ($nuevo_nombre) {
            $this -> nombre = $nuevo_nombre;
        }
        public function mostrarPersona(){
            echo "Nombre: " . $this -> nombre . "Altura: " . $this -> altura;
        }
    }
    $mi_amigo = new Persona;
    $mi_amigo -> set_nombre("Pedro");
    $mi_amigo -> altura = 180;
    $mi_amigo -> mostrarPersona();

    /*ENCAPSULACIÓN:*/