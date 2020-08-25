<?php

require 'vendor/autoload.php';
require 'routes.php';
require 'config.php';

use app\classes\Uri;
use app\classes\Route;
use app\classes\Layout;

$layout = new Layout;

require Route::route($routes, Uri::getUri());

require $layout->master('template/layout');