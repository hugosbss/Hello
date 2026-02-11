<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacySetting extends Model
{
    protected $fillable = [
        'profile_id',
        'visibility',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
