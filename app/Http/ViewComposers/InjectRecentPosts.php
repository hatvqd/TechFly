<?php

namespace App\Http\ViewComposers;

use App\Post;
use Illuminate\View\View;

class InjectRecentPosts
{
    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function compose(View $view)
    {
        $recentPosts = $this->posts->with('author') ->orderBy('published_at', 'desc')->take(5)->get();

        $view->with('recentPosts', $recentPosts);
    }
}
