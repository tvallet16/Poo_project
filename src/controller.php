<?php

require_once (__DIR__.'/model.php');

function homepage()
{
    $request = getLast5Recipes();
    require_once (__DIR__.'/views/homepage.php');
}

function showRecipe(int $id)
{
    $recipe = getRecipe($id);
    require_once (__DIR__.'/views/recipe.php');
}
