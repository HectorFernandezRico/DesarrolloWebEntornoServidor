<?php
require_once('pdo.php');
//SOLO PARA POST Y PUT
//SI ES DELETE O GET NO SE PONE LA LINEA DE ABAJO
$input = file_get_contents('php://input');
//LA DE ARRIBA


header('Content-type: application/json; charset=UTF-8');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':

        if (preg_match('|^/api/incidencias/$|', $uri)) {
            http_response_code(200);
            echo mostrar_incidencias($pdo);
        } elseif (preg_match('|^/api/incidencias/(\d+)$|', $uri, $matches)) {
            $id = $matches[1];
            $averia = mostrar_incidencia($pdo, $id);

            //ESTO COMPRUEBA SI EXISTE;
            if ($averia) {
                http_response_code(200);
                echo json_encode($averia);
            } else {
                http_response_code(404);
                echo json_encode(["resultado" => "La averia no existe"]);
            }
            /*
            SOLO SE HACE SI NO NOS PIDEN QUE COMPROBEMOS QUE EL DATO EXISTE

            http_response_code(200);
            echo mostrar_incidencia($pdo, $id);
            */
        } else {
            http_response_code(404);
            //Solo si te pide que retornes un body 
            //echo json_encode(["resultado"=>"La ruta es incorrecta"]);
        }

        break;
    case 'POST':
        if (preg_match('|^/api/incidencias/$|', $uri)) {
            echo crear_incidencias($pdo, $input);
        } else {
            http_response_code(404);
            //Solo si te pide que retornes un body 
            //echo json_encode(["resultado"=>"La ruta es incorrecta"]);
        }

        break;
    case 'PUT':
        if (preg_match('|^/api/incidencias/(\d+)$|', $uri, $matches)) {
            $id = $matches[1];
            echo actualizar_incidencia($pdo, $input, $id);
        } else {
            http_response_code(404);
            //Solo si te pide que retornes un body 
            //echo json_encode(["resultado"=>"La ruta es incorrecta"]);
        }
        break;
    case 'DELETE':
        if (preg_match('|^/api/incidencias/(\d+)$|', $uri, $matches)) {
            $id = $matches[1];
            echo borrar_incidencia($pdo, $id);
        } else {
            http_response_code(404);
            //Solo si te pide que retornes un body 
            //echo json_encode(["resultado"=>"La ruta es incorrecta"]);
        }
        break;
    default:
        http_response_code(404);
        //Solo si te pide 
        echo json_encode(["resultado" => "La ruta es incorrecta"]);

}

function mostrar_incidencias($pdo)
{
    try {
        $sql = "SELECT * FROM averias";
        $resultado = $pdo->query($sql);
        http_response_code(200);
        return json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
    } catch (Exception $e) {
        http_response_code(400);  // Código de respuesta HTTP 406
        return json_encode(["resultado" => "Error " . $e->getMessage()]);
    }
}

function mostrar_incidencia($pdo, $id)
{
    try {
        //SIEMPRE ES ASI
        $sql = "SELECT * FROM averias WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);



        // ESTAS DOS LINEAS DE ABAJO SE HACE SOLO SI TE PIDEN COMPROBAR SI EXISTE
        $averia = $stmt->fetch(PDO::FETCH_ASSOC);
        return $averia;


        /*
        SI NO ME PIDE QUE COMPRUEBE SI UN DATO EXISTE 

        http_response_code(200);
        return json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        */
    } catch (Exception $e) {
        http_response_code(400);  // Código de respuesta HTTP 406
        return json_encode(["resultado" => "Error " . $e->getMessage()]);
    }
}

function actualizar_incidencia($pdo, $input, $id)
{
    try {
        $data = json_decode($input, true);
        if (
            (!isset($data['categoria'], $data['situacion'], $data['titulo'], $data['descripcion'], $data['fecha'], $data['hora'])) ||
            ($data['categoria'] == "" || $data['titulo'] == "" || $data['descripcion'] == "" || $data['fecha'] == "" || $data['hora'] == "")
        ) {
            http_response_code(406);  // Código de respuesta HTTP 406
            return json_encode(["resultado" => "Se ha insertado la incidencia (FALTAN DATOS O ESTÁ VACÍO)"]);

        } elseif (
            strlen($data['categoria']) > 255 || strlen($data['situacion']) > 255 || strlen($data['titulo']) > 255 ||
            strlen($data['descripcion']) > 255 || strlen($data['fecha']) > 255 || strlen($data['hora']) > 255
        ) {

            http_response_code(406);  // Código de respuesta HTTP 406
            return json_encode(["resultado" => "Se ha insertado la incidencia (LONGITUD EXCESIVA)"]);

        } else {
            // Aquí va la lógica para insertar la incidencia si todo está bien
            // Por ejemplo, podrías preparar y ejecutar la consulta en la base de datos
            try {
                $sql = "UPDATE averias SET categoria = :categoria, situacion = :situacion, titulo = :titulo, 
                descripcion = :descripcion, fecha = :fecha, hora = :hora WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':categoria' => $data['categoria'],
                    ':situacion' => $data['situacion'],
                    ':titulo' => $data['titulo'],
                    ':descripcion' => $data['descripcion'],
                    ':fecha' => $data['fecha'],
                    ':hora' => $data['hora'],
                    // SIEMPRE SE AÑADE EN EL PUT, EL UNICO QUE SE ACTULIZA
                    ':id' => $id
                ]);
                // Si la inserción es exitosa:
                http_response_code(200);  // Código de respuesta HTTP 200
                return json_encode(["resultado" => "Incidencia modificada correctamente con ID: " . $id]);

                // SI TE PIDE EN EL PUT MOSTRAR LOS DATOS EN EL JSON, ES EL RETURN DE ABAJO
                //return json_encode(["resultado" => "Incidencia modificada correctamente con ID: " . $id, "datos" => $input]);

            } catch (Exception $e) {

                http_response_code(400);  // Código de respuesta HTTP 406
                return json_encode(["resultado" => "Error " . $e->getMessage()]);

            }

        }

    } catch (Exception $e) {
        http_response_code(400);  // Código de respuesta HTTP 406
        return json_encode(["resultado" => "Error " . $e->getMessage()]);
    }
}

function crear_incidencias($pdo, $input)
{
    $data = json_decode($input, true);

    // Validar que todos los campos estén presentes y no vacíos
    if (
        (!isset($data['categoria'], $data['situacion'], $data['titulo'], $data['descripcion'], $data['fecha'], $data['hora'])) ||
        ($data['categoria'] == "" || $data['titulo'] == "" || $data['descripcion'] == "" || $data['fecha'] == "" || $data['hora'] == "")
    ) {
        http_response_code(406);  // Código de respuesta HTTP 406
        return json_encode(["resultado" => "No se ha insertado la incidencia (FALTAN DATOS O ESTÁ VACÍO)"]);

    } elseif (
        strlen($data['categoria']) > 255 || strlen($data['situacion']) > 255 || strlen($data['titulo']) > 255 ||
        strlen($data['descripcion']) > 255 || strlen($data['fecha']) > 255 || strlen($data['hora']) > 255
    ) {

        http_response_code(406);  // Código de respuesta HTTP 406
        return json_encode(["resultado" => "No se ha insertado la incidencia (LONGITUD EXCESIVA)"]);

    } else {
        // Aquí va la lógica para insertar la incidencia si todo está bien
        // Por ejemplo, podrías preparar y ejecutar la consulta en la base de datos
        try {
            $sql = "INSERT INTO averias (categoria, situacion, titulo, descripcion, fecha, hora) VALUES 
            (:categoria, :situacion, :titulo, :descripcion, :fecha, :hora)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':categoria' => $data['categoria'],
                ':situacion' => $data['situacion'],
                ':titulo' => $data['titulo'],
                ':descripcion' => $data['descripcion'],
                ':fecha' => $data['fecha'],
                ':hora' => $data['hora']
            ]);
            // Si la inserción es exitosa:
            http_response_code(201);  // Código de respuesta HTTP 201
            return json_encode(["resultado" => "Incidencia creada correctamente con ID: " . $pdo->lastInsertId()]);
        } catch (Exception $e) {

            http_response_code(400);
            return json_encode(["resultado" => "Error " . $e->getMessage()]);

        }

    }
}

function borrar_incidencia($pdo, $id)
{
    try {
        $sql = "DELETE FROM averias WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        http_response_code(200);
        return json_encode(["resultado" => "Incidencia de ID " . $id . " eliminada con éxito"]);


    } catch (Exception $e) {

        http_response_code(400);
        return json_encode(["resultado" => "Error " . $e->getMessage()]);

    }
}

/*

COMANDOS 

INCIAR SERVIDOR EN API NATIVA
php -S localhost:8001 nombre.php

CURL

curl -X POST|GET|PUT|DELETE -H "Content-type: application/json; charset=UTF-8" -d 'datos(json)' http://localhost:8001/api/incidencias 

COMANDOS CURL 

GET
MOSTRAR TODOS LOS DATOS
curl -X GET -H "Content-type: application/json; charset=UTF-8" http://localhost:8001/api/incidencias 

MOSTRAR TODOS LOS DATOS DE SOLO UN ELEMENTO
curl -X GET -H "Content-type: application/json; charset=UTF-8" http://localhost:8001/api/incidencias/{id} 



POST
CREAR ELEMENTOS
curl -X POST -H "Content-type: application/json; charset=UTF-8" 
-d '{
        "categoria": "Infraestructura",
        "situacion": "Pendiente",
        "titulo": "Problema en la red",
        "descripcion": "La red está caída en la zona norte del edificio.",
        "fecha": "2025-02-24",
        "hora": "09:00"
    }' 
http://localhost:8001/api/incidencias/ 



PUT
MODIFICAR ELEMENTOS
curl -X PUT -H "Content-type: application/json; charset=UTF-8" 
-d '{
        "categoria": "Infraestructura",
        "situacion": "Pendiente",
        "titulo": "Problema en la red",
        "descripcion": "La red está caída en la zona norte del edificio.",
        "fecha": "2025-02-24",
        "hora": "09:00"
    }' 
http://localhost:8001/api/incidencias/{id}




DELETE
BORRAR ELEMENTOS
curl -X DELETE -H "Content-type: application/json; charset=UTF-8" http://localhost:8001/api/incidencias/{id}
*/