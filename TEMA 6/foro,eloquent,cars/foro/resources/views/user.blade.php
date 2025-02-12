@extends('layouts.app')

@section('title', $user->name)

@section('content')
    @foreach ($threads as $thread)
        @include('_item')
    @endforeach
@endsection