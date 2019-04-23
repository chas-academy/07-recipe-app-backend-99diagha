<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_list_id', 'yummly_id', 'name', 'source', 'image'
    ];
}
