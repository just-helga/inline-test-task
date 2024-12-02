<?php

namespace App\Application\Database;

use PDO;
use App\Application\Config\Config;


class Connect
{
    /**
     * @var PDO
     */
    public PDO $pdo;
    /**
     * @var array|null
     */
    private array|null $config;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->config = Config::get('database');
        $this->connecting();

        if (!$this->checkTheExistenceOfTheDatabase($this->config['dbname'])) {
            $this->createDatabase($this->config['dbname']);
        }

        $this->connecting($this->config['dbname']);
//        echo "2. Подключение к базе данных `{$this->config['dbname']}` успешно установлено. <br>";
    }

    /**
     * @param string|null $dbname
     * @return void
     */
    private function connecting(string|null $dbname = null) :void
    {
        $this->pdo = new PDO("{$this->config['driver']}:host={$this->config['host']};port={$this->config['port']};dbname={$dbname}",
            $this->config['user'],
            $this->config['password']
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public function getConnection() :PDO
    {
        return $this->pdo;
    }

    /**
     * @param string $db_name
     * @return bool
     */
    private function checkTheExistenceOfTheDatabase(string $db_name) :bool
    {
        $q = $this->pdo->prepare("SELECT COUNT(*) FROM information_schema.schemata WHERE schema_name = :db_name");
        $q->execute(['db_name' => $db_name]);

        if ($q->fetchColumn() == 0) {
            return false;
        } else {
//            echo "1. База данных `$db_name` уже существует. <br>";
            return true;
        }
    }

    /**
     * @param string $db_name
     * @return void
     */
    private function createDatabase(string $db_name) :void
    {
        $this->pdo->exec("CREATE DATABASE `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
//        echo "1. База данных `$db_name` успешно создана. <br>";
    }
}