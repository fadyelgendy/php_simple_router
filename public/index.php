<?php

use App\Core\Router;

require dirname(__DIR__) . "/vendor/autoload.php";

require dirname(__DIR__) . "/routes/web.php";
require dirname(__DIR__) . "/helpers.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

Router::route($uri, $method);