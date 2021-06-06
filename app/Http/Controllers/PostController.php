<?php

namespace App\Http\Controllers;

use App\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('guests.posts.index', compact('posts'));
    }
    public function show(string $slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('guests.posts.show', compact('post'));
    }


}
