<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hq extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'autor_name', 'class_name', 'description', 'images_path'];
}
