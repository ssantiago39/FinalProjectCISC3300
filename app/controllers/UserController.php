<?php

namespace app\controllers;
use app\models\User;

class UserController {
    public static function getUsers()
    {
        $userModel = new User();
        //if we are returning json we need to set the content type
        header("Content-Type: application/json");
        $users = $userModel->getAllUsers();
        echo json_encode($users);
        exit();
    }

    public function saveUser() {

    }

    public function viewUsers() {
        
    }

}