<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post): JsonResponse
    {
        $this->authorize('view', $post);
        $post->load(['user', 'comments.user', 'tags'])->loadCount('likes');

        return response()->json($post);
    }

    public function store(Request $request): JsonResponse
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        $post->load('user')->loadCount('likes');

        return response()->json($post, 201);
    }

    public function comments(Post $post): JsonResponse
    {
        $this->authorize('view', $post);
        $comments = $post->comments()->with('user')->get();

        return response()->json($comments);
    }

    public function commentPost(Request $request, Post $post): JsonResponse
    {
        $this->authorize('view', $post);

        $validated = $request->validate([
            'body' => ['required', 'string'],
        ]);

        $comment = new Comment([
            'user_id' => Auth::id(),
            'body' => $validated['body'],
        ]);

        $post->comments()->save($comment);
        $comment->load('user');

        return response()->json($comment, 201);
    }

    public function likes(Post $post): JsonResponse
    {
        $this->authorize('view', $post);
        $likes = $post->likes()->with('user')->get();

        return response()->json($likes);
    }

    public function toggleLike(Post $post): JsonResponse
    {
        $this->authorize('view', $post);
        $userId = Auth::id();

        $like = $post->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            return response()->json([
                'liked' => false,
                'likes_count' => $post->likes()->count(),
            ]);
        } else {
            $post->likes()->create(['user_id' => $userId]);
            return response()->json([
                'liked' => true,
                'likes_count' => $post->likes()->count(),
            ]);
        }
    }
}