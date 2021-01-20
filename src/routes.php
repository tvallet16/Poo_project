<?php

use App\Core\Router\Route;

// GET, POST, PATCH, DELETE

Route::get('/', 'PageController@homepage');
Route::get('/recipes', 'RecipesController@index');
Route::get('/recipes/create', 'RecipesController@create');
Route::post('/recipes', 'RecipesController@store');
Route::get('/recipes/{id}', 'RecipesController@show');
Route::post('/log', 'LoginController@log');
Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'PageController@loginView');
Route::get('/signup', 'PageController@signupView');
Route::post('/signup', 'SignupController@createUser');






// Route::post()
// Route::patch()
// Route::delete()
