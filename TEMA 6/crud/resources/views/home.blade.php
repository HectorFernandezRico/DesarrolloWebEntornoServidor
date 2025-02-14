@extends('layouts.app')
@section('titulo', 'BIENVENIDOS AL CRUD DE ESTUDIANTES')
@section('contenido')
    <a href="{{route('students.create')}}"><button>ALTA</button></a>
    <a href="{{route('students.index')}}"><button>CONSULTAR TODOS</button></a>

@endsection 