<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/middleware-demo', function (Request $request) {
    return response()->json([
        'group' => 'api',
        'stateful_session' => false,
        'header_client' => $request->header('X-Hello-Client'),
        'message' => 'Rota api e stateless, orientada a JSON/token.',
    ]);
})->middleware(['hello.entry', 'hello.exit']);

Route::get('/posts/{post}', [PostController::class, 'show'])->middleware(['hello.entry', 'hello.exit']);
