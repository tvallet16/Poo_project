<?php

require_once('autoload.php');

// Route::get('/recipes/{id}', 'Controller@action')

// /recipes/show/1/2/3/
$uri = trim($_SERVER['REQUEST_URI'], '/');
// recipes/show/1/2/3
$uri = explode('/', $uri);

// Pages Statiques du PageController
if (count($uri) === 1) {
    $controller = new App\Controllers\PageController();

    if (empty($uri[0])) {
        $controller->homepage();

        return;
    }

    $action = $uri[0];
    if (method_exists($controller, $action)) {
        $controller->$action();

        return;
    }

    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');

    return;
}


// ['recipes', 'show', '1', '2', '3']
[$controller, $action] = $uri;
$params = array_slice($uri, 2);
// $controller => 'recipes'
// $action => 'show'
// $params => ['1', '2', '3']

$controller = 'App\\Controllers\\'.ucfirst($controller).'Controller';
// $controller => App\Controllers\RecipesController
if (class_exists($controller)) {
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        $controller->$action(...$params);

        return;
    }
}

header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
