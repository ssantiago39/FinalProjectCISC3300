<?php

//require our files, remember should be relative to index.php
require '../app/core/Router.php';
require '../app/models/Model.php';
require '../app/controllers/MainController.php';
require '../app/controllers/UserController.php';
require '../app/models/User.php';


//set up env variables
$env = parse_ini_file('../.env');

if($_SERVER['SERVER_NAME'] == 'localhost') {
    /** database config **/
    define('DBNAME', $env['DBNAME']);
    define('DBHOST', $env['DBHOST']);
    define('DBUSER', $env['DBUSER']);
    define('DBPASS', $env['DBPASS']);
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost:8888/');

} else {
    /** database config **/
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
}

//set up other configs
define('DEBUG', true);