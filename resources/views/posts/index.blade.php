@extends("layouts.posts")

@section("title", "tutti i post")

@section("content")
<ul>
    @foreach($posts as $post)
    <li>
        <h3>{{ $post->title }}</h3>
        <p><strong>Autore:</strong> {{ $post->author }}</p>
        <p><strong>Categoria:</strong> {{ $post->category }}</p>
        <a href="{{ route('posts.show', $post) }}">Visualizza</a>
    </li>
    @endforeach
</ul>
@endsection