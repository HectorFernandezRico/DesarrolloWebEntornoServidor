@extends('layouts.app')
@section('titulo', 'Crear')
@section('encabezado', 'CREAR UNA PIZZA')
@section('descripcion', 'Añade los datos para crear una nueva pizza.')
@section('contenido')
<form action="{{ route('pizzas.store') }}" method="POST">
    @csrf    
    
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" required>
    </p>
    
    <p>
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" id="descripcion">
            {{old('descripcion')}}
        </textarea>
    </p>
    
    <p>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="{{old('precio')}}" required>
    </p>
    
    <button type="submit">Añadir</button>
</form>
@endsection
