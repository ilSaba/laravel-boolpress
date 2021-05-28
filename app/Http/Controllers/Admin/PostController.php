<?php

namespace App\Http\Controllers\Admin;

use App\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->all();

        $post = new Post();
        $post->fill($data);


        $post->slug = $this->generateSlug($post->title);
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->all();

        if ($post->title != $data['title']) {
            $data['slug'] = $this->generateSlug($data['title']);
        }

        $post->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }

    private function generateSlug(string $title)
    {
        $slug = Str::slug($title, '-');
        $slug_base = $slug;
        $contatore = 1;

        $post_with_slug = Post::where('slug', '=', $slug)->first();
        while($post_with_slug) {
            $slug = $slug_base . '-' . $contatore;
            $contatore++;

            $post_with_slug = Post::where('slug', '=', $slug)->first();
        }

        return $slug;
    }
}