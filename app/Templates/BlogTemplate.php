<?php

namespace App\Templates;

use Carbon\Carbon;
use App\Post;
use Illuminate\View\View;

class BlogTemplate extends AbstractTemplate
{
    protected $view = 'blog';

    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function prepare(View $view, array $parameters)
    {
        $posts = array();
        if($parameters['term']) {
            // $posts = $this->posts->with(array('term' => function($query) use ($parameters) {
            //                     $query->where('slug', '=', $parameters['term']);
            //                 }))
            //                 ->orderBy('published_at', 'desc')
            //                 ->paginate(10);
            $posts = $this->posts->whereHas('term', function($q) use($parameters) {
                                $q->where('slug', '=', $parameters['term']);
                            })
                            ->orderBy('published_at', 'desc')
                            ->paginate(10);
        } else {
            $posts = $this->posts->with('author')
                             ->where('published_at', '<', Carbon::now())
                             ->orderBy('published_at', 'desc')
                             ->paginate(10);
        }
        
        $view->with('posts', $posts);
    }
}
