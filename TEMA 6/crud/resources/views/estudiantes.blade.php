@extends('layouts.app')
@section('titulo', 'CONSULTA DE ESTUDIANTES')

@section('contenido')
    <p style="color: blue">
        @if (session('mensaje'))
            {{ session('mensaje') }}
        @endif
    </p>
    @foreach ($students as $student)
    <div class="cuadro">
        <p>Nombre: {{ $student -> nombre}}</p>
        <p>Nota: {{ $student -> nota}}</p>
        <p>
            <a href="{{route('students.edit', $student -> id)}}"><button>MODIFICAR</button></a>
            <form action="{{route('students.destroy', $student -> id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="BORRAR">
            </form>
        </p>
    </div>
    @endforeach
@endsection