@extends('layouts.app')
@section('titulo', 'Editar')
@section('encabezado', 'EDITAR CLIENTE')
@section('descripcion', 'Modifique los datos y presione "confirmar" para guardar los cambios.')
@section('contenido')
<div class="cuadro">
    <form action="{{ route('clientes.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{old('nombre') ? old('nombre') : $customer->nombre}}" required>
        </p>
        
        <p>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="{{old('direccion') ? old('direccion') : $customer->direccion}}" required>
        </p>
        
        <p>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" value="{{old('telefono') ? old('telefono') : $customer->telefono}}" required>
        </p>
        
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{old('email') ? old('email') : $customer->email}}" required>
        </p>
        
        <button type="submit">Actualizar</button>
    </form>
    
</div>
@endsection