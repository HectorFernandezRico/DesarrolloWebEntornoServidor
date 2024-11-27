<?php
// Parámetros de conexión a la base de datos
$host = 'localhost'; // Host de la base de datos (en local)
$dbname = 'hfernandezdb'; // Nombre de la base de datos
$username = 'root'; // Nombre de usuario para la base de datos
$password = 'root'; // Contraseña (vacía si usas la configuración por defecto de XAMPP)

// Establecer la conexión a la base de datos con PDO
try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el modo de error de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ocurre un error de conexión, muestra el mensaje
    die("Error de conexión: " . $e->getMessage());
}
?>
