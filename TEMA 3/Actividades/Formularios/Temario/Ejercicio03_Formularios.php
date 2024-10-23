<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Prueba de formularios</h1>

    <h2>$_GET</h2>
    <pre><?php print_r($_GET); ?></pre>
    <h2>$_POST</h2>
    <pre><?php print_r($_POST); ?></pre>

    <h3>Formulario de prueba</h3>
    <form method="post">
        <p>
            <label for="texto">Texto: </label>
            <input id="texto" name="texto" type="text" />
        </p>
        <p>
            <label for="password">Password: </label>
            <input id="password" name="password" type="password" />
        </p>
        <p>
            <label for="check1"> Check 1 </label>
            <input id="check1" name="check1" type="checkbox" value="1" />
            <label for="check2"> Check 2 </label>
            <input id="check2" name="check2" type="checkbox" value="2" />
            <label for="check3"> Check 3 </label>
            <input id="check3" name="check3" type="checkbox" value="3" />
        </p>
        <p>
            <label for="radio1"> Radio 1 </label>
            <input id="radio1" name="radio" type="radio" value="1" />
            <label for="radio2"> Radio 2 </label>
            <input id="radio2" name="radio" type="radio" value="2" />
            <label for="radio3"> Radio 3 </label>
            <input id="radio3" name="radio" type="radio" value="3" />

        </p>
        <p>
            <label for="select"> Select: </label>
            <select name="select" id="select">
                <option value="1">Opción 1</option>
                <option value="2">Opción 2</option>
                <option value="3">Opción 3</option>
                <option value="4">Opción 4</option>
            </select>
        </p>
        <p>
            <label for="textarea"> Textarea: </label>
            <textarea name="textarea" cols="50" rows="5">
                Escribe aquí tu texto...
            </textarea>
        </p>
        <p>
            <button type="button" onclick="alert('Hola!!');">Clickeame</button>
        </p>
        <p>
            <input type="submit" name="submit" value="Enviar" />
        </p>
</form>
</body>
</html>