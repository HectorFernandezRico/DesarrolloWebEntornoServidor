<?php
    require_once('pdo.php');
    //Accedo para mostrar todos los registros de la tabla tienda.
    $sql = "SELECT * FROM tienda";

    $sentencia = $pdo -> prepare($sql);
    $sentencia -> execute();

    $sentencia -> setFetchMode(PDO::FETCH_CLASS, tienda::class);
    while ($tienda = $sentencia -> fetch()) {
        echo "ID TIENDA: " . $tienda -> get_id_tienda() . "<br>";
        echo "NOMBRE: " . $tienda -> get_nombre() . "<br>";
        echo "telefono: " . $tienda -> get_telefono() . "<br>";
        echo "<hr>";
    }
?>

<?php
    
    //Aquí pongo mis clases
    class tienda {
        private $id_tienda;
        private $nombre;
        private $telefono;

        //getters
        public function get_id_tienda() {
            return $this->id_tienda;
        }
        public function get_nombre() {
            return $this->nombre;
        }
        public function get_telefono() {
            return $this->telefono;
        }
    }
?>