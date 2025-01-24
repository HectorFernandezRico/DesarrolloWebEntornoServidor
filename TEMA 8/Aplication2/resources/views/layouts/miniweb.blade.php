<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>miWeb</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href=".">Página principal</a></li>
                <li><a href="{{url('visitas')}}"></a>Visitas</li>
                <li><a href="{{url('inscripcion')}}"></a>Inscripción</li>
            </ul>
        </nav>
    </div>
    @yield('container')
</body>
</html>