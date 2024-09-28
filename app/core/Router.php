<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;

class Router
{
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleUserRoutes();
    }

    protected function routeSplit() {
        return explode("/", $_SERVER["REQUEST_URI"]);
    }

    protected function handleMainRoutes() {
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            MainController::homepage();
        }
    }

    protected function handleUserRoutes() {
        if ($this->urlArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            UserController::getUsers();
        }
    }
}