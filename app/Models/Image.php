<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        "user_id"
    ];

    protected $table = 'image';

    public function gallery()
    {
        return $this->belongsTo(ImageGallery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'image_id', 'id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'image_id', 'id');
    }

}
