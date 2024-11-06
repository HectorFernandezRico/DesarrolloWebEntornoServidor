<?php
try {
  $pdo = new PDO(
    "mysql:host=db;dbname=lamp_db",
    'root',
    'root'
  );
  echo "La conexión ha funcionado correctamente";
} catch (Exception $e) {
  echo "Se ha producido un error en la conexión: " . $e->getMessage();
}
