<?php

use App\Application\Router\Route;
use App\Controllers\PageController;
use App\Controllers\PostController;

Route::get('/', PageController::class, 'home');