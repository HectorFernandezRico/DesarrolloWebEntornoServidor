<?php

    try {
         //Conexión a la Base de Datos
        $pdo = new PDO ('mysql:host=db;port=3306;dbname=hfernandezdb', 'root', '');
      
        // Control de errores
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "No se ha podido establecer la conexión a BD: " . $e -> getMessage();
    }
   
    /*
    $resultado = $pdo -> query("SELECT * FROM usuarios");

    while ($fila = $resultado -> fetch (PDO::FETCH_ASSOC)) {
        echo "<pre>";
        print_r($fila);
        echo "</pre><br><br>";
    }
    */
