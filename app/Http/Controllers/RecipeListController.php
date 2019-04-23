<?php

namespace App\Http\Controllers;

use App\Recipe;
use Validator;
use Illuminate\Http\Request;

class RecipeListController extends Controller
{
    public function index()
    {
        $recipe_list = auth()->user()->recipe_list->recipes;
        return response()->json($recipe_list);
    }

    public function store(Request $request)
    {
        $rules = ['id' => 'unique_with:recipes,recipe_list_id,id=yummly_id'];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            Recipe::where('yummly_id', $request->id)->delete();
        } else {
            Recipe::create([
                'recipe_list_id' => auth()->user()->recipe_list->id,
                'yummly_id' => $request->id,
                'name' => $request->name,
                'source' => $request->source['displayName'],
                'image' => $request->imageUrl]);
        }
    }
}
