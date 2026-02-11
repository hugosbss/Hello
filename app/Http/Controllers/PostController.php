<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Route Model Binding: Laravel injects the Post directly from {post}.
     */
    public function show(Post $post): JsonResponse
    {
        $post->load(['user', 'comments', 'tags']);

        return response()->json($post);
    }
}
