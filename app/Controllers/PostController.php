<?php

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    public $post;

    public function create(array $post) :void
    {
        $this->post = new Post();
        $this->post->setId($post['id']);
        $this->post->setUserId($post['userId']);
        $this->post->setTitle($post['title']);
        $this->post->setBody($post['body']);

        $this->post->store();
    }
}