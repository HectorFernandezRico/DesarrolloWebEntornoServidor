@extends('layouts.app')

@section('title', 'Home')

@section('description', 'Bienvenido al foro de comida saludable y ecológica Queremos que puedas rápidamente hacer comidas sanas y ricas.')

@section('content')
    <a class="addButton" href="{{ route('page.form') }}"><img src="{{ url('img/addButton.png')}}" alt="imagen de añadir hilo"></a>
   @foreach ($threads as $thread)
    @include('_item')
   @endforeach
   {{ $threads->links('pagination::bootstrap-5') }}
@endsection

