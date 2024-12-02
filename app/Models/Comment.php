<?php

namespace App\Models;

use App\Application\Database\Model;

class Comment extends Model
{

    protected string $table = 'comments';

    protected array $fields = ['id', 'postId', 'name', 'email', 'body'];

    protected int $postId;
    protected string $name;
    protected string $email;
    protected string $body;

    public function setPostId(int $postId) :void
    {
        $this->postId = $postId;
    }
    public function setName(string $name) :void
    {
        $this->name = $name;
    }
    public function setEmail(string $email) :void
    {
        $this->email = $email;
    }
    public function setBody(string $body) :void
    {
        $this->body = $body;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getBody(): string
    {
        return $this->body;
    }

}