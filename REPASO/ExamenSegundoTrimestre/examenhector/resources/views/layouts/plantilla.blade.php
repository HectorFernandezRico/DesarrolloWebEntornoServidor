<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('plantilla.css')}}">
</head>
<body>
    <h1>@yield('name')</h1>
    <a href="{{route('clientes.home')}}"><button>Home</button></a>
    <a href="{{route('formulario.alta')}}"><button>Alta</button></a>

  
    @yield('section')

</body>
</html>