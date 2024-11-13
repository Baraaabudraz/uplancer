<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Up Lancer | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('uplancer/logo/up lancer team logo.svg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

{{--    <!-- Icon Font Stylesheet -->--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @yield('styles')

    <!-- Libraries Stylesheet -->
    <link href="{{asset('uplancer/lib/animate/animate.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('uplancer/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('uplancer/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('uplancer/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/uplancer/css/style.css')}}" rel="stylesheet">
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
    </style>

</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
    <img src="{{asset('uplancer/logo/up lancer team logo.svg')}}" style="width: 70px; height: 70px" class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle" alt="">
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
{{--<div class="container-fluid bg-white py-2 px-4" style="border-bottom: 1px solid #eaeaea;">--}}
{{--    <div class="row align-items-center">--}}
{{--        <div class="col-lg-6 d-none d-lg-flex">--}}
{{--            <nav class="breadcrumb mb-0">--}}
{{--                <a class="breadcrumb-item small text-muted" href="{{route('home')}}">Home</a>--}}
{{--                <a class="breadcrumb-item small text-muted" href="#">Career</a>--}}
{{--                <a class="breadcrumb-item small text-muted" href="{{route('terms')}}">Terms</a>--}}
{{--                <a class="breadcrumb-item small text-muted" href="{{route('privacy')}}">Privacy</a>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 text-lg-end text-center">--}}
{{--            <span class="small text-muted">Follow us: </span>--}}
{{--            <a class="text-muted mx-2" href="https://www.facebook.com/uplancerps"><i class="fab fa-facebook-f"></i></a>--}}
{{--            <a class="text-muted mx-2" href="https://twitter.com/uplancerps"><i class="fab fa-twitter"></i></a>--}}
{{--            <a class="text-muted mx-2" href="https://www.linkedin.com/company/uplancerps"><i class="fab fa-linkedin-in"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Topbar End -->


<!-- Brand & Contact Start -->
<div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: #f9f9f9; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-12 text-center text-lg-start">
            <a href="{{route('home')}}" class="navbar-brand m-0 p-0">
                <img src="{{asset('uplancer/logo/up-lancer-team-logo.png')}}" style="height: 80px;" alt="Logo" class="hover-grow">
            </a>
        </div>
        <div class="col-lg-8 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="icon-circle bg-gradient-primary text-white">
                            <i class="far fa-clock fa-2x"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-1 text-muted">Opening Hour</p>
                            <h6 class="mb-0">Sat - Thu, 8:00 am - 5:00</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="icon-circle bg-gradient-primary text-white">
                            <i class="fa fa-phone fa-2x"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-1 text-muted">Call Us</p>
                            <h6 class="mb-0">+970 597644 664</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="icon-circle bg-gradient-primary text-white">
                            <i class="far fa-envelope fa-2x"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-1 text-muted">Email Us</p>
                            <h6 class="mb-0">info@uplancerps.com</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand & Contact End -->



<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn shadow-lg" data-wow-delay="0.1s" style="background: linear-gradient(45deg, #5D3991, #8D61E2);">
    <a href="#" class="navbar-brand d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link">About Us</a>
            <a href="{{route('services')}}" class="nav-item nav-link">Services</a>
            <a href="{{route('projects')}}" class="nav-item nav-link">Projects</a>
            <a href="{{route('contact')}}" class="nav-item nav-link">Contact Us</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->





@yield('content')


<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>PALESTINE</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+970597644 664</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@uplancerps.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://twitter.com/uplancerps" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href="https://www.facebook.com/uplancerps" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <!--                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>-->
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href="https://www.linkedin.com/company/uplancerps" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="{{route('about')}}">About Us</a>
                <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
                <a class="btn btn-link" href="{{route('services')}}">Our Services</a>
                <a class="btn btn-link" href="{{route('terms')}}">Terms &amp; Condition</a>
                <a class="btn btn-link" href="{{route('privacy')}}">Privacy</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Keep In Touch</h5>
                <p>Contact us today and discover how we can help you reach your goals.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
{{--                    <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">--}}
                    <a href="https://wa.me/+970597644664" type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" target="_blank"><i class="fas fa-fw  fa-phone-alt me-2"></i>Contact Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    © <a href="#">Up Lancer</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="#">Up Lancer</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- Footer End -->


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
