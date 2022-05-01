<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        $posts_data = $posts
            ->withCount('comments')
            ->paginate(5);

        $recents_data = $posts
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

        return view('home', [
            'posts' => $posts_data,
            'recents' => $recents_data,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
