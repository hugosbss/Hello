<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('posts')->first();

        foreach ($user->posts as $post) {
            echo $post->title . '<br>';
        }
    }
}
