<?php
    session_start();
    require_once("pdo.php");

    $mensaje = "";

    
    
    while ($fila = $resultado -> fetch(PDO::FETCH_ASSOC)) {

    }

    if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["submit"])) {

        if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["password"])) {
            $_SESSION["mensaje"] = "Algún campo vacio";
        } else {
            try {
                //Preparo el String con el INSERT: utilizo placeholders
                $sql = "INSERT INTO usuarios (nombre, email, password
                        VALUES (:nombre, :email, :password)";
                //Para mostrar luego
                $_SESSION["mensaje"] = $sql;
                //Le digo a PDO que prepare la sentencia
                $resultado = $pdo -> prepare($sql);
                //Le digo a PDO qu eejecute la sentencia, sustituyendo los placeholders
                $resultado -> execute ([
                    ':nombre' => $_POST['nombre'],
                    ':email' => $_POST['email'],
                    ':password' => $_POST['password']
                ]);
            } catch (Exception $e) {
                $_SESSION["mensaje"] = "Ha ocurriodo un error";
            }
        }
        header("Location: usuarios.php");
        return;
    }
    //Mensajes FLASH
    $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']);
?>
<?php
    function mostrarTabla ($pdo){
        $tabla = "";
        try {
            $query = "SELECT nombre, email, password FROM usuarios";
            $resultado = $pdo -> query($query);
            while ($fila = $resultado -> fetch(PDO::FETCH_ASSOC)) {
                $tabla = '<tr>';
                    $tabla = '<td>' . $fila["nombre"] . "</td>";
                    $tabla = '<td>' . $fila["email"] . "</td>";
                    $tabla = '<td>' . $fila["password"] . "</td>";
                $tabla = '</tr>';
            }
            
        } catch (Exception $ex) {
            $_SESSION['mensaje'] = "No se ha podido visualizar la tabla";
        }
        return $tabla;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <br>
    <h1>Usuarios</h1>
    <br>
    <table border="2px" text-aling="center">
        <?=mostrarTabla($pdo)?>
    </table>
    <br>
    <h1>Añade un nuevo Usuario</h1>
    <form method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="password">Contraseña: </label>
            <input type="text" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="submit" value="Entra">
        </p>
    </form>
    <p><?=$mensaje?></p>

</body>
</html>