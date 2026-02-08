<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'body', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createPost($userId, $title, $body)
    {
        return self::create([
            'user_id' => $userId,
            'title' => $title,
            'body' => $body,
        ]);
    }
}
