<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Log;
use App\Page;


class PageController extends Controller
{
    public function show(Page $page, array $parameters)
    {
    	
        $this->prepareTemplate($page, $parameters);

        return view('main', compact('page'));
    }

    protected function prepareTemplate(Page $page, array $parameters)
    {
        $templates = config('cms.templates');

        if (! $page->template || ! isset($templates[$page->template])) {
            return;
        }
        
        $template = app($templates[$page->template]);

        $view = sprintf('templates.%s', $template->getView());

        if (! view()->exists($view)) {
            return;
        }
        if($page->name) {
            $parameters['term'] = $page->name;
        }
        $viewRender = view($view);
        $viewRender->with('pageTitle', $page->title);
        $viewRender->with('pageUrl', $page->url);
        $template->prepare($viewRender, $parameters);
        //$view->with('page', $page);
        $page->view = $viewRender;
    }
}
