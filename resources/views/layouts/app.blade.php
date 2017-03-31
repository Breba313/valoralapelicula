<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Valora la Pelicula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Movie_store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{ url('/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ url('/css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <script src="{{ url('js/responsiveslides.min.js') }}"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="container_wrap">
        <div class="header_top">
            <div class="col-sm-3 logo"><a href="{{ url('/') }}"><h1 class="m_2">Valora la Pelicula</h1><img src="images/rating.png" alt=""/></a></div>
            <div class="col-sm-6 nav">
                <ul>
                    <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
                </ul>
            </div>
            <div class="col-sm-3 header_right">
                <ul class="header_right_box">
                    @if (Auth::guest())
                        <li><p><a href="{{ url('/login') }}"><i class="fa fa-user"> </i> Login</a></p></li>
                        <li><p><a href="{{ url('/register') }}"><i class="fa fa-edit"> </i> Registro</a></p></li>
                    @else
                        <li><img src="images/p1.png" alt=""/></li>
                        <li><p>{{ Auth::user()->name }}</p></li>
                        <li class="last"><p>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" title="Logout">
                                <i class="fa fa-sign-out pull-right"></i>

                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </p>
                        </li>
                    @endif
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        @yield('content')
    </div>
</div>

<div class="container">
    <footer id="footer">
        <div id="footer-3d">
            <div class="gp-container">
                <span class="first-widget-bend"></span>
            </div>
        </div>
        <div id="footer-widgets" class="gp-footer-larger-first-col">
            <div class="gp-container">
                <div class="footer-widget footer-1">
                    <div class="wpb_wrapper">
                        <img src="images/f_logo.png" alt=""/>
                    </div>
                    <br>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                    <p class="text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
                </div>
                <div class="footer_box">
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Categories</h3>
                        <ul class="first">
                            <li><a href="#">Dance</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Information</h3>
                        <ul class="first">
                            <li><a href="#">New products</a></li>
                            <li><a href="#">top sellers</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Follow Us</h3>
                        <ul class="first">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                        <div class="copy">
                            <p>&copy; 2015 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>