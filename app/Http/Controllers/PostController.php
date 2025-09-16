<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])->latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'tags', 'user', 'comments'])->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
}
