<?php

namespace App\Core\Router;

class Request
{
    private string $uri;
    private string $method;
    private ?array $body;

    public function __construct()
    {
        $this->uri = '/'.trim($_SERVER['REQUEST_URI'], '/');
        $this->method = $this->findRequestMethod();
        $this->body = $this->findRequestBody();
    }

    private function findRequestMethod(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['_method'])) {
                $method = strtoupper($_POST['_method']);
                if (in_array($method, ['PATCH', 'DELETE'])) {
                    return $method;
                }
            }
        }

        return $_SERVER['REQUEST_METHOD'];
    }

    private function findRequestBody(): ?array
    {
        if (empty($_POST)) {
            return json_decode(file_get_contents('php://input'), true);
        }

        return $_POST;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getBody(): ?array
    {
        return $this->body;
    }
}
