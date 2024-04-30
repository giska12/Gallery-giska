<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_id',
        "user_id"
    ];

    protected $table = 'image_gallery';

    public function images()
    {
        return $this->hasMany(Image::class, 'id', 'image_id');
    }
}
