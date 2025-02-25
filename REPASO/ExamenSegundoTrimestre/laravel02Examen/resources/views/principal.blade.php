@extends('layouts.plantilla')
@section('titulo', 'Clientes')
@section('name', 'Clientes')

@section('section')
    @foreach ($clientes as $cliente)
        <div>
            <h3>Razon Social: {{$cliente->razonsocial}}</h3>
            <h3>Persona Contacto: {{$cliente->pcontacto}}</h3>
            <h3>Telefono: {{$cliente->telefono}}</h3>
            <h3>Email: {{$cliente->email}}</h3>
            <h3>Dirección: {{$cliente->direccion}}</h3>
        </div>
    @endforeach
@endsection
