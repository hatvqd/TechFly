<?php

namespace App\Templates;

use Carbon\Carbon;
use App\Post;
use Illuminate\View\View;

class BlogPostTemplate extends AbstractTemplate
{
    protected $view = 'blog.post';

    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function prepare(View $view, array $parameters)
    {
        $post = $this->posts->where('id', $parameters['id'])->where('slug', $parameters['slug'])->first();
        //$recentPosts = $this->posts->with('author') ->orderBy('published_at', 'desc')->take(3)->get();
        $view->with('post', $post);
        //$view->with('recentPosts', $recentPosts);
    }
}
