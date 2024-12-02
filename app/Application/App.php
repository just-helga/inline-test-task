<?php

namespace App\Application;

use App\Application\Database\Connect;
use App\Application\Router\Route;
use App\Application\Router\Router;
use App\Application\Database\Migrate;
use App\Application\Data\DataLoader;
use App\Controllers\PostController;
use Exception;

class App
{
    public function start() :void
    {
        try {
            $this->handle();
        } catch (Exception $exception) {
            echo "Ошибка: " . $exception->getMessage();
        }
    }

    private function handle() {
        $connect = new Connect();
        $connect->getConnection();

        Migrate::init($connect);
        Migrate::executeFile('create_tables.sql');

        require_once __DIR__ . '/../../routes/routes.php';
        $router = new Router();
        $router->handle(Route::list());

//        dd(Route::list());

    }
}