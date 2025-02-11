@extends('layouts.app')

@section('title', $category->nombre)

@section('description', 'Los mejores hilos sobre '. $category->nombre)

@section('content')
    @foreach($threads as $thread)
    @include('_item')
    @endforeach
@endsection