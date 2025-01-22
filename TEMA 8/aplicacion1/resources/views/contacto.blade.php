@extends('layouts.app')
@section('content')
    <h1>Página de Contactos</h1>
    
    @if (count($contactos) > 0)
        <ul>
            @foreach ($contactos as $unContacto)
                <li>{{$unContacto}}</li>
            @endforeach
        </ul>
    @endif

@endsection 

@section('footer')
    <p>Este es el pié de página: enlace a varios contactos</p>
    <p>OTRA LÍNEA MÁS</p>
@endsection