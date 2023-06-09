<?php

use App\Controllers\ContactController;
use App\Core\Router;
use App\Controllers\HomeController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/contact', [ContactController::class, 'index']);
Router::get('/controller-not-exists', [NotExistsController::class, 'show']);
Router::get('/method-not-exists', [ContactController::class, 'show']);
