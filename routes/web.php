<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/demo', function () {
    $user = User::with('posts')->first();

    foreach ($user->posts as $post) {
        echo $post->title . '<br>';
    }
});

Route::get('/web/middleware-demo', function (Request $request) {
    $request->session()->put('hello_last_web_demo', now()->toDateTimeString());

    return response()->json([
        'group' => 'web',
        'session_value' => $request->session()->get('hello_last_web_demo'),
        'message' => 'Rota web usa estado de sessao/cookie.',
    ]);
})->middleware(['hello.entry', 'hello.exit']);

Route::get('/posts/{post}', [PostController::class, 'show'])->middleware(['hello.entry', 'hello.exit']);

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
