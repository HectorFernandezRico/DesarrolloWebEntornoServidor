@extends('layouts.app')
@section('titulo', 'Borrar')
@section('encabezado', 'CONFIRMAR BORRADO')
@section('descripcion', 'Presiona al botón para borrar este cliente de la base de datos.')
@section('contenido')
    <div class="cuadro">
        <p>
            Nombre: {{$customer->nombre}}
        </p>
        <p>
            Dirección: {{$customer->direccion}}
        </p>
        <p>
            Teléfono: {{$customer->telefono}}
        </p>
        <p>
            Email: {{$customer->email}}
        </p>
        <form action="{{route('clientes.destroy', $customer->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="CONFIRMAR">
        </form>
        
    </div>
@endsection