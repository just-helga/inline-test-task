<?php

namespace App\Application\Database;

class Model extends Connect
{
    /**
     * @var string
     */
    protected string $table;
    /**
     * @var array
     */
    protected array $fields = [];
    /**
     * @var array
     */
    protected array $collection = [];

    /**
     * @var int
     */
    protected int $id;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id) :void
    {
        $this->id = $id;
    }

    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $columns = implode(', ', array_map(function ($field) {
            return "`$field`";
        }, $this->fields));

        $binds = implode(', ', array_map(function ($field) {
            return ":$field";
        }, $this->fields));

        $q = "INSERT IGNORE INTO `$this->table` ($columns) VALUES ($binds)";
        $stmt = $this->getConnection()->prepare($q);

        foreach ($this->fields as $field) {
            $params[$field] = $this->$field ?? null;
        }

        $stmt->execute($params);
    }
}