<?php

use App\Core\Router;

require dirname(__DIR__) . "/vendor/autoload.php";

require dirname(__DIR__) . "/routes/web.php";
require dirname(__DIR__) . "/helpers.php";

\App\Core\Application::run();