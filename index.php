<?php

session_start();

require 'vendor/autoload.php';
require 'routes.php';
require 'app/helpers/functions.php';

use app\classes\Uri;
use app\classes\Route;
use app\classes\Layout;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$layout = new Layout;

require Route::route($routes, Uri::getUri());

require $layout->master('template/layout');