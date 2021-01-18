<?php

namespace App\Controllers;

use App\Models\Recipe;
use App\Repositories\RecipeRepository;
use App\Core\Router\Request;
use App\Core\View;

class RecipesController
{
    public function index()
    {
        $recipes = (new RecipeRepository())->findAll();
        new View('recipes/index', compact('recipes'));
    }

    public function create()
    {
        new View('recipes/create');
    }

    public function store(Request $request)
    {
        $repository = new RecipeRepository();
        $recipe = new Recipe();
        $recipe->title = $request->getBody()['title'];
        $recipe->content = $request->getBody()['content'];

        if ($repository->create($recipe)) {
            header('Location: /recipes');
        }
    }

    public function show(Request $request, int $id)
    {
        $recipe = (new RecipeRepository())->find($id);
        new View('recipes/show', compact('recipe')); // ['recipe' => $recipe]
    }
    
    
}
