<?php
    session_start();

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
                    <input type="text">
                </p>
                <p>
                    <label for="Apellido">Apellido: </label>
                    <input type="text">
                </p>
                <p>
                    <label for="Email">Email: </label>
                    <input type="text">
                </p>
                <p>
                    <label for="Sexo: ">Sexo: </label>
                    <input id="Sexo" type="radio" name="Sexo" value="Hombre">Hombre
                    <input id="Sexo" type="radio" name="Sexo" value="Mujer">Mujer

                </p>
            </fieldset>
        
    </form>
</body>
</html>