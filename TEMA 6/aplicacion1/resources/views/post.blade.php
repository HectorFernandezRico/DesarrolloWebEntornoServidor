@extends('layouts.app')
@section('content')
    <h1>Información del post número: {{$id}}</h1>
    <p>Título: {{$titulo}}</p>
    <p>Temática: {{$tematica}}</p>
    <p>Autor: {{$autor}}</p>
    <p>Mensaje: {{$mensaje}}</p>
@endsection

