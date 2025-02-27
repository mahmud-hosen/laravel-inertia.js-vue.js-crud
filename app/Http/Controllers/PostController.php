<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {        
        return Inertia::render('Edit', ['post' => Post::find($id) ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post, $id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    public function webhook(Request $request)
    {
        Log::channel('custom')->info('Webhook request received', $request->all());

    }

    
}
