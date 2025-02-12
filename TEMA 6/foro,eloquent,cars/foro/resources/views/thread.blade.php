@extends('layouts.app')

@section('title', $thread->titulo)

@section('description', $thread->category->nombre)

@section('content')
    <div class="borde">
        {{ $thread->body }}
    </div>
    <div>
        Etiquetas:
        <span>
            @foreach($thread->tags as $tag)
                <a href="{{route('page.tag', $tag->slug)}}" class="separado">
                    {{ $tag->nombre}}
                </a>
            @endforeach
        </span>
    </div>
    <br>
    <div>
        <h2>
            {{$thread->comments->count()}} comentarios
            <span>
                <a href="{{route('page.thread', $thread->slug)}}">
                    Ver &rarr;
                </a>
            </span>
        </h2>
        @foreach($thread->comments as $comment)
            <!-- AQUI SE OBTIENE LA INFORMACIÓN DE UN COMENTARIO -->
            <p><b>Autor:</b> {{$comment->user->name}}</p>
            <p>{{$comment->body}}</p>
        @endforeach
    </div>
@endsection
