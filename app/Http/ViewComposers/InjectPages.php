<?php

namespace App\Http\ViewComposers;

use App\Page;
use App\Post;
use Illuminate\View\View;

class InjectPages
{
    protected $pages;
    protected $posts;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }

    public function compose(View $view)
    {
        $pages= $this->pages->where('hidden', false)->get()->toHierarchy();

        $view->with('pages', $pages);
    }
}
