@extends('layouts.plantilla')
@section('name','Formulario de alta')
@section('title','Formulario de alta')

@section('section')
<div>
<form action="{{route('clientes.alta')}}" method="post">
    @csrf
    <p>
        <label for="razonsocial">Razon social:</label>
        <input type="text" name="razonsocial" id="razonsocial" value="{{old('razonsocial')}}">
    </p>
    <p>
        <label for="pcontacto">Persona contacto:</label>
        <input type="text" name="pcontacto" id="pcontacto" value="{{old('pcontacto')}}">
    </p>
    <p>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="{{old('email')}}">
    </p>
    <p>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" value="{{old('direccion')}}">
    </p>

    <input type="submit" value="Añadir" name="anadir">
</form>
</div>
<a href="{{route('clientes.home')}}"><button>Volver</button></a>

@if (session('mensaje'))
    <p class="azul">{{session('mensaje')}}</p>
@endif
@error('razonsocial')
    <p class="rojo">{{$message}}</p>
@enderror
@error('pcontacto')
    <p class="rojo">{{$message}}</p>
@enderror
@error('telefono')
    <p class="rojo">{{$message}}</p>
@enderror
@error('email')
    <p class="rojo">{{$message}}</p>
@enderror
@error('direccion')
    <p class="rojo">{{$message}}</p>
@enderror
    
@endsection