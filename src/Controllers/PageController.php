<?php

namespace App\Controllers;

use App\Core\View;
use App\Repositories\RecipeRepository;

class PageController
{
    public function homepage()
    {
        $recipes = (new RecipeRepository())->findLast5();
        new View('homepage', compact('recipes'));
    }
}
