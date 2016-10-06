<div class="block tour">
    <h3 class="post_lienquan">DANH MỤC LIÊN QUAN</h3>
    {{-- <div class="block popular-post">
        <div class="item">
                <div class="col-md-4">
                  
                </div>
                <div class="col-md-8">
                    <h5 class="title_post_row">
                        <a href="http://bay5chau.com/hinh-thuc-thanh-toan/">
                            Hình thức thanh toán                                                  
                        </a>
                    </h5>
                    <div class="time post_time">
                        02.08.2016                   
                    </div>
                </div>
            </div>
    </div> --}}
</div>
<div class="block popular-post">
    <h3>NHỮNG BÀI VIẾT GẦN ĐÂY:</h3>

    @foreach($recentPosts as $post)
    <div class="item">
            <div class="col-md-4">
                <a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                    <img  class="img-responsive" src="{{ $post->excerpt_image_url}}" >
                </a>
            </div>
            <div class="col-md-8">
                <h5 style="margin: 0">
                    <a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                        {{ $post->title}}                                
                    </a>
                </h5>
                <div class="time post_time">
                    {{ $post->published_date }}                         
                </div>
            </div>
        </div>
    @endforeach
</div>
