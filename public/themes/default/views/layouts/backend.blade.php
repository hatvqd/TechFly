<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') TechFly</title>
	<link rel="stylesheet" type="text/css" href="{{theme('css/backend.css')}}" />
	<script type="text/javascript" src="{{ theme('js/all.js') }}"></script>
	
	@yield('head')
</head>
<body>
	<nav class="navbar navbar-static-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">TechFly</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{route('backend.dashboard')}}"> Dashboard </a></li>
				<li><a href="{{route('backend.users.index')}}"> Users </a></li>
				<li><a href="{{route('backend.pages.index')}}"> Pages </a></li>
				<li><a href="{{route('backend.blog.index')}}"> Blog posts </a></li>
				<li><a href="{{route('backend.fileManager')}}"> Media </a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if($admin) <li><span class="navbar-text">Hello, {{$admin -> name}} </span></li> @endif 
				<li><a href="{{ route('auth.logout') }}">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if($errors -> any())
					<div class="alert alert-danger">
						<strong>We found some errors!</strong>
						<ul>
							@foreach($errors -> all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif

				@if($status)
                    <div class="alert alert-info">
                        {{ $status }}
                    </div>
                @endif

				@yield('content')	
			</div>
		</div>
	</div>
</body>
</html>