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
            <input type="text" name="autor" id="autor" value="{{old('autor')}}">
        </p>

        <p>
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" value="{{old('autor')}}">
        </p>

        <p>
            <label for="cuerpo">Cuerpo: </label>
            <textarea  name="cuerpo" id="cuerpo" cols="30" rows="10"> 
                {{old('cuerpo')}}
            </textarea>
        </p>
        <p>
            <input type="submit" value="Grabar">
        </p>
    </form>
    {{-- Miro si hay un mensaje en la sección --}}
    @if(session('mensaje'))
        {{session('mensaje')}}
    @endif
    {{-- Miro si hay en la sesión errores de validación --}}
    @error('titulo')
        {{ $message }}
    @enderror
    @error('autor')
        {{ $message }}
    @enderror
</body>
</html>