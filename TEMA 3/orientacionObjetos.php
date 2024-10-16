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
    class Persona2 {
        //ATRIBUTOS:
        private $nombre = "A";
        private $altura = "0";

        //MÉTODOS:
        public function set_nombre ($nuevo_nombre) {
            $this -> nombre = $nuevo_nombre;
        }
        public function set_altura ($nueva_altura) {
            $this -> altura = $nueva_altura;
        }
        public function get_nombre() {
            return $this -> nombre;
        }
        public function get_altura() {
            return $this -> altura;
        }
        public function mostrarPersona(){
            echo "Nombre: " . $this -> nombre . "Altura: " . $this -> altura;
        }
    }

    /*CONSTRUCTOR*/
    class Perro {

        //Atributo:
        private $nombre;
        public function __construct($nom) {
            $this -> nombre = $nom;
        }
        public function llama () {
            echo $this -> nombre . ", ven aquí!!!";
        }
    }
    $mascota = new Perro ("Toby");
    $mascota -> llama ();

    /*CONSTRUCTORES EN PHP 8: SIMPLIFICACIÓN DE ATRIBUTOS*/
    class Perro2 {
        
        private $nombre;
        public function __construct($nom) {
            $this -> nombre = $nom; //Al estar en _construct, nombre es un atributo
        }
        public function llama () {
            echo $this -> nombre . ", ven aquí!!!";
        }
    }
    $mascota = new Perro2 ("Toby");
    $mascota -> llama ();
    
    /*CLASES ESTÁTICAS: EJEMPLO*/
    class Producto {
        public const IVA = 0.21; //IVA a aplicar.
        private static $numProductos = 0; //Productos creados
        private $codigo; //Código de un producto
        public function __construct($cod) {
            self::$numProductos++;
            $this -> codigo = $cod;
        }
        public static function muestra_numProductos() {
            echo "Actualmente existen: " . self::$numProductos 
            . " productos con IVA: " . self::IVA . "<br>";
        }
        public function muestra_codigo() {
            echo "Existe el producto nº: " . $this -> codigo ."<br>";
        }
    }
    echo "Impuesto: " . Producto::IVA ."<br>";
    $producto1 = new Producto("P254");
    $producto2 = new Producto("P465");
    Producto::muestra_numProductos();
    $producto1 -> muestra_codigo();
    $producto2 -> muestra_codigo();