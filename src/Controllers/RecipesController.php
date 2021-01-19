<?php

namespace App\Controllers;

use App\Models\Recipe;
use App\Core\Router\Request;
use App\Core\View;

class RecipesController
{
    public function index()
    {
        $recipes = Recipe::all();
        new View('recipes/index', compact('recipes'));
    }

    public function create()
    {
        new View('recipes/create');
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->title = $request->getBody()['title'];
        $recipe->content = $request->getBody()['content'];

        if ($recipe->save()) {
            header('Location: /recipes');
        }
    }

    public function show(Request $request, int $id)
    {
        $recipe = Recipe::find($id);
        new View('recipes/show', compact('recipe')); // ['recipe' => $recipe]
    }
    
    
}
