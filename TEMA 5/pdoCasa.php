<?php
session_start(); // Inicia sesión si necesitas usar variables de sesión

try {
    // Conexión a la Base de Datos
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=hfernandezdb', 'root', ''); // Cambia la contraseña según tu configuración de XAMPP
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: mensaje de éxito para pruebas
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    // Manejo de errores y almacenamiento de mensaje en sesión
    $_SESSION['mensaje'] = "No se ha podido establecer la conexión a la BD: " . $e->getMessage();

    // Opcional: muestra el error en la pantalla para pruebas
    echo $_SESSION['mensaje'];
}