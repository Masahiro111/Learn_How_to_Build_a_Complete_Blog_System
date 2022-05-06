<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    }

    public function show(Category $category)
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

        return view('categories.show', [
            'posts' => $category->posts()->paginate(10),
            'category' => $category,
            'categories' => $categories,
            'tags' => $tags,
            'recents' => $recents_data,
        ]);
    }
}
