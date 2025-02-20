@extends('layouts.app')
@section('titulo', 'Crear')
@section('encabezado', 'CREAR UN CLIENTE')
@section('descripcion', 'Añade los datos para crear un nuevo cliente.')
@section('contenido')
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf    
    
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" required>
    </p>
    
    <p>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{old('direccion')}}" required>
    </p>
    
    <p>
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="{{old('telefono')}}" required>
    </p>
    
    <p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" required>
    </p>
    
    <button type="submit">Añadir</button>
</form>
@endsection
