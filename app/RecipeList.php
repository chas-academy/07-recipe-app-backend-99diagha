<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
