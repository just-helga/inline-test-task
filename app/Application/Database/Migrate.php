<?php

namespace App\Application\Database;

use App\Application\Database\Connect;
use Exception;

class Migrate
{
    /**
     * @var \App\Database\Connect
     */
    private static Connect $connect;

    /**
     * @param \App\Database\Connect $connect
     * @return void
     */
    public static function init(Connect $connect): void
    {
        self::$connect = $connect;
    }

    /**
     * @param string $fileName
     * @return void
     * @throws Exception
     */
    public static function executeFile(string $fileName) :void
    {
        $pdo = self::$connect->getConnection();
        $filePath = __DIR__ . '/../../../sql/' . $fileName;

        if (!file_exists($filePath)) {
            throw new Exception("SQL-файл $fileName не найден по адресу $filePath.");
        }

        $sql = file_get_contents($filePath);
        if (!$sql) {
            throw new Exception("Не удалось прочитать SQL-файл $fileName.");
        }

        $pdo->exec($sql);

//        echo "3. Таблицы успешно созданы. <br>";
    }
}