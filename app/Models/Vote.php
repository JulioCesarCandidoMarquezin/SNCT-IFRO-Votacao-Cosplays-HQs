<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'class_name', 'item_type', 'item_id'];

    public function item()
    {
        return $this->morphTo('item', 'item_type', 'item_id');
    }
}
