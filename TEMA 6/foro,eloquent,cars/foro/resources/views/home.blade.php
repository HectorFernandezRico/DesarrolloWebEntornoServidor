@extends('layouts.app')

@section('title', 'Home')

@section('description', 'Bienvenido al foro de comida saludable y ecologica')

@section('content')

{{ $threads->links('pagination::bootstrap-5') }}
@foreach($threads as $thread)
    @include('_item')
@endforeach
{{ $threads->links('pagination::bootstrap-5') }}

@endsection