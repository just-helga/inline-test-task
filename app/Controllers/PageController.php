<?php

namespace App\Controllers;

use App\Application\Data\DataLoader;
use App\Application\Router\Redirect;
use App\Application\Views\View;

class PageController
{
    public function home()
    {
        View::show('pages/home');
        $posts = DataLoader::fetch('https://jsonplaceholder.typicode.com/posts');

        foreach ($posts as $post) {
            $cont = new PostController();
            $cont->create($post);
        }

        $comments = DataLoader::fetch('https://jsonplaceholder.typicode.com/comments');
        foreach ($comments as $comment) {
            $cont = new CommentController();
            $cont->create($comment);
        }

        echo "Загружено " . count($posts) . " записей и " . count($comments) . " комментариев.\n";
    }
}