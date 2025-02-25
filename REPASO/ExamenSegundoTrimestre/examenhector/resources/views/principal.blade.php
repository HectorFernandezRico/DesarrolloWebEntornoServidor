@extends('layouts.plantilla')
@section('name','Pagina principal')
@section('title','Pagina principal')

@section('section')

@foreach ($clientes as $cliente)
<div>

<p>Razon social : {{$cliente->razonsocial}}</p>
<p>Pcontacto: {{$cliente->pcontacto}}</p>
<p>telefono: {{$cliente->telefono}}</p>
<p>email: {{$cliente->email}}</p>
<p>direccion: {{$cliente->direccion}}</p>
</div>    
@endforeach


@endsection

    