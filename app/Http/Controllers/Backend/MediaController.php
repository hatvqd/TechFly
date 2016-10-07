<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;

class MediaController extends Controller
{
	 public function fileManager(){
	 	$url = config('medias.url') . '?langCode=' . config('app.locale');
		
		return view("backend.media.fileManager", compact('url'));
	}
}
