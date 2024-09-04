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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @yield('styles')

    <!-- Libraries Stylesheet -->
    <link href="{{asset('uplancer/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('uplancer/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('uplancer/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('uplancer/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/uplancer/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Spinner Start -->
{{--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">--}}
{{--    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>--}}
{{--    <img src="{{asset('uplancer/logo/up lancer team logo.svg')}}" style="width: 70px; height: 70px" class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle" alt="">--}}
{{--</div>--}}
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>
            </ol>
        </div>
        <div class="col-lg-6 px-6 text-end">
            <small>Follow us:</small>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn-square text-primary border-end rounded-0" href="https://www.facebook.com/uplancerps" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn-square text-primary border-end rounded-0" href="https://twitter.com/uplancerps" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn-square text-primary border-end rounded-0" href="https://www.linkedin.com/company/uplancerr" target="_blank"><i class="fab fa-linkedin-in"></i></a>

            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Brand & Contact Start -->
<div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row align-items-center top-bar">
        <div class="col-lg-4 col-md-12 text-center text-lg-start">
            <a href="" class="navbar-brand m-0 p-0">

                <img src="{{asset('uplancer/logo/up-lancer-team-logo.png')}}" style="height: 100px" alt="Logo">
            </a>
        </div>
        <div class="col-lg-8 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-clock text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Opening Hour</p>
                            <h6 class="mb-0">Sat - Thu, 8:00 am - 5:00</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="fa fa-phone text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Call Us</p>
                            <h6 class="mb-0">+970-597644664</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-envelope text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Email Us</p>
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
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" style="background: #5D3991 !important;">
    <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link">About Us</a>
            <a href="{{route('services')}}" class="nav-item nav-link">Services</a>
            <a href="{{route('projects')}}" class="nav-item nav-link">Projects</a>
            <!--            <div class="nav-item dropdown">-->
            <!--                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>-->
            <!--                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">-->
            <!--                    <a href="feature.blade.php" class="dropdown-item">Features</a>-->
            <!--                    <a href="team.blade.php" class="dropdown-item">Our Team</a>-->
            <!--                    <a href="testimonial.blade.php" class="dropdown-item">Testimonial</a>-->
            <!--                    <a href="404.html" class="dropdown-item">404 Page</a>-->
            <!--                </div>-->
            <!--            </div>-->
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
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>GAZA,PALESTINE</p>
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
                <a class="btn btn-link" href="/about">About Us</a>
                <a class="btn btn-link" href="/contact">Contact Us</a>
                <a class="btn btn-link" href="/service">Our Services</a>
                <a class="btn btn-link" href="#">Terms &amp; Condition</a>
                <a class="btn btn-link" href="#">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Gallery</h5>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/portfolio/Web/EMS.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/portfolio/mobile%20app/WhatsApp%20Image%202023-05-25%20at%2015.02.12.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/portfolio/mobile%20app/WhatsApp%20Image%202023-05-25%20at%2015.01.51.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/portfolio/mobile%20app/WhatsApp%20Image%202023-05-25%20at%2015.01.32.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/img/project-5.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/img/project-6.jpg')}}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Keep In Touch</h5>
                <p>Tap into the power of effective communication by contacting us today. Together, we can transform your ideas into remarkable&nbsp;achievements</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <!--                    <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">-->
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
<script src="{{asset('uplancer/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('uplancer/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('uplancer/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('uplancer/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('uplancer/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('uplancer/js/main.js')}}"></script>
</body>

</html>
