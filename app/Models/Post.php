<?php

namespace App\Models;

use App\Application\Database\Model;

class Post extends Model
{
    /**
     * @var string
     */
    protected string $table = 'posts';
    /**
     * @var array|string[]
     */
    protected array $fields = ['id', 'userId', 'title', 'body'];

    /**
     * @var int
     */
    protected int $userId;
    /**
     * @var string
     */
    protected string $title;
    /**
     * @var string
     */
    protected string $body;

    /**
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId) :void
    {
        $this->userId = $userId;
    }

    /**
     * @param int $title
     * @return void
     */
    public function setTitle(string $title) :void
    {
        $this->title = $title;
    }

    /**
     * @param int $body
     * @return void
     */
    public function setBody(string $body) :void
    {
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}