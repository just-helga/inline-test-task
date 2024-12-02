<?php

namespace App\Application\Data;

use PDO;
use Exception;

class DataLoader
{

    public static function fetch(string $url): array
    {
        $json = file_get_contents($url);
        if (!$json) {
            throw new Exception("Не удалось загрузить данные с URL: $url");
        }
        return json_decode($json, true);
    }
}