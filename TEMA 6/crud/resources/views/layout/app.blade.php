<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESTUDIANTES</title>
    <style>
        .contenedor{
            width: 90%;
            margin: auto;
            background: linear-gradient(lightblue, white);
        }
    </style>
</head>
<body>
    <h1>@yield('titulo')</h1>
    <div class="contenedor">
        @yield('contenido')
    </div>
</body>
</html>