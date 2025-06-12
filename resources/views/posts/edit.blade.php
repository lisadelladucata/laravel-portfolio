@extends ("layouts.posts")

@section("title", "Modifica il post")

@section ("content")
<form action="{{ route('posts.update', $post ) }}" method="POST">
    @csrf
    @method("PUT")
    
    <div class="form-control mb-3 d-flex flex-column">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" value="{{$post->title}}">
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="author">Autore:</label>
        <input type="text" id="author" name="author" value="{{$post->author}}">
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="category" >Categoria:</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-control mb-3 d-flex flex-column">
        <label for="content">Contenuto:</label>
        <textarea id="content" name="content" rows="5" >{{$post->content}}</textarea>
    <div>

    <button type="submit" class='btn btn-outline-primary my-3'>Modifica</button>
</form>

@endsection