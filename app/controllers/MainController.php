<?php

namespace app\controllers;

class MainController {

    public static function homepage() {
        //remember to route relative to index.php
        //require page and exit to return an HTML page
        require './assets/views/main/homepage.html';
        exit();
    }

    public static function notFound() {
    }

}