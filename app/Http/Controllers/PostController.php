<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post)
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

        return view('post', [
            'post' => $post,
            'recents' => $recents_data,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function addComment(Post $post, Request $request)
    {
        $validated = $request->validate([
            'the_comment' => 'required|min:10|max:300',
        ]);

        $validated['user_id'] = auth()->id();

        $comment = $post->comments()->create($validated);

        return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)
            ->with('success', 'Comment has been added.');
    }
}
