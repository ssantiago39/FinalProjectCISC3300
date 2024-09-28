<?php

namespace app\controllers;

class MainController {

    public static function homepage() {
        //remember to route relative to index.php
        //use include and exit to return an HTML page
        include './assets/views/main/homepage.html';
        exit();
    }

    public static function notFound() {
    }

}