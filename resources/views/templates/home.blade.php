<div class="row">
    <div class="col-md-12 homeimg" style="position: relative; background-image: url({{ theme('images/slidebay.jpg') }}); background-size: 100%;">
        
    </div>
</div>


<div class="intro-service" >
    <div class="container">
        <div class="row">
            <div class="col-sm-3 item">
                <div class="img">
                    <img src="{{ theme('images/icon-intro-1.png') }}" alt="Xử lý hồ sơ nhanh">
                </div>
                <div class="text">
                    <h2>BÁO GIÁ NHANH</h2>
                    <p>Báo giá rẻ nhất, nhanh chóng và chính xác chỉ với 1 cuộc gọi</p>
                </div>
            </div><!-- item -->
            <div class="col-sm-3 item">
                <div class="img">
                    <img src="{{ theme('images/support.png') }}" alt="Chia sẻ thông tin">
                </div>
                <div class="text">
                    <h2>HỔ TRỢ 24/7</h2>
                    <p>Phục vụ khách hàng 24/7 tất cả các ngày trong tuần qua hotline 0909501401</p>
                </div>
            </div><!-- item -->
            <div class="col-sm-3 item">
                <div class="img">
                    <img src="{{ theme('images/mony.png') }}">
                </div>
                <div class="text">
                    <h2>GIÁ VÉ TỐT NHẤT</h2>
                    <p>Cam kết giá vé rẻ nhất, đặc biệt tuyến đường đi Mỹ, Úc, Âu.</p>
                </div>
            </div>
            <div class="col-sm-3 item">
                <div class="img">
                    <img src="{{ theme('images/shipping.png') }}">
                </div>
                <div class="text">
                    <h2>GIAO VÉ MIỄN PHÍ</h2>
                    <p>Giao vé tận nơi trong nội thành thành phố Hồ Chí Minh hoàn toàn miễn phí.</p>
                </div>
            </div>
        </div>
    </div>
</div>

 {{-- news --}}
<div class="news">
    <div class="container">
        <div class="row">
            <h2 class="col-xs-12 title text-center">
                Tin tức hàng không
            </h2>
            <div style="float:left; width:100%">
                <div id="news-slider" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                @foreach($posts as $post)
                    <div class="item carousel_news">
                        <div class="img">
                            <a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                                <img src="{{ $post->excerpt_image_url}}">
                            </a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p>
                                {{ $post->short_content }}
                            </p>
                        </div>
                    </div>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="row">
            <div id="booking-brand" class="owl-carousel">
            @foreach($bookingBrands as $item)
                <div class="item carousel_brand">
                    <img src="{!! $item !!}" alt="">
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
