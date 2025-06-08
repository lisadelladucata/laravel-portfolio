@extends("layouts.posts")

@section("title", $post->title)

@section("content")
<p><strong>Autore:</strong> {{ $post->author }}</p>
<p><strong>Categoria:</strong> {{ $post->category }}</p>
<p>{{ $post->content }}</p>
@endsection