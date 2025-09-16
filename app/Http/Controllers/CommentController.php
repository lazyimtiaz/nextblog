<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email',
            'content' => 'required|string',
        ]);

        $post->comments()->create($request->only('author_name', 'author_email', 'content'));

        return back()->with('success', 'Comment added successfully!');
    }
}
