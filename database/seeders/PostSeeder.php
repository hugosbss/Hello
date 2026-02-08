<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Post::create([
            'user_id' => $user->id,
            'title' => 'Post de Apresentação',
            'content' => 'Este post foi criado usando Eloquent ORM.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'title' => 'ORM na Prática',
            'content' => 'O Laravel transforma código PHP em SQL automaticamente.'
        ]);
    }
}
