@extends('layouts.app')
@section('titulo', 'FORMULARIO DE MODIFICACIÓN')

@section('contenido')

    <form action="{{route('students.update', $student->id)}}" method="post">
        @csrf
        @method('PUT')
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')?old('nombre'):$student->nombre}}">
        </p>
        <p>
            <label for="nota">Nota: </label>
            <input type="text" name="nota" id="nota" value="{{old('nota')?old('nota'):$student->nota}}">
        </p>
        <p>
            <input type="submit" value="MODIFICAR">
        </p>
    </form>
    @if (session('mensaje'))
        {{session('mensaje')}}
    @endif

    @error('nombre')
        {{$message}}
    @enderror
    
    @error('nota')
        {{$message}}
    @enderror
@endsection