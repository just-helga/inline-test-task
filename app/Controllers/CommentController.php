<?php

namespace App\Controllers;

use App\Models\Comment;


class CommentController
{
    public $comment;

    public function create(array $comment) :void
    {
        $this->comment = new Comment();
        $this->comment->setId($comment['id']);
        $this->comment->setPostId($comment['postId']);
        $this->comment->setName($comment['name']);
        $this->comment->setEmail($comment['email']);
        $this->comment->setBody($comment['body']);

        $this->comment->store();
    }
}