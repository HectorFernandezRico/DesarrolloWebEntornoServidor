<?php
    session_start();
    //require_once("pdo.php");
    require_once("pdoCasa.php");

    function mostrarTabla($pdo){
    $crearFichero = "./files/socios.json";
    $tabla = "";
    $array = [];
    try {
        $query = "SELECT * FROM usuarios";
        $resultado = $pdo->query($query);
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            // Concatenamos las filas a la tabla en vez de sobrescribirla
            $tabla .= '<tr>';
            $tabla .= '<td>' . $fila["usuario_id"] . "</td>";
            $tabla .= '<td>' . $fila["nombre"] . "</td>";
            $tabla .= '<td>' . $fila["email"] . "</td>";
            $tabla .= '<td>' . $fila["password"] . "</td>";            
            $tabla .= '</tr>';

            $array[] = $fila;
            
        }

        $fichero = fopen($crearFichero, "w+");
        $json = json_encode($array, JSON_PRETTY_PRINT);
        fwrite($fichero, $json);

        fclose($fichero);

    } catch (Exception $ex) {
        $_SESSION['mensaje'] = "No se ha podido visualizar la tabla: " . $ex->getMessage();
        error_log("ERROR: en el programa" . $ex->getFile() .  " En la linea " .
            $ex->getFile() . " ERRORCODE: " . $ex->getCode() . 
            "ErrorMessage: " . $ex->getMessage());
    }
    return $tabla;

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json</title>
</head>
<body>
    <h1>Json</h1>
    <br>
    <p>Este programa lee los datos de la tabla usuarios y los guarda en un archivo en formato JSON.</p>
    <br>
    <h3>Contenido de la tabla</h3>
    <table border="2px">    
            <?=mostrarTabla($pdo)?>
    </table>
    <br>
    <h3>JSON resultante</h3>
    <br>
    <div>
        <form method="post">
            <p>
                <label for="">Fichero a guardar: </label>
                <input type="text" name="json">
                <input type="submit" name="convertir" value="Convertir">
            </p>
        </form>
    </div>
    <br>
    <h3>JSON Resultante</h3>
    <br>
</body>
</html>