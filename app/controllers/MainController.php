<?php

namespace app\controllers;

class MainController extends Controller {

    public function homepage() {
        $this->returnView('./public/assets/views/homepage.html');
    }

    public function notFound() {
        // Optional: add a 404 page later if you want
    }
}
