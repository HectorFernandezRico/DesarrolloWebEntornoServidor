<?php
require 'db.php';
header("Content-Type: application/json");

$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_method) {
    case 'GET':
        if (preg_match('/^\/pages\/?$/', $request_uri)) {
            // Obtener todas las páginas
            $stmt = $pdo->query("SELECT * FROM pages");
            $pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($pages);
        } elseif (preg_match('/^\/pages\/(\d+)$/', $request_uri, $matches)) {
            // Obtener una página por ID
            $id = $matches[1];
            $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = ?");
            $stmt->execute([$id]);
            $page = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($page);
        } elseif (preg_match('/^\/pages\/meses\/?$/', $request_uri)) {
            // Obtener meses y número de páginas
            $stmt = $pdo->query("SELECT mes, COUNT(*) as num_pages FROM pages GROUP BY mes");
            $months = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($months);
        }
        break;

    case 'POST':
        if (preg_match('/^\/pages\/?$/', $request_uri)) {
            // Insertar una nueva página
            $data = json_decode(file_get_contents('php://input'), true);
            $stmt = $pdo->prepare("INSERT INTO pages (dia, mes, festivos, titulo_foto, lugar_foto, pais_foto) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$data['dia'], $data['mes'], $data['festivos'], $data['titulo_foto'], $data['lugar_foto'], $data['pais_foto']]);
            $id = $pdo->lastInsertId();
            echo json_encode(['paginaInsertada' => $id]);
        }
        break;

    case 'PUT':
        if (preg_match('/^\/pages\/(\d+)$/', $request_uri, $matches)) {
            // Modificar una página existente
            $id = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $stmt = $pdo->prepare("UPDATE pages SET dia = ?, mes = ?, festivos = ?, titulo_foto = ?, lugar_foto = ?, pais_foto = ? WHERE id = ?");
            $stmt->execute([$data['dia'], $data['mes'], $data['festivos'], $data['titulo_foto'], $data['lugar_foto'], $data['pais_foto'], $id]);
            echo json_encode(['paginaModificada' => $id]);
        }
        break;

    case 'DELETE':
        if (preg_match('/^\/pages\/(\d+)$/', $request_uri, $matches)) {
            // Eliminar una página
            $id = $matches[1];
            $stmt = $pdo->prepare("DELETE FROM pages WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['PaginaEliminada' => $id]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>