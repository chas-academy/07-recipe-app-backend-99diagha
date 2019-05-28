<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
