<?php

    //Conexión a ña Base de Datos
    $pdo = new PDO ('mysql:host=db;port=3306;dbname=hfernandezdb', 'root', 'root');
    
    /*
    $resultado = $pdo -> query("SELECT * FROM usuarios");

    while ($fila = $resultado -> fetch (PDO::FETCH_ASSOC)) {
        echo "<pre>";
        print_r($fila);
        echo "</pre><br><br>";
    }
    */
    
    // Control de errores
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);