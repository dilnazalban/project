<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
<!-- Preloader Start -->

<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a height href="{{route('index')}}"><img height="100" width="230" src="{{asset('img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('index')}}">Негізгі бет</a></li>
                                        <li><a href="{{route('index.jobs')}}">Вакансия іздеу</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @guest
                                <div class="header-btn d-none f-right d-lg-block">

                                @if (Route::has('login'))

                                        <a  class="btn head-btn1" href="{{ route('login') }}">Кіру</a>

                                @endif

                                @if (Route::has('register'))

                                        <a  class="btn head-btn2" href="{{ route('register') }}">Тіркелу</a>

                                @endif
                                </div>
                            @else
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="#"> {{ Auth::user()->name }}</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            Logout</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            @endguest

                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    @yield('content')
</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Біз туралы</h4>
                                <div class="footer-pera">
                                    <p>Біз дәл қазіргі уақытта тез дамып келе жатқан старапп</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Контакт</h4>
                            <ul>
                                <li>
                                    <p>Адрес : Жандосова №55</p>
                                </li>
                                <li><a href="#">Телефон : +7777 777 77 77</a></li>
                                <li><a href="#">Емайл : info@narxoz.kz</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.html"><img src="{{asset('img/logo/logo2_footer.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>20 000+</span>
                        <p>СММ-щиктер</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>1000+</span>
                        <p>Компания</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>568+</span>
                        <p>Сеньор смм</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/price_rangs.js')}}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{asset('js/wow.min.js')}}"><script src="{{asset('js/animated.headline.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
