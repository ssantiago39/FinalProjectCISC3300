<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\ProductController;

class Router {
    public $uriArray;

    public function __construct() {
    
        $this->uriArray = $this->routeSplit();
    
        $this->handleMainRoutes();
        $this->handleProductRoutes();
    }
    

    protected function routeSplit() {
        return isset($_GET['url']) ? explode("/", trim($_GET['url'], "/")) : [];
    }
    

    protected function handleMainRoutes() {
        if (!isset($this->uriArray[0]) || $this->uriArray[0] === '') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleProductRoutes() {
        $controller = new ProductController();

        if ($this->uriArray[0] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->showAllView();
        }

        if ($this->uriArray[0] === 'add-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->createView();
        
        }

        if ($this->uriArray[0] === 'update-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->editView();
        }

        if ($this->uriArray[0] === 'delete-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->deleteView();
        }

        if ($this->uriArray[0] === 'api' && $this->uriArray[1] === 'products') {
            $id = $this->uriArray[2] ?? null;

            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    if ($id) {
                        $controller->getProductByID($id);
                    } else {
                        $controller->getAllProducts();
                    }
                    break;

                case 'POST':
                    $controller->saveProduct();
                    break;

                case 'PUT':
                    $controller->updateProduct($id);
                    break;

                case 'DELETE':
                    $controller->deleteProduct($id);
                    break;
            }
        }
    }
}

