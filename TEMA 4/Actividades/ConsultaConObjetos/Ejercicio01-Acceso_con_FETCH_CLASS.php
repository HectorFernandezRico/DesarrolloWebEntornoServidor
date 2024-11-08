<?php
    require_once('pdo.php');

    $sql = "SELECT * FROM pokemon";

    $sentencia = $pdo -> prepare($sql);
    $sentencia -> execute();


    $sentencia -> setFetchMode(PDO::FETCH_CLASS, pokemon::class);

    $pokemons = $sentencia -> fetchAll();
    foreach ($pokemons AS $pokemon) {
        echo "<pre>";
            print_r($pokemon);
        echo "<pre>";
    }
?>

<?php

    class pokemon {
        private $pokedex;
        private $nombre;
        private $tipo;
        private $descripcion;

        //Getters

        public function get_pokedex() {
            return $this -> pokedex;
        }
        public function get_nombre() {
            return $this -> nombre;
        } 
        public function get_tipo() {
            return $this -> tipo;
        }
        public function get_descripcion() {
            return $this -> descripcion;
        }
    }

?>