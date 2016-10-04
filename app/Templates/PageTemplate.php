<?php

namespace App\Templates;

use Illuminate\View\View;
use App\Post;

class PageTemplate extends AbstractTemplate
{
    protected $view = 'page';

    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function prepare(View $view, array $parameters)
    {
    }
}
