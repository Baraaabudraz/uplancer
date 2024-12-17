<!DOCTYPE html>
<html lang="{{App::getLocale() == 'ar' ? 'ar':'en'}}" dir="{{App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <title>Up Lancer | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="application-name" content="Uplancer | Software Development for Businesses & Founders">
    <meta name="author" content="Uplancer">
    <meta property="og:title" content="@yield('meta_title')">
    <meta content="@yield('meta_keywords')" name="keywords">
    <meta content="@yield('meta_description')" name="description">

    <meta property="og:keywords" content="@yield('meta_keywords')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="@yield('og:image')">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uplancer | Software Development for Businesses & Founders">
    <meta property="og:url" content="https://uplancerps.com">
    <!-- Favicon -->
    <link href="{{asset('uplancer/logo/up lancer team logo.svg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

{{--    <!-- Icon Font Stylesheet -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @yield('styles')

    <!-- Libraries Stylesheet -->
    <link href="{{asset('uplancer/lib/animate/animate.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('uplancer/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('uplancer/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->

    @if(App::getLocale() == 'ar')
        <link href="{{asset('/uplancer/css/style-rtl.css')}}" rel="stylesheet">
        <link href="{{asset('uplancer/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    @else
        <link href="{{asset('/uplancer/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('uplancer/css/bootstrap.min.css')}}" rel="stylesheet">

    @endif


    <!-- Template Stylesheet -->
    <style>
        .project-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .project-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .project-item img {
            transition: all 0.3s ease;
        }

        .project-item:hover img {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .project-item:hover .overlay {
            opacity: 1;
        }

        .view-icon {
            color: #fff;
            font-size: 1.5rem;
        }

        .view-icon:hover {
            color: #5D3991;
        }
        .btn-primary {
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #462b6c;
            transform: translateY(-3px);
        }

        .btn-primary:active {
            transform: translateY(0px);
        }

        .icon-circle {
            padding: 8px;
            border-radius: 50%;
            box-shadow: 5px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .hover-grow:hover {
            transform: scale(1.1);
            transition: 0.3s ease;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #5D3991, #9E59E2);
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            left:10px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>

</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
    <img src="{{asset('uplancer/logo/up lancer team logo.svg')}}" style="width: 70px; height: 70px" class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle" alt="">
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<!-- Navbar with Sticky Feature -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top" style="background: linear-gradient(45deg, #5D3991, #8D61E2); box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('uplancer/logo/up_lancer_logo_light.png') }}" alt="Up Lancer Logo" class="img-fluid" style="height: 50px;">
        </a>

        <!-- Language Dropdown (Positioned to the right in all screens) -->
        <div class="dropdown d-lg-none ms-auto me-3">
            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="languageDropdownMobile" data-bs-toggle="dropdown" aria-expanded="false">
                {{ LaravelLocalization::getCurrentLocaleNative() }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdownMobile">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           hreflang="{{ $localeCode }}"
                           class="dropdown-item">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Toggler for Mobile -->
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link active">{{ trans('home_trans.Home') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">{{ trans('home_trans.About Up Lancer') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services') }}" class="nav-link">{{ trans('home_trans.Services') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects') }}" class="nav-link">{{ trans('home_trans.Projects') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">{{ trans('home_trans.Contact us') }}</a>
                </li>
            </ul>

            <!-- Language Dropdown for Larger Screens -->
            <div class="dropdown d-none d-lg-block ms-3">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="languageDropdownDesktop" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ LaravelLocalization::getCurrentLocaleNative() }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdownDesktop">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                               hreflang="{{ $localeCode }}" class="dropdown-item">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>


<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
<!-- Modern and Sleek Footer Redesign -->
<footer class="container-fluid bg-dark footer wow fadeIn text-white py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Address Section -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-4 text-white">{{ trans('home_trans.Address') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 d-flex align-items-center">
                        <i class="fa fa-map-marker-alt ms-2 me-2 text-primary"></i>
                        <span class="text-white-50">{{ trans('home_trans.Kingdom of Saudi Arabia') }}</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <i class="fa fa-phone-alt ms-2 me-2 text-primary"></i>
                        <span class="text-white-50">{{ setting()->phone ?? '' }}</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <i class="fa fa-envelope ms-2 me-2 text-primary"></i>
                        <span class="text-white-50">{{ setting()->email ?? '' }}</span>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn btn-sm btn-outline-light rounded-circle me-2" style="color: #F7931E !important; border-color: #F7931E !important"  href="https://twitter.com/uplancerps" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-sm btn-outline-light rounded-circle me-2" style="color: #F7931E !important; border-color: #F7931E !important" href="https://www.facebook.com/uplancerps" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-sm btn-outline-light rounded-circle me-2" style="color: #F7931E !important; border-color: #F7931E !important" href="https://www.linkedin.com/company/uplancerps" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-bold mb-4 text-white">{{ trans('home_trans.Quick Links') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a class="btn btn-link  text-decoration-none" href="{{ route('about') }}">{{ trans('home_trans.About Up Lancer') }}</a>
                    </li>
                    <li class="mb-2">
                        <a class="btn btn-link  text-decoration-none" href="{{ route('contact') }}">{{ trans('home_trans.Contact Us') }}</a>
                    </li>
                    <li class="mb-2">
                        <a class="btn btn-link  text-decoration-none" href="{{ route('services') }}">{{ trans('home_trans.Services') }}</a>
                    </li>
                    <li class="mb-2">
                        <a class="btn btn-link  text-decoration-none" href="{{ route('terms') }}">{{ trans('home_trans.Terms & Condition') }}</a>
                    </li>
                    <li>
                        <a class="btn btn-link  text-decoration-none" href="{{ route('privacy') }}">{{ trans('home_trans.Privacy') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Us Section -->
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-4 text-white">{{ trans('home_trans.Keep In Touch') }}</h5>
                <p class="text-white-50 mb-4">{{ trans('home_trans.Contact us today and discover how we can help you reach your goals.') }}</p>
                <a href="https://wa.me/+966549289484" class="btn btn-primary px-4 py-2" target="_blank">
                    {{ trans('home_trans.Contact us') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container border-top mt-4 pt-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <span class="text-primary">Up Lancer</span>, {{ trans('home_trans.All Right Reserved') }}.
            </div>
            <div class="col-md-6 text-center text-md-end">
                {{ trans('home_trans.Designed By') }} <span class="text-primary">Up Lancer</span>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<a href="https://api.whatsapp.com/send?phone=+966549289484&text=مرحبا لدي استفسار%21%20." class="float" target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

@yield('scripts')
<!-- JavaScript Libraries -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('uplancer/lib/wow/wow.min.js')}}"></script>
{{--<script src="{{asset('uplancer/lib/easing/easing.min.js')}}"></script>--}}
{{--<script src="{{asset('uplancer/lib/waypoints/waypoints.min.js')}}"></script>--}}
{{--<script src="{{asset('uplancer/lib/counterup/counterup.min.js')}}"></script>--}}
{{--<script src="{{asset('uplancer/lib/owlcarousel/owl.carousel.min.js')}}"></script>--}}
<script src="{{asset('uplancer/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
<!-- Template Javascript -->
<script src="{{asset('uplancer/js/main.js')}}"></script>
</body>

</html>
