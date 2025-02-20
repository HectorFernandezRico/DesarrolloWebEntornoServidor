@extends('layouts.app')
@section('titulo', 'Home')
@section('encabezado', 'MENÚ')
@section('descripcion', 'Página principal listando todos los clientes y con dos opciones.')
@section('contenido')
    <div class="botones">
        <a href="{{route('clientes.create')}}"><button>Añadir</button></a>
        <a href="{{route('clientes.index')}}"><button>Clientes</button></a>
        <a href="{{route('pizzas.index')}}"><button>Pizzas</button></a>
    </div>
    {{ $customers->links('pagination::bootstrap-5') }}
    @foreach ($customers as $customer)
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
            <div class="botones">
                <form action="{{route('clientes.edit', $customer->id)}}" method="get">
                    @csrf
                    <input type="submit" value="EDITAR">
                </form>
                <form action="{{route('clientes.delete', $customer->id)}}" method="get">
                    @csrf
                    <input type="submit" value="BORRAR">
                </form>
                <form action="{{route('clientes.pedidos', $customer->id)}}" method="get">
                    @csrf
                    <input type="submit" value="GESTIONAR PEDIDOS">
                </form>
            </div>
        </div>
    @endforeach
    {{ $customers->links('pagination::bootstrap-5') }}

    @if (session('mensaje'))
        <script>
            alert("{{ session('mensaje') }}");
        </script>
    @endif
@endsection