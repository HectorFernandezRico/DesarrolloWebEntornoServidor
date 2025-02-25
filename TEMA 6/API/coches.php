<?php
require_once('pdo.php');

$input = file_get_contents('php://input');
header('Content-type: application/json; charset=UTF-8');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (preg_match('|^/cars/?$|', $uri)) {
            echo obtener_coches($pdo);
        } elseif (preg_match('|^/cars/(\d+)$|', $uri, $matches)) {
            echo obtener_coche($pdo, $matches[1]);
        } else {
            echo json_encode(["resultado" => "Request inválida"]);
        }
        break;

    case 'POST':
        crear_coche($pdo, $input);
        http_response_code(201);
        echo json_encode(["resultado" => "Coche agregado correctamente"]);
        break;

    case 'PUT':
        if (preg_match('|^/cars/(\d+)$|', $uri, $matches)) {
            modificar_coche($pdo, $matches[1], $input);
            echo json_encode(["resultado" => "Coche modificado correctamente"]);
        } else {
            echo json_encode(["resultado" => "Request inválida"]);
        }
        break;

    case 'DELETE':
        if (preg_match('|^/cars/(\d+)$|', $uri, $matches)) {
            eliminar_coche($pdo, $matches[1]);
            echo json_encode(["resultado" => "Coche eliminado correctamente"]);
        } else {
            echo json_encode(["resultado" => "Request inválida"]);
        }
        break;

    default:
    http_response_code(404);
        echo json_encode(["resultado" => "Método no permitido"]);
}

function obtener_coches($pdo)
{
    $sql = "SELECT * FROM cars";
    $resultado = $pdo->query($sql);
    return json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
}

function obtener_coche($pdo, $id)
{
    $sql = "SELECT * FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $coche = $stmt->fetch(PDO::FETCH_ASSOC);

    return $coche ? json_encode($coche) : json_encode(["resultado" => "No existe ningún coche con ese ID"]);
}

function crear_coche($pdo, $input)
{
    $data = json_decode($input, true);
    if (!isset($data['nombre'], $data['modelo'], $data['precio'])) {
        echo json_encode(["resultado" => "Datos inválidos"]);
        exit;
    }
    
    $sql = "INSERT INTO cars (nombre, modelo, precio) VALUES (:nombre, :modelo, :precio)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $data['nombre'],
        ':modelo' => $data['modelo'],
        ':precio' => $data['precio']
    ]);
}

function modificar_coche($pdo, $id, $input)
{
    $data = json_decode($input, true);
    if (!isset($data['nombre'], $data['modelo'], $data['precio'])) {
        echo json_encode(["resultado" => "Datos inválidos"]);
        exit;
    }

    $sql = "UPDATE cars SET nombre = :nombre, modelo = :modelo, precio = :precio WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nombre' => $data['nombre'],
        ':modelo' => $data['modelo'],
        ':precio' => $data['precio']
    ]);
}

function eliminar_coche($pdo, $id)
{
    $sql = "DELETE FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
