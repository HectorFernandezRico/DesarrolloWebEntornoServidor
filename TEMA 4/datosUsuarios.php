<?php
    session_start();
    require_once('pdo.php');

    $mensaje = "";
    //Miro si entran con POST de BORRAR - valido, guardo y siempre redirecciono.
    if (isset($_POST['borrar']) && isset($_POST['usuario_id'])) {
        //Borro el registro de la tabla.
        $sql = "DELETE FROM usuarios WHERE usuario_id = :usuario_id";
        $resultado = $pdo -> prepare($sql);
        $resultado -> execute([
            'usuario_id' => $_POST['usuario_id']
        ]);
        $_SESSION['mensaje'] = "Usuario " . $_POST['usuario_id'] . "Eliminado con éxito";
        //Redirecciono
        header('Location: ' . $_SERVER['PHP_SELF']);
        return;
    }
    //Miro si entran con POST - de INSERTAR - valido, guardo y siempre redirecciono
    if (!(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password']))) {
        $_SESSION['mensaje'] = "Tiene que indicar todos los campos: nombre, email y password";
    } else { // Todos los datos son correctos
        // Inserto el registro
        $sql = "INSERT INTO usuarios (nombre, email, password)
                VALUES (:nombre, :email, :password)";

        $resultado = $pdo->prepare($sql);

        $resultado -> execute([
            ":nombre" => $_POST['nombre'],
            ":email" => $_POST['email'],
            ":password" => $_POST['password']
            ]);
            $_SESSION['mensaje'] = "Usuario insertado con éxito";
    //Aqui fuera de comprobaciones y acciones, redirecciono
    header('Location: ' . $_SERVER['PHP_SELF']);
    return;
    }

    

    //Si no entró con POST, ejecutará a partir de aquí
    //Gestión de mensajes - FLASH
    $mensaje = isset($_SESSION['mensaje'])? $_SESSION['mensaje']: "";
    unset($_SESSION['mensaje']);
?>

<?php
    //Funciones:
    function datosTabla ($pdo) {

        $tabla = "";
        //Acceder a base de datos 
        $query = "SELECT * FROM usuarios";
        $resultado = $pdo -> query($query);
        
        //Obtener todos los registros de usuarios
        while ($fila  = $resultado -> fetch(PDO::FETCH_ASSOC)) {
            
            //Mostrarlos en forma de tabla, un registro por fila
            $tabla.= "<tr>";
                $tabla.= "<td>" . $fila['nombre'] . '</td>';
                $tabla.= "<td>" . $fila['email'] . '</td>';
                $tabla.= "<td>" . $fila['password'] . '</td>';
                $tabla.= '<td>';
                    $tabla.= '<form method="post">
                                    <input type="hiden" name="usuario_id" value="' . $fila['usuario_id'] . '">
                                    <input type="submit" name="borrar" value="Borrar">

                                </form>
                    ';
                $tabla.= '</td>';
            $tabla.= "<tr>";
        }
        return $tabla;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertando con FORM</title>
</head>
<body>
    <h3>Usuarios</h3>
    <table border="1">
        <?php
        /*
            //Acceder a base de datos 
            $query = "SELECT * FROM usuarios";
            $resultado = $pdo -> query($query);
            
            //Obtener todos los registros de usuarios
            while ($file  = $resultado -> fetch(PDO::FETCH_ASSOC)) {
                
                //Mostrarlos en forma de tabla, un registro por fila
                echo "<tr>";
                    echo "<td>" . $fila['nombre'] . '</td>';
                    echo "<td>" . $fila['email'] . '</td>';
                    echo "<td>" . $fila['password'] . '</td>';
                echo "<tr>";
            }
*/
            echo datosTabla($pdo);
        ?>
    </table>
    <h2>Registro Usuario</h2>
    <p><?=$mensaje?></p>
    <form method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre">
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email">
        </p>
        <p>
            <label for="nombre">Password: </label>
            <input type="text" id="password" name="password">
        </p>
        <div>
            <input type="submit" value="Registrarse" name="adduser">
        </div>
    </form>
</body>
</html>