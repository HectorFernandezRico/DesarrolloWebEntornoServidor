<?php
    session_start();

    //Verifico
    if(isset($_POST["submit"]) && isset($_POST["nombre"]) &&  isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["sexo"])){
       //Miro si no esta vacio
        if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["sexo"])) {
            

        }






        //Mensaje flash
        unset($_SESSION["app.php"]);
        header('Location:' . $_SERVER['PHP_SELF']);
        return;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP</title>
</head>
<body>
    <h1>Datos Personales</h1>

    <form method="post">
        
            <fieldset>
                <legend>Datos</legend>
                <p>
                    <label for="Nombre">Nombre: </label>
                    <input type="text" name="nombreº">
                </p>
                <p>
                    <label for="Apellido">Apellido: </label>
                    <input type="text" name="apellido">
                </p>
                <p>
                    <label for="Email">Email: </label>
                    <input type="text"  name="email">
                </p>
                <p>
                    <label for="Sexo: ">Sexo: </label>
                    <input id="Sexo" type="radio" name="sexo" value="Hombre">Hombre
                    <input id="Sexo" type="radio" name="sexo" value="Mujer">Mujer
                </p>
                <p>
                    <input type="submit" name="submit">
                </p>
            </fieldset>
        
    </form>
</body>
</html>