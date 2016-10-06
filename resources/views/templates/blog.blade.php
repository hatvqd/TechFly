
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
                            <span></span> 
                            </nav>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- breadcrumb -->
    </div><!-- end mainnav -->

    <div class="container">
        <div class="col-xs-12 col-md-8 left-content">
        @foreach($posts as $post)
            <div class="list-item" style="width: 100%">
            	<div class="col-md-12 post_row">
	            	<div class="col-md-4">
	            		<a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                        	<img width="238" height="151" src="{{ $post->excerpt_image_url}}" class="img-responsive" alt="{{ $post->title }}">
                        </a>
	            	</div>
	            	<div class="col-md-8">
	            		<h4 class="title_post_row">
	            			<a href="{{ route('blog.post', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
	            		</h4>
	            		<span class="glyphicon glyphicon-time "> </span>
	            		<span class="post_time">{{ $post->published_date }}</span>
	            		<blockquote>
	            			<footer> 

	            				{!! $post->short_content !!} 

	            				<div style="padding-bottom:20px; padding-top:10px;" class="hupso-share-buttons">
	            				</div>
	            			</footer>
	            			<a href="http://bay5chau.com/ve-may-bay-di-pakse/" class="detail">Xem thêm</a>
	            		</blockquote>
	            	</div>
            	</div>
            </div>
        @endforeach
        </div>
        <div class="col-xs-12 col-md-4 sidebar">  <!-- sidebar -->
        	 @include('templates.partials.recentPost')
        </div>
       
    </div><!-- container -->
</div>
