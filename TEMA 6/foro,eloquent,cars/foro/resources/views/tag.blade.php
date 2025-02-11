@extends('layouts.app')

@section('title', $tag->nombre)

@section('description', 'Los mejores hilos sobre '. $tag->nombre)

@section('content')
@foreach ($threads as $thread)
    @include('_item')
@endforeach
@endsection