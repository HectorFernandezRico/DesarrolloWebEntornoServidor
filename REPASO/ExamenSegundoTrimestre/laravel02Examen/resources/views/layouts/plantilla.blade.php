<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"@yield('titulo')"</title>
    <link rel="stylesheet" href="{{asset('./CSS/plantilla.css')}}">
</head>

<body>
    <header>
        <a href="{{route('clientes.home')}}"><button>Home</button></a>
        <a href="{{route('formulario.alta')}}"><button>Alta</button></a>
    </header>
    <h1>@yield('name')</h1>
    
    <div>@yield('section')</div>
</body>

</html>