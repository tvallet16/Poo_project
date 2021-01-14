<?php

use App\Core\Router\Route;

// GET, POST, PATCH, DELETE

Route::get('/', 'PageController@homepage');
Route::get('/recipes/{id}', 'RecipesController@show');

// Route::post()
// Route::patch()
// Route::delete()
