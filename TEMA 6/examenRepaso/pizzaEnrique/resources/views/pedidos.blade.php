@extends('layouts.app')
@section('titulo', 'Pedidos')
@section('encabezado', 'PEDIDOS DE ' . $customer->nombre)
@section('descripcion', 'Listado de los pedidos del cliente seleccionado.')
@section('contenido')
    <div class="botones"> 
        <a href="{{route('clientes.index')}}"><button>Volver</button></a>
    </div>
    @foreach ($pedidos as $pedido)
        <div class="cuadro">
            <p>
                Nº Pedido: {{$pedido->id}}
            </p>
            <p>
                Fecha: {{$pedido->fecha}}
            </p>
            <p>
                Hora: {{$pedido->hora}}
            </p>
            <p>
                Pizzas: {{ $pedido->pizzas->pluck('nombre')->join(' ') }}
            </p>
        </div>
    @endforeach
@endsection