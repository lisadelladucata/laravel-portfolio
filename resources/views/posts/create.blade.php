@extends ("layouts.posts")

@section("title", "Aggiungi post")

@section ("content")
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="author">Autore:</label>
        <input type="text" id="author" name="author" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="category" >Categoria:</label>
        <input type="text" id="category" name="category" required>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="content">Contenuto:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
    <div>

    <button type="submit" class='btn btn-outline-primary my-3'>Crea post</button>
</form>

@endsection