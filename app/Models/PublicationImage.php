<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationImage extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id', 'image_path'];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
