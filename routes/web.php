<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
