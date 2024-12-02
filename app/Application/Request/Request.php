<?php

namespace App\Application\Request;

class Request
{
    /**
     * @var array
     */
    private array $post;
    /**
     * @var array
     */
    private array $get;
    /**
     * @var array
     */
    private array $files;

    /**
     * @param array $post
     * @param array $get
     * @param array $files
     */
    public function __construct(array $post, array $get, array $files)
    {
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->get[$key] ?? null;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function post(string $key): mixed
    {
        return $this->post[$key] ?? null;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function files(string $key): mixed
    {
        return $this->files[$key] ?? null;
    }

    /**
     * @param string $method
     * @return array
     */
    public function getData(string $method): array
    {
        switch ($method) {
            case 'post':
                return $this->post;
            case 'get':
                return $this->get;
            case 'file':
                return $this->files;
        }
    }
}