@extends('layouts.app')

@section('title', 'Nuevo hilo')

@section('content')
    <form action="{{ route('add') }}" method="POST">
        @csrf
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        </p>
        <p>
            <label for="slug">Clave: </label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
        </p>
        <p>
            <label for="body">Cuerpo del mensaje: </label>
            <textarea name="body" id="body" cols="30" rows="10">
                {{ old('body') }}
            </textarea>
        </p>
        <p>
            <label for="category_id">Seleccione una Categoria</label>
            <select name="category_id" id="category_id">
                <option selected value="none">-- select category --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{ old('categoria')=='$categoria->id'?'selected':'' }} >{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="user_id">Seleccione un Usuario</label>
            <select name="user_id" id="user_id">
                <option selected value="none">-- seleccione un usuario --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}" {{ old('usuario')=='$usuario->id'?'selected':'' }} >{{$usuario->name}}</option>
                @endforeach
            </select>
        </p>
        <p>
            <input type="submit" value="Añadir hilo">
        </p>
    </form>
    {{--Mostramos el mensaje si todo ha salido bien--}}
    @if (session('mensaje'))
        <div class="mensaje">
            {{ session('mensaje') }}
        </div>
    @endif

    {{--Mostramos los errores que ocurran--}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection