<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function validateProduct($inputData) {
        $errors = [];
        $flavor = $inputData['flavor'];
        $price = $inputData['price'];

        if ($flavor) {
            $flavor = htmlspecialchars($flavor, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($flavor) < 2) {
                $errors['flavorShort'] = 'Flavor name is too short';
            }
        } else {
            $errors['requiredFlavor'] = 'Flavor name is required';
        }

        if ($price) {
            if (!is_numeric($price) || $price <= 0) {
                $errors['invalidPrice'] = 'Price must be a positive number';
            }
        } else {
            $errors['requiredPrice'] = 'Price is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'flavor' => $flavor,
            'price' => $price,
        ];
    }

    public function getAllProducts() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
    
        header("Content-Type: application/json");
        echo json_encode($products);
        exit();
    }
    

    public function getProductByID($id) {
        $productModel = new Product();
        header("Content-Type: application/json");
        $product = $productModel->getProductById($id);

        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'flavor' => $_POST['flavor'] ?? null,
            'price' => $_POST['price'] ?? null,
        ];

        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct([
            'flavor' => $productData['flavor'],
            'price' => $productData['price'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'flavor' => $_PUT['flavor'] ?? null,
            'price' => $_PUT['price'] ?? null,
        ];

        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->updateProduct([
            'id' => $id,
            'flavor' => $productData['flavor'],
            'price' => $productData['price'],
        ]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(['id' => $id]);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function showAllView() {
        $this->returnView('public/assets/views/products/index.html');
    }

    public function createView() {
        $this->returnView('public/assets/views/products/add.html');
    }
    
    
    
    

    public function editView() {
        $this->returnView('public/assets/views/products/update.html');
    }

    public function deleteView() {
        $this->returnView('public/assets/views/products/delete.html');
    }
}
