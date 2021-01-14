<?php

namespace App\Controllers;

use App\Repositories\RecipeRepository;
use App\Core\Router\Request;
use App\Core\View;

class RecipesController
{
    public function index(Request $request)
    {
        $recipes = (new RecipeRepository())->findAll();
        new View('recipes/index', compact('recipes'));
    }

    public function show(Request $request, int $id)
    {
        $recipe = (new RecipeRepository())->find($id);
        new View('recipes/show', compact('recipe')); // ['recipe' => $recipe]
    }
}
