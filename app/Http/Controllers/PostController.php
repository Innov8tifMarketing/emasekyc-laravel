<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->latest('published_at');

        if ($request->has('tag')) {
            $query->whereHas('tags', fn ($q) => $q->where('slug', $request->tag));
        }

        $posts = $query->paginate(12)->withQueryString();
        $tags = Tag::orderBy('name')->get();
        $activeTag = $request->tag;

        return view('pages.knowledge-hub.index', compact('posts', 'tags', 'activeTag'));
    }

    public function show(Post $post)
    {
        $post->load('tags');

        return view('pages.knowledge-hub.show', compact('post'));
    }
}
