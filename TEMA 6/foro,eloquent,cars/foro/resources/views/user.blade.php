@extends('layouts.app')

@section('title', $user->name)

@section('description', 'Los mejores hilos sobre '. $user->name)

@section('content')
    @foreach($threads as $thread)
    @include('_item')
    @endforeach
@endsection