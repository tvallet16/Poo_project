<?php

namespace App\Core\Router;

class Router
{
    public const SUPPORTED_METHODS = ['GET', 'POST', 'PATCH', 'DELETE'];

    private static ?self $_instance = null;

    private array $routes = [];

    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public static function getInstance(): self
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function addRoute(
        string $method,
        string $pattern,
        string $dispatcher
    ) {
        $pattern = '/'.trim($pattern, '/');
        $this->routes[$method][] = compact('pattern', 'dispatcher');
        // Route::get('/recipes/{id}', 'RecipesController@show');
        // [
        //     "GET" => [
        //         0 => [
        //             'pattern' => '/recipes/{id}',
        //             'dispatcher' => 'RecipesController@show'
        //         ],
        //          1 => [...],
        //     ],
        // ]
    }

    private function run(): void
    {
        if (array_key_exists($this->request->getMethod(), $this->routes)) {
            $this->handle($this->routes[$this->request->getMethod()]);

            return;
        }

        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
    }

    private function handle(array $routes): void
    {
        $uri = $this->request->getUri();

        foreach ($routes as $route) {
            // /recipes/{id}
            $route['pattern'] = preg_replace('#/{(.*?)}#', '/(.*?)',
                $route['pattern']);
            // /recipes/(id)
            // $regex = '#^'.$route['pattern'].'$#';
            $regex = sprintf('#^%s$#', $route['pattern']);
            if (preg_match_all($regex, $uri, $matches, PREG_SET_ORDER)) {
                $params = array_slice($matches[0], 1);
                array_unshift($params, $this->request);

                $this->invoke($route['dispatcher'], $params);

                return;
            }
        }
    }

    private function invoke(string $dispatcher, array $params): void
    {
        [$controller, $action] = explode('@', $dispatcher);
        $controller = 'App\\Controllers\\'.$controller;

        if (class_exists($controller) && method_exists($controller, $action)) {
            try {
                $reflectedMethod = new \ReflectionMethod($controller, $action);
                if ($reflectedMethod->isPublic()
                    && ! $reflectedMethod->isAbstract()
                ) {
                    $controller = new $controller();
                    $controller->$action(...$params);
                }
            } catch (\ReflectionException $e) {
                die("Reflection Error : ".$e->getMessage());
            }
        }
    }

    public function __destruct()
    {
        self::getInstance()->run();
    }
}
