<?php

    try {
         //Conexión a ña Base de Datos
        $pdo = new PDO ('mysql:host=db;port=3306;dbname=hfernandezdb', 'root', 'root');
      
        // Control de errores
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        $_SESSION['mensaje'] = "No se ha podido establecer la conexión a BD: " . $e -> getMessage();
    }
   
    /*
    $resultado = $pdo -> query("SELECT * FROM usuarios");

    while ($fila = $resultado -> fetch (PDO::FETCH_ASSOC)) {
        echo "<pre>";
        print_r($fila);
        echo "</pre><br><br>";
    }
    */
