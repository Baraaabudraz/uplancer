<!DOCTYPE html>
<html lang="{{App::getLocale() == 'ar' ? 'ar':'en'}}" dir="{{App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <title>{{setting()->name ?? ''}} | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="application-name" content="{{setting()->name ?? ''}}">
    <meta name="author" content="{{setting()->name ?? ''}}">
    <meta property="og:title" content="{{setting()->name ?? ''}} ">
    <meta content="{{setting()->meta_keyword ?? ''}}" name="keywords">
    <meta content="{{setting()->meta_description ?? ''}}" name="description">

    <meta property="og:keywords" content="{{setting()->meta_keyword ?? ''}}">
    <meta property="og:description" content="{{setting()->meta_description ?? ''}}">
    <meta property="og:image" content="{{Storage::url(setting()->logo ?? '')}}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{setting()->name ?? trans('home_trans.Up Lancer')}}">
    <meta property="og:url" content="https://uplancerps.com">
    @yield('meta')
    <!-- Favicon -->
    <link href="{{Storage::url(setting()->favicon ?? '')}}" rel="icon">

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
<!-- Navbar Modern Design -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top wow fadeIn" style="background: #5D3991; box-shadow: 1px 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ Storage::url(setting()->logo ?? '') }}" alt="{{setting()->alt ?? ''}}" class="img-fluid" style="height: 50px;">
        </a>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link fw-semibold text-primary">{{ trans('home_trans.Home') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link  fw-semibold">{{ trans('home_trans.About Up Lancer') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services') }}" class="nav-link fw-semibold">{{ trans('home_trans.Services') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects') }}" class="nav-link fw-semibold">{{ trans('home_trans.Projects') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link fw-semibold">{{ trans('home_trans.Contact us') }}</a>
                </li>
            </ul>
        </div>

        <!-- Language Dropdown -->
        <div class="dropdown ms-2">
            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                {{ LaravelLocalization::getCurrentLocaleNative() }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>


<!-- Navbar End -->

@yield('content')

<!-- Footer Start -->
<!-- Modern and Sleek Footer Redesign -->
<!-- Redesigned Footer -->
<footer class="bg-dark text-white footer wow fadeIn pt-5 pb-4" style="background-color: #3a2c50 !important;">
    <div class="container">
        <div class="row">
            <!-- Footer About -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center mb-3">
                    <img src="{{ Storage::url(setting()->logo ?? '') }}" alt="Up Lancer Logo" class="img-fluid me-2" style="height: 50px;">
                </a>
                <p>{{ trans('home_trans.Transforming your ideas into achievements with innovative solutions, tailored to meet your needs and drive your business towards success.') }}</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-4 text-white">{{trans('home_trans.Address')}}</h5>
                <ul class="list-unstyled">
{{--                    <li class="mb-2 d-flex align-items-center">--}}
{{--                        <i class="fa fa-map-marker-alt ms-2 me-2 text-primary"></i>--}}
{{--                        <span class="text-white-50">{{trans('home_trans.Kingdom of Saudi Arabia')}}</span>--}}
{{--                    </li>--}}
                    <li class="mb-2 d-flex align-items-center">
                        <i class="fa fa-phone-alt ms-2 me-2 text-primary"></i>
                        @if(App::getLocale() == 'ar')
                        <span class="text-white-50">{{setting()->phone ?? ''}}{{'+'}}</span>
                        @else
                            <span class="text-white-50">{{'+'}}{{setting()->phone ?? ''}}</span>
                        @endif
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <i class="fa fa-envelope ms-2 me-2 text-primary"></i>
                        <span class="text-white-50">{{setting()->email ?? ''}}</span>
                    </li>
                </ul>
            </div>

            <!-- Footer Links -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-white">{{ trans('home_trans.Quick Links') }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="btn btn-link text-decoration-none ">{{ trans('home_trans.Home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="btn btn-link text-decoration-none">{{ trans('home_trans.About Up Lancer') }}</a></li>
                    <li><a href="{{ route('services') }}" class="btn btn-link text-decoration-none">{{ trans('home_trans.Services') }}</a></li>
                    <li><a href="{{ route('projects') }}" class="btn btn-link text-decoration-none ">{{ trans('home_trans.Projects') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="btn btn-link text-decoration-none">{{ trans('home_trans.Contact us') }}</a></li>
                </ul>
            </div>

            <!-- Footer Social -->
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold text-white">{{ trans('home_trans.Stay Connected') }}</h5>
                <p class="text-white-50 mb-4">{{trans('home_trans.Contact us today and discover how we can help you reach your goals.')}}</p>
                <ul class="list-unstyled d-flex gap-3 mt-3">
                    <li><a href="https://www.facebook.com/uplancerps" target="_blank" class="text-primary fs-4"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/uplancerps" target="_blank" class="text-primary fs-4"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/uplancerps" target="_blank" class="text-primary fs-4"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="https://instagram.com/uplancerps" target="_blank" class="text-primary fs-4"><i class="fab fa-instagram"></i></a></li>
                </ul>
                    <a href="https://wa.me/+966549289484" class="btn btn-primary px-4 py-2" target="_blank">
                        {{trans('home_trans.Contact us')}}
                    </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center text-white-50">
                &copy; {{ date('Y') }} Up Lancer. {{ trans('home_trans.All Right Reserved') }}.
                <div class="col text-center text-white-50">
                    {{trans('home_trans.Programming & Designed By')}}
                    <span class="text-primary">Up Lancer</span>
                </div>
            </div>

        </div>
    </div>
</footer><!-- Footer End -->

<a href="https://api.whatsapp.com/send?phone=+{{setting()->phone ?? ''}}&text=مرحبا لدي استفسار%21%20." class="float" target="_blank">
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
