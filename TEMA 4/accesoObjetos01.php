<?php
    require_once('pdo.php');
    //Accedo para mostrar todos los registros de la tabla tienda.
    $sql = "SELECT * FROM tienda";

    $sentencia = $pdo -> prepare($sql);
    $sentencia -> execute();

    $sentencia -> setFetchMode(PDO::FETCH_CLASS, tienda::class);
    while ($tienda = $sentencia -> fetch()) {
        echo "ID TIENDA: " . $tienda -> id_tienda . "<br>";
        echo "NOMBRE: " . $tienda -> nombre . "<br>";
        echo "telefono: " . $tienda -> telefono . "<br>";
        echo "<hr>";
    }
?>

<?php
    
    //Aquí pongo mis clases
    class tienda {
        
    }
?>