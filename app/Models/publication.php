<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'reaction',
        'views',
        'img'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function images()
    {
        return $this->hasMany(PublicationImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
