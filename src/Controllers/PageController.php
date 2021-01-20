<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Recipe;

class PageController
{
    public function homepage()
    {
        $recipes = Recipe::last(3);
        new View('homepage', compact('recipes'));
    }
    public function loginView()
    {
        new View('login');
    }
    public function signupView()
    {
        new View('signup');
    }
}
