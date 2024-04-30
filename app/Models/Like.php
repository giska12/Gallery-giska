<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'image_id',
        'user'
    ];
}
