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
        <label for="category_id" >Categoria:</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-control mb-3 d-flex flex-wrap">
        <div class="mx-3">
            @foreach($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                <label for="tag-{{$tag->id}}">{{$tag->name}}</label>
            @endforeach
        </div>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="content">Contenuto:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
    <div>

    <button type="submit" class='btn btn-outline-primary my-3'>Crea post</button>
</form>

@endsection