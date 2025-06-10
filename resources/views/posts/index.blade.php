@extends("layouts.posts")

@section("title", "Tutti i post")

@section("content")
<div class="container my-4">
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            Aggiungi un nuovo post
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($posts as $post)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5> 
                    <p class="card-text text-muted mb-2"><strong>Autore:</strong> {{ $post->author }}</p>
                    <p class="card-text text-muted mb-3"><strong>Categoria:</strong> {{ $post->category }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm">
                        Visualizza Dettagli
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
