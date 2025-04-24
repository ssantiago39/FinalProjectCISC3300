<?php

require __DIR__ . '/Router.php';
require __DIR__ . '/../controllers/Controller.php';
require __DIR__ . '/../controllers/MainController.php';
require __DIR__ . '/../controllers/ProductController.php';
require __DIR__ . '/../models/Model.php';
require __DIR__ . '/../models/Product.php';

$env = parse_ini_file(__DIR__ . '/../../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
