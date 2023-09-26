<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hq extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author_name', 'class_name', 'tags', 'description', 'images_path'];

    protected $casts = [
        'tags' => 'json',  
    ];
}
