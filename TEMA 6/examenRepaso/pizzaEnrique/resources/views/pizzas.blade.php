@extends('layouts.app')
@section('titulo', 'Pizzas')
@section('encabezado', 'Pizzas')
@section('descripcion', 'Página listando todos las pizzas y con dos opciones.')
@section('contenido')
    <div class="botones">
        <a href="{{route('pizzas.create')}}"><button>Añadir</button></a>
        <a href="{{route('clientes.index')}}"><button>Clientes</button></a>
        <a href="{{route('pizzas.index')}}"><button>Pizzas</button></a>
    </div>
    {{ $pizzas->links('pagination::bootstrap-5') }}
    @foreach ($pizzas as $pizza)
        <div class="cuadro">
            <p>
                Nombre: {{$pizza->nombre}}
            </p>
            <p>
                Descripcion: {{$pizza->descripcion}}
            </p>
            <p>
                Precio: {{$pizza->precio}}
            </p>
            <div class="botones">
                <form action="{{route('pizzas.edit', $pizza->id)}}" method="get">
                    @csrf
                    <input type="submit" value="EDITAR">
                </form>
                <form action="{{route('pizzas.destroy', $pizza->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="BORRAR">
                </form>
            </div>
        </div>
    @endforeach
    {{ $pizzas->links('pagination::bootstrap-5') }}

    @if (session('mensaje'))
        <script>
            alert("{{ session('mensaje') }}");
        </script>
    @endif
@endsection