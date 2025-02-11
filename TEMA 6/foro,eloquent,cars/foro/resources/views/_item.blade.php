<div class="borde">
    
    <h2 class='tgrande'>{{ $thread->titulo }}</h2>
    <div>
        
    Categoría:
        <a href="{{route('page.category',$thread->category->slug)}}" class="separado">
            {{ $thread->category->nombre }}
        </a>
        <br>
        Etiquetas:
        <span>
            @foreach($thread->tags as $tag)
                <a class="separado" href="{{route('page.tag',$tag->slug)}}">
                    {{ $tag->nombre}}
                </a>
            @endforeach
        </span>
        <br>
        Usuario:
        <span>
            <a class="separado" href="{{route ('page.user', $thread->user->id)}}">
                {{ $thread->user->name }}
            </a>
        </span>
        <p>
            {{$thread->comments->count()}} comentarios
            <span><a href="{{route ('page.thread', $thread->slug)}}">Ver &rarr;</a></span>
        </p>
    </div>
</div>