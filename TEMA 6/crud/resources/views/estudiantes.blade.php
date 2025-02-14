@extends('layouts.app')
@section('titulo', 'CONSULTA DE ESTUDIANTES')

@section('contenido')
    @foreach ($students as $student)
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
    @endforeach
@endsection