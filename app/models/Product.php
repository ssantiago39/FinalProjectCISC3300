<?php

namespace app\models;

use app\models\Model;

class Product extends Model {

    public function getAllProductsByFlavor($flavor) {
        $query = "SELECT * FROM IceCream WHERE flavor LIKE :flavor";
        return $this->query($query, [
            'flavor' => '%' . $flavor . '%',
        ]);
    }

    public function getAllProducts() {
        $query = "SELECT * FROM IceCream";
        return $this->query($query);
    }
 
    public function getProductById($id) {
        $query = "SELECT * FROM IceCream WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveProduct($inputData) {
        $query = "INSERT INTO IceCream (flavor, `price$`) VALUES (:flavor, :price);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData) {
        $query = "UPDATE IceCream SET flavor = :flavor, `price$` = :price WHERE id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData) {
        $query = "DELETE FROM IceCream WHERE id = :id";
        return $this->query($query, $inputData);
    }
}
