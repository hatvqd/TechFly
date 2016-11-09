<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') &mdash; TechFly</title>

        
        <link rel="stylesheet" type="text/css" href="{{ theme('css/frontend.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ theme('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ theme('css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ theme('css/plug_mmenu.all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ theme('css/owl.carousel.css') }}">

        <script src="{{ theme('js/all.js') }}"></script>
        <script src="{{ theme('js/main.js') }}"></script>
        <script src="{{ theme('js/jquery.mmenu.min.all.js') }}"></script>
        <script src="{{ theme('js/owl.carousel.js') }}"></script> 

    </head>
    <body class="home blog">

       

        <nav id="my-menu" class="mm-menu mm-horizontal mm-offcanvas">
            <div class="menu-main-menu-vi-container mm-panel mm-opened mm-current" id="mm-0">
                <div class="menu-main-menu-vi-container">
                    <ul id="menu-main-menu-vi-1" class="menu mm-list">
                        @include('partials.navigation')
                    </ul>
                </div>     
            </div>
        </nav>

        <header id="header" >
            <div class="top-link">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 top-link">
                            <div class="left support">
                                <p>
                                    Email: <a href="mailto:techfly@gmail.com">techfly@gmail.com</a>        
                                </p>
                            </div>
                            <div class="visible-xs logo_mobile">
                                <a href="{{url('/')}}">TECHFLY.COM.VN</a>
                            </div>
                            <div class="top-hotline"> Hotline: 098 831 0405</div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- top-link -->
            <div class="main-head hidden-sm hidden-xs">
                @include('partials.head_contact')
            </div><!-- main-head -->
            <nav class="main-menu">
                <div class="container">
                    <div class="col-md-12 col-sm-12 menu">
                        <div class="menu-main-menu-vi-container">
                            <div class="menu-main-menu-vi-container">
                                <ul id="menu-main-menu-vi" class="ddmenu">
                                    @include('partials.navigation')
                                </ul>
                            </div>                    
                        </div>
                    </div>
                </div>
            </nav>
            <button class="navbar-toggle hidden-md hidden-lg" type="button" id="close_open_menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </header>

        <div class="blank hidden"></div>

        <div class="row">
            @yield('content')
        </div>
      
        @include('partials.footer_frontend')
    </body>
</html>
