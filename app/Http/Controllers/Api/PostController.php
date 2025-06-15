<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::with('category')->get();

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);                
    }

    public function show(Post $post){

        $post->load('category', 'tags');

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }
}
