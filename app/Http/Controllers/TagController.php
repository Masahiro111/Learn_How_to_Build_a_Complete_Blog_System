<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
    }

    public function show(Tag $tag)
    {
        $recents_data = Post::query()
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::query()
            ->withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->latest()
            ->take(10)
            ->get();

        $tags = Tag::query()
            ->take(50)
            ->get();

        return view('tags.show', [
            'posts' => $tag->posts()->paginate(10),
            'categories' => $categories,
            'tag' => $tag,
            'tags' => $tags,
            'recents' => $recents_data,
        ]);
    }
}
