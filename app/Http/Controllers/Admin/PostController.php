<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.create", compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();

        $newPost = new Post();

        $newPost -> title = $data['title'];
        $newPost -> author = $data['author'];
        $newPost -> category_id = $data['category_id'];
        $newPost -> content = $data['content'];
        
        $newPost->save();
        
        if($request->has('tags')){
            $newPost->tags()->sync($data['tags']);

        }else{
            $newPost->tags()->detach();
        }
        
        return redirect()->route('posts.show', $newPost);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("posts.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request -> all();

        $post -> title = $data['title'];
        $post -> author = $data['author'];
        $post -> category_id = $data['category_id'];
        $post -> content = $data['content'];

        $post->update();

        if($request->has('tags')){
            $post->tags()->sync($data['tags']);

        }else{
            $post->tags()->detach();
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->tags) { // Controlla se la relazione tags è definita
            $post->tags()->detach();
        }

        $post ->delete();
        return redirect()->route('posts.index');
    }
}
