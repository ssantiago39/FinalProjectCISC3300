<?php

namespace app\controllers;

class MainController {

    public static function homepage() {
        //remember to route relative to index.php
        include './assets/views/main/homepage.php';
        exit();
    }

    public static function notFound() {
    }

}