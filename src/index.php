<?php

require_once (__DIR__.'/controller.php');

$uri = trim($_SERVER['REQUEST_URI'], '/');
$route = explode('/', $uri);

if ($route[0] === 'recipes' && isset($route[1]) && $route[1] > 0) {
    showRecipe($route[1]);
} else {
    homepage();
}
