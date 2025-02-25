<?php

try {
    $pdo= new PDO('mysql:host=localhost;port=3306;dbname=eval2turno2nader','root','');
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "No se ha podido establecer la conexion a BD:". $e->getMessage();
}