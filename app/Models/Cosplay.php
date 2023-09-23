<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosplay extends Model
{
    use HasFactory;

    protected $fillable = [
        'autor_name',
        'original_pinture_name',
        'class_name',
        'description',
        'image_path',
    ];
}
