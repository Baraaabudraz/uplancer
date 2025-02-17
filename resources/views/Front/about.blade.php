@extends('Front.parent')
@section('title','About')
@section('keywords',setting()->meta_keyword ?? '')
@section('description',setting()->meta_description ?? '')

@section('og:title',trans('home_trans.About'))
@section('og:keywords',setting()->meta_keyword ?? '')
@section('og:description',setting()->meta_description ?? '')
@section('content')
    <!-- About Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title text-start text-primary">{{trans('home_trans.Discover Our Story')}}</h6>
                        <h1 class="display-6 mb-4">
                            {{trans('home_trans.Empower Your Success with')}} <span class="text-primary">{{trans('home_trans.Up Lancer')}}</span> - {{trans('home_trans.Where Excellence Meets Innovation')}}
                        </h1>
                        <p class="lead text-muted mb-4">
                            {{--                            {{$settings->about}}--}}
                        </p>

                        <div class="row mb-4">
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-lightbulb fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">{{trans('home_trans.Innovative Solutions')}}</h5>
                            </div>
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-award fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">{{trans('home_trans.Award-Winning Expertise')}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">{{trans('home_trans.Customer-Centric')}}</h5>
                            </div>
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">{{trans('home_trans.Security & Trust')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        <div class="p-4 bg-white shadow-lg rounded mb-4">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Vision')}}</h3>
                            <p class="text-dark">
                                {{trans('home_trans.At Up Lancer, our vision is to redefine the standards of quality and innovation in every sector we serve. We believe in creating impactful solutions that not only meet the needs of today but anticipate the challenges of tomorrow.')}}
                            </p>
                        </div>
                        <div class="p-4 bg-white shadow-lg rounded">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Mission')}}</h3>
                            <p class="text-dark">
                                {{trans('home_trans.Our mission is to empower businesses to reach their full potential by providing expert solutions that are innovative, reliable, and tailored to meet the unique goals of each client.')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title text-start text-primary">{{trans('home_trans.Why Up Lancer?')}}</h6>
                        <h1 class="display-6 mb-4">{{trans('home_trans.Why People Trust Us?')}}</h1>
                        <div class="why-us-content">
                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <div>
                                    <h5>{{trans('home_trans.Innovative Solutions')}}</h5>
                                    <p class="text-muted">{{trans('home_trans.At UP Lancer, we don’t just follow trends – we set them. Our team is committed to innovation, delivering cutting-edge web and mobile solutions.')}}</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                                <div>
                                    <h5>{{trans('home_trans.Quality-Driven Processes')}}</h5>
                                    <p class="text-muted">{{trans('home_trans.Our development process ensures timely delivery and the highest standards of quality.')}}</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-leaf fa-2x"></i>
                                </div>
                                <div>
                                    <h5>{{trans('home_trans.Long-Term Value')}}</h5>
                                    <p class="text-muted">{{trans('home_trans.We focus on mas-customization and long-term, helping your business grow without frequent redevelopments.')}}</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div>
                                    <h5>{{trans('home_trans.Collaborative Partnership')}}</h5>
                                    <p class="text-muted">{{trans('home_trans.We work closely with our clients to tailor solutions to their needs and business goals.')}}</p>
                                </div>
                            </div>

                            <div class="why-item d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-lock fa-2x"></i>
                                </div>
                                <div>
                                    <h5>{{trans('home_trans.Security & Reliability')}}</h5>
                                    <p class="text-muted">{{trans('home_trans.We provide secure and robust solutions to protect your data and operations.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white p-5 rounded shadow-lg text-center">
                        <h3 class="mb-4 text-primary">{{trans('home_trans.Why Trust Up Lancer?')}}</h3>
                        <p class="text-dark">{{$settings->why_us ?? ''}}</p>
                        <a href="{{route('about')}}" class="btn btn-primary rounded-pill py-3 px-5">{{trans('home_trans.Learn More')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature End -->

    <!-- Team Start -->
<!--    <div class="container-xxl py-5">-->
<!--        <div class="container">-->
<!--            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
<!--                <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>-->
<!--                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>-->
<!--            </div>-->
<!--            <div class="row g-4">-->
<!--                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">-->
<!--                    <div class="team-item text-center p-4">-->
<!--                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/uplancer/img/team-1.jpg" alt="">-->
<!--                        <div class="team-text">-->
<!--                            <div class="team-title">-->
<!--                                <h5>Baraa Abu Draz</h5>-->
<!--                                <span>Web Developer</span>-->
<!--                            </div>-->
<!--                            <div class="team-social">-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
<!--                    <div class="team-item text-center p-4">-->
<!--                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/uplancer/img/team-2.jpg" alt="">-->
<!--                        <div class="team-text">-->
<!--                            <div class="team-title">-->
<!--                                <h5>Full Name</h5>-->
<!--                                <span>Designation</span>-->
<!--                            </div>-->
<!--                            <div class="team-social">-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
<!--                    <div class="team-item text-center p-4">-->
<!--                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="/uplancer/img/team-3.jpg" alt="">-->
<!--                        <div class="team-text">-->
<!--                            <div class="team-title">-->
<!--                                <h5>Full Name</h5>-->
<!--                                <span>Designation</span>-->
<!--                            </div>-->
<!--                            <div class="team-social">-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>-->
<!--                                <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-instagram"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- Team End -->

@endsection



