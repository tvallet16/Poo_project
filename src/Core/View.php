<?php

namespace App\Core;

class View
{
    // Avant PHP8
    private string $view;
    private array $data = [];
    
    public function __construct(string $view, array $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    // Depuis PHP8
    // public function __construct(
    //     private string $view,
    //     private array $data = [],
    // ) {
    //     if (!file_exists(__DIR__.'/../views/'.$this->view.'.php')) {
    //         throw new \Exception(sprintf('View "%s" doesn\'t exist.', $this->view));
    //     }
    // }

    public function __destruct() {
        extract($this->data);
        require_once __DIR__.'/../views/'.$this->view.'.php';
    }
}
