<?php

namespace App\Templates;

use Carbon\Carbon;
use App\Post;
use Illuminate\View\View;

use Illuminate\Support\Facades\Log;
use File;
use Illuminate\Filesystem\Filesystem;

class HomeTemplate extends AbstractTemplate
{
	protected $view = 'home';

	protected $posts;

	public function __construct(Post $posts) 
	{
		$this->posts = $posts;
	}

	public function prepare(View $view, array $parameters)
	{
		$recentPosts = $this->posts->with('author')
                             ->orderBy('published_at', 'desc')
                             ->take(12)
                             ->get();

        $folderPath = config('filemanager.folder_path').'BookingBrands/';
        $bookingBrands = [];
		$filesInFolder = File::allFiles(public_path().'/'.$folderPath);

		foreach($filesInFolder as $path)
		{
		    $bookingBrands[] = url('/'). '/'. $folderPath.$path->getFileName();
		}

        $view->with('posts', $recentPosts);
        $view->with('bookingBrands', $bookingBrands);
	}
}