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

    /*EJEMPLOS DE ASIGNACIÓN Y CLONACIÓN:*/
    class Pintura {
        private $color;
        public function __construct($miColor) {
            $this -> color = $miColor;
        }
        public function set_color($miColor) {
            $this -> color = $miColor;
        }
        public function indica_color() {
            echo "color". $this -> color;
        }
    }
    $tono1 = new Pintura("Azul");
    $tono2 = $tono1;
    $tono2 -> set_color("Amarillo");
    echo "Caso de asignación, tenemos";
    echo "<br>Tono2: ";$tono2 -> indica_color();
    echo "<br>Tono1: ";$tono1 -> indica_color();
    $tono3 = clone($tono1);
    $tono3 -> set_color("Rojo");
    echo "<br>Caso de clonado, tenemos";
    echo "<br>Tono3: ";$tono3 -> indica_color();
    echo "<br>Tono1: ";$tono1 -> indica_color();

    /*HERENCIA: EJEMPLO*/
    class Saludo {
        protected $idioma;
        public function __construct($idioma) {
            $this -> idioma = $idioma;
        }
        public function saluda (){
            if ($this -> idioma == "en") echo "Hello";
            else if ($this -> idioma == "fr") echo "Bon Jour";
            else echo "Hola";
        }        
    }
    class Social extends Saludo {
        public function despide() {
            if ($this -> idioma == "en") echo "Good Bye";
            else if ($this -> idioma == "fr") echo "Au Revoir";
            else echo "Adios";
        }
    }
    $amable = new Social("es");
    echo $amable -> saluda() . "<br>"; //Hola
    echo $amable -> despide() ."<br>"; //Adios
    $amable2 = new Social("en");
    echo $amable2 -> saluda() . "<br>"; //Hello
    echo $amable2 -> despide() ."<br>"; //Good Bye
    $amable3 = new Social("fr");
    echo $amable3 -> saluda() . "<br>"; //Bon Jour
    echo $amable3 -> despide() ."<br>"; //Au Revoir

    /*HERENCIA: EJEMPLO DE SOBREESCRITURA DE MÉTODOS*/
    class Producto2 {
        public string $codigo;
        public function __construct($codigo) {
            $this -> codigo = $codigo;
        }
        public function mostrarResumen () {
            echo "<p>Prod: " . $this -> codigo ."</p>";
        }
    }
    class Tele extends Producto2 {
        public $pulgadas;
        public $tecnologia;
        public function __construct($codigo, $pulgadas, $tecnologia) {
            parent::__construct($codigo);
            $this -> pulgadas = $pulgadas;
            $this ->tecnologia = $tecnologia;
        }
        public function mostrarResumen () { 
            parent::mostrarResumen();
            echo "<p>TV: ". $this -> tecnologia . " de " . $this -> pulgadas . " pulgadas</p>";
        }
    }
    $miTele = new Tele("232342423", 27, "Plasma");
    $miTele -> mostrarResumen();