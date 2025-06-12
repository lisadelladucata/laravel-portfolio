@extends("layouts.posts")

@section("title", $post->title)

@section("content")
<div class="container my-4">

    <div class="d-flex gap-3 mb-4"> 
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning text-white">
            Modifica
        </a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Elimina
        </button>
    </div>

    <p class="text-muted"><strong>Autore:</strong> {{ $post->author }}</p> 
    <p class="text-muted"><strong>Categoria:</strong> {{ $post->category->name }}</p>

    <hr class="my-4"> 

    <div class="lead">
        <p>{{ $post->content }}</p>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Torna ai Post</a>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare il post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">
                Elimina definitvamente
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
@endsection