<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORMULARIO</title>
</head>
<body>
    <h1>FORMULARIO</h1>
    <form action="{{route('grabar')}}" method="post">
        <p>
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor">
        </p>

        <p>
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo">
        </p>

        <p>
            <label for="cuerpo">Cuerpo: </label>
            <input  name="cuerpo" id="cuerpo" cols="30" rows="10">
        </p>
        
        <input type="submit" value="Grabar">
        
    </form>
</body>
</html>