<div class="main">
    <div class="mainnav">
        <div class="container">
            <div class="row">
                <h1 class="title col-xs-12"></h1>
            </div>
        </div>
        <div class="divbreadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="nav breadcrumb-bar">
                            <nav class="breadcrumb">
                            	<a href="{{url('/')}}">HOME</a>
                            <span> / </span>
                            <a href="">{{ $pageTitle }}</a> 
                            <span> / </span>  {{ $post->title }}
                            </nav>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- breadcrumb -->
    </div><!-- end mainnav -->

    <div class="container">
        <div class="col-xs-12 col-md-8 left-content">
            <div class="blog-detail-content col-md-12">
                    <h2>{{ $post->title }}</h2>
					<p class="lead">
                    </p>
                    <blockquote class="post_time">
                    	bởi <a href="#">{{ $post->author->name }}</a> | lúc {{ $post->published_date }}
                    </blockquote>
                    <p>
                    </p>
                    <hr>
                    <!-- Post Content -->
                    <p class="lead"></p>
                    
                    {!! $post->body_html !!}

                <div class="clearfix"></div>
                <div class="share">

                </div>
            </div><!-- left content -->
        </div>
        <div class="col-xs-12 col-md-4 sidebar">  <!-- sidebar -->
        	 @include('templates.partials.recentPost')
        </div>
       
    </div><!-- container -->
</div>
