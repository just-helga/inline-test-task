<?php

namespace App\Application\Config;

class Config
{
    /**
     * @var array|null
     */
    private static array|null $config = [];

    /**
     * @param $path
     * @return mixed
     * @throws \Exception
     */
    public static function load($path)
    {
        if (!isset(self::$config[$path])) {
            $filePath = __DIR__ . '/../../../config/' . $path . '.php';
            if (file_exists($filePath)) {
                self::$config[$path] = require $filePath;
            } else {
                throw new \Exception("Конфигурационный файл $path не найден.");
            }
        }
        return self::$config[$path];
    }

    /**
     * @param $path
     * @param $key
     * @return mixed|null
     * @throws \Exception
     */
    public static function get($path, $key = null)
    {
        $config = self::load($path);

        if ($key === null) {
            return $config;
        }

        return $config[$key] ?? null;
    }
}