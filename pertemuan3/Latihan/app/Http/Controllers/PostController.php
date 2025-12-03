<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('Posts', compact('posts'));
    }

    public function show(post $post)
    {
        // menggunakan with() untuk mengatasi n+1 problem
        $post->load('author', 'category');
        return view('PostDetail', compact('post'));
    }

}
