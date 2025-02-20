@extends('layouts.app')
@section('titulo', 'Editar')
@section('encabezado', 'EDITAR PIZZA')
@section('descripcion', 'Modifique los datos y presione "confirmar" para guardar los cambios.')
@section('contenido')
<div class="cuadro">
    <form action="{{ route('pizzas.store', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{old('nombre') ? old('nombre') : $pizza->nombre}}" required>
        </p>
        
        <p>
            <label for="descripcion">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion') ? old('descripcion') : $pizza->descripcion}}" required>
        </p>
        
        <p>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="{{old('precio') ? old('precio') : $pizza->precio}}" required>
        </p>
        
        <button type="submit">Actualizar</button>
    </form>
    
</div>
@endsection