@extends('layouts.miniweb')
@section('container')
    @foreach ($lugares as $pais => $datos)
    <h2 class="titulo">{{$pais}}</h2>
    <div class="container d-flex justify-content-between">
        @foreach ($datos as $dato)
            <div class="card" style="width: 18rem;">
                <img src="{{ $dato[3] }}" class="card-img-top" alt="{{$dato[0]}}">
                <div class="card-body">
                    <h5 class="card-title">{{ $dato[0] }}</h5>
                    <p class="card-text">{{ $dato[1] }}</p>
                    <a href="{{ $dato[2] }}" class="btn btn-primary"><i>Buscar...</i></a>
                </div>
            </div>
        @endforeach
    </div>
    @endforeach
@endsection
