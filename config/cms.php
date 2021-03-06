<?php

	return [
		'theme' => [
			'folder' => 'themes',
			'active' => 'default'
		],

		'templates' => [
			'home' => App\Templates\HomeTemplate::class,
			'page' => App\Templates\PageTemplate::class,
        	'blog' => App\Templates\BlogTemplate::class,
        	'blog.post' => App\Templates\BlogPostTemplate::class
		]
	];