@extends('layouts.app')
@section('title', $category->nombre)

@section('description', 'Los mejores hilos sobre '. $category->nombre)

@section('content')
    <h1>Formulario</h1>
    <form action="{{route('grabar')}}" method="post">
        @csrf
        <p>
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" value="{{old('autor')}}">
        </p>
        <p>
            <label for="autor">Titulo: </label>
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
        </p>
        <p>
            <label for="cuerpo">Cuerpo del mensaje: </label>
            <textarea name="cuerpo" id="cuerpo" cols="30" rows="10">
                {{old('cuerpo')}}
            </textarea>
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
        @if(session('mensaje'))
            {{session('mensaje')}}
        @endif
        {{--Miro si hay en la sesion errores de validacion--}}

        @error('titulo')
        {{$message}}
        @enderror
        @error('autor')
        {{$message}}
        @enderror
    </form>
@endsection