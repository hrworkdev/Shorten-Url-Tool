<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedUrl extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'original_url',
        'shortened_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
