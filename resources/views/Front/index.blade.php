@extends('Front.parent')
@section('title',setting()->slogan ?? '')

@section('keywords',setting()->meta_keyword ?? '')
@section('description',setting()->meta_description ?? '')

@section('og:title',trans('home_trans.Home'))
@section('og:keywords',setting()->meta_keyword ?? '')
@section('og:description',setting()->meta_description ?? '')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>

    /* For smaller screens */
    @media (max-width: 767px) {
        .counter-item {
            padding: 3rem;
        }
    }
    /* تصميم البانر */
    .banner-modern {
        position: relative;
        border-radius: 25px;
        padding: 20px;
        margin-top: 30px;
        overflow: hidden;
        z-index: 1;
    }

    /* إضافة خلفية متحركة */
    .banner-modern::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #5d3991, #9b59b6, #5d3991);
        background-size: 300% 300%;
        animation: gradientMove 6s infinite alternate;
        z-index: -1;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* تأثير الزجاج */
    .banner-overlay {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 25px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    }


    /* Service Packages Section */
    .package-type-header {
        padding: 20px;
        text-align: center;
        color: #fff;
        border-radius: 15px 15px 0 0;
        margin-bottom: 10px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.2em;
        transition: transform 0.3s ease;
    }

    .package-type-header:hover {
        transform: translateY(-3px);
    }

    .website-development {
        background: linear-gradient(45deg, #eee6f3, #f8f5e2);    }

    .graphic-design {
        background: linear-gradient(45deg, #eee6f3, #f8f5e2);     }

    .app-development {
        background: linear-gradient(45deg, #eee6f3, #f8f5e2);     }
    /* Accordion Styles */
    .accordion-item {
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        margin-bottom: 0.5rem;
    }

    .accordion-header {
        font-size: 1.1rem;
    }

    .accordion-button {
        background-color: #a386ff;
        color: #212529;
        border: 0;
        padding: 1rem 1.25rem;
        width: 100%;
        text-align: left;
        border-radius: 0.25rem;
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
    }

    .accordion-button:not(.collapsed) {
        color: #fff;
        background-color: #6c63ff;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
    }

    .accordion-button:focus {
        border-color: #8a18e4;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(138, 24, 228, 0.25);
    }

    .accordion-body {
        padding: 1rem 1.25rem;
    }

</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 flex-column text-center text-lg-start mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4 text-dark">
                        {{ trans('home_trans.Software Development for Businesses & Founders') }}
                    </h1>
                    <ul class="list-inline flex-column fs-5 mt-4">
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fa fa-check-circle text-primary ms-1 me-2 fs-4"></i>
                            <span class="text-dark">{{ trans('home_trans.Skilled in development, design, & marketing') }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fa fa-check-circle text-primary ms-1 me-2 fs-4"></i>
                            <span class="text-dark">{{ trans('home_trans.Acquire a high-performing distributed team') }}</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <i class="fa fa-check-circle text-primary ms-1 me-2 fs-4"></i>
                            <span class="text-dark">{{ trans('home_trans.Trusted by founders for cost-effective solutions') }}</span>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-lg mt-4 px-4 py-2 rounded-pill text-white" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('home_trans.Start with Up Lancer') }}
                    </button>
                </div>

                <!-- Image Content -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/site/hero-team.svg') }}" alt="Business Illustration" class="img-fluid w-100 max-height-400 wow zoomIn" data-wow-delay="0.3s">
                </div>
            </div>
        </div>
        <!-- Facts Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">{{trans('home_trans.Years Experience')}}</h5>
                            <h1 class="display-5 mb-0" data-target1="7">0</h1>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">{{trans('home_trans.Satisfied Customers')}}</h5>
                            <h1 class="display-5 mb-0" data-target1="50">0</h1>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-check fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">{{trans('home_trans.Projects Completed')}}</h5>
                            <h1 class="display-5 mb-0" data-target1="50">0</h1>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item bg-light rounded text-center h-100 p-5">
                            <i class="fa fa-eye fa-4x text-primary mb-4"></i>
                            <h5 class="mb-3">{{trans('home_trans.Visitor')}}</h5>
                            <h1 class="display-5 mb-0" data-target1="2000">0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('get-started')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('home_trans.Lets talk')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row modal-body">
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.Company Name')}}</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="company_name" value="" >
                            @error('company_name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.Your Name')}}</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="name" value="" >
                            @error('name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.Email')}}</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="email" value="" >
                            @error('email')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row py-2">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.Phone Number')}}</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="phone" value="" >
                            @error('phone')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">{{trans('home_trans.What can Up Lancer do for you?')}}</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios1"  value="option1">
                                        <label class="form-check-label" for="Radios1">
                                            {{trans('home_trans.Create an Amazing New Product')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios2" value="option2" >
                                        <label class="form-check-label" for="Radios2">
                                            {{trans('home_trans.Make my great product even greater')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios3" value="option3">
                                        <label class="form-check-label" for="Radios3">
                                            {{trans('home_trans.Something else')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row py-2">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.Can you tell us more about that?')}}</span>
                            </label>
                            <textarea class="form-control form-control-solid" placeholder="" name="message" ></textarea>
                            @error('message')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">{{trans('home_trans.What is your budget?')}}</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget" id="gridRadios1" value="option1">
                                        <label class="form-check-label" for="gridRadios1">
                                            $1000-$5000
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            $5000-$10,000
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget" id="gridRadios3" value="option3">
                                        <label class="form-check-label" for="gridRadios3">
                                            $10,000-$20,000
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="budget" id="gridRadios4" value="option4">
                                        <label class="form-check-label" for="gridRadios4">
                                            $20,000 or more
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row py-2">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{trans('home_trans.How did you hear about Up Lancer?')}}</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="hear" value="">
                            @error('hear')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">{{trans('home_trans.Submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Discover Our Story')}}</h6>
                        <h1 class="display-5 fw-bold mb-4">
                            {{trans('home_trans.Empower Your Success with')}}
                            <span class="text-primary">{{trans('home_trans.Up Lancer')}}</span> -
                            {{trans('home_trans.Where Excellence Meets Innovation')}}
                        </h1>
                        <div class="row text-center">
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; transition: transform 0.3s ease;">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Innovative Solutions')}}</h6>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; transition: transform 0.3s ease;">
                                    <i class="fas fa-award fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Award-Winning Expertise')}}</h6>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; transition: transform 0.3s ease;">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Customer-Centric')}}</h6>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; transition: transform 0.3s ease;">
                                    <i class="fas fa-shield-alt fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Security & Trust')}}</h6>
                            </div>
                        </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-6 col-md-12">
                    <div class="h-100">
                        <div class="bg-white p-4 shadow-lg rounded mb-4" style="transition: transform 0.3s ease;">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Vision')}}</h3>
                            <p class="text-muted">
                                {{trans('home_trans.At Up Lancer, our vision is to redefine the standards of quality and innovation in every sector we serve. We believe in creating impactful solutions that not only meet the needs of today but anticipate the challenges of tomorrow.')}}
                            </p>
                        </div>
                        <div class="bg-white p-4 shadow-lg rounded" style="transition: transform 0.3s ease;">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Mission')}}</h3>
                            <p class="text-muted">
                                {{trans('home_trans.Our mission is to empower businesses to reach their full potential by providing expert solutions that are innovative, reliable, and tailored to meet the unique goals of each client.')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Services')}}</h6>
                <h1 class="display-6 mb-4">{{trans('home_trans.We Focus On Making The Best In All Sectors')}}</h1>
            </div>
            <div class="row g-4">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item d-block rounded text-center h-100 p-4" href="#" style="border: 1px solid #eee; transition: all 0.3s ease;">
                            <div class="icon-box mb-4">
                                <i class="fa fa-{{ $service->icon }}" style="font-size: 40px; color: #007bff;"></i>
                            </div>
                            <h4 class="mb-0">{{$service->name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center text-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Why Up Lancer?')}}</h6>
                        <h1 class="display-6 mb-4">{{trans('home_trans.Why People Trust Us?')}}</h1>
                        <div class="row g-4 justify-content-center text-center">
                            <!-- Card 1 -->
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" >
                                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <i class="fas fa-lightbulb fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold">{{trans('home_trans.Innovative Solutions')}}</h5>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <i class="fas fa-check-circle fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold">{{trans('home_trans.Quality-Driven Processes')}}</h5>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-md-4 col-sm-6  wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <i class="fas fa-leaf fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold">{{trans('home_trans.Long-Term Value')}}</h5>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <i class="fas fa-users fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold">{{trans('home_trans.Collaborative Partnership')}}</h5>
                                </div>
                            </div>

                            <!-- Card 5 -->
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <i class="fas fa-lock fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold">{{trans('home_trans.Security & Reliability')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="{{route('about')}}" class="btn btn-primary btn-lg rounded-pill px-5">
                        {{trans('home_trans.Learn More')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Our Projects')}}</h6>
                <h1 class="display-6 mb-4">{{trans('home_trans.Learn More About Our Complete Projects')}}</h1>
            </div>
            <div class="row g-4">
            <div class="text-center mt-5">
                <a href="{{route('projects')}}" class="btn btn-primary rounded-pill py-3 px-5">{{trans('home_trans.View All Projects')}}</a>
            </div>
        </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Team Start -->
{{--    <div class="container-xxl py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">--}}
{{--                <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>--}}
{{--                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>--}}
{{--            </div>--}}
{{--            <div class="row g-4">--}}
{{--                @foreach($members as $member)--}}
{{--                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">--}}
{{--                    <div class="team-item text-center p-4">--}}
{{--                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="{{url('images/members/',$member->image)}}" style="width: 80px; height: 220px" alt="">--}}
{{--                        <div class="team-text">--}}
{{--                            <div class="team-title">--}}
{{--                                <h5>{{$member->name}}</h5>--}}
{{--                                <span class="text-primary">{{$member->position}}</span>--}}
{{--                            </div>--}}
{{--                            <div class="team-social">--}}
{{--                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a>--}}
{{--                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->github}}"><i class="fab fa-github"></i></a>--}}
{{--                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    <!-- Project End -->

    <!-- Service Packages Section -->
    <div class="container-xxl  py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Our Service Packages')}}</h6>
                <p class="text-muted">{{ trans('home_trans.Choose the perfect package for your project needs') }}</p>
            </div>

            <div class="row g-4">
                <!-- Service Package Columns Loop -->
                @foreach (['Website Development', 'Graphic Design', 'App Development'] as $serviceType)
                    @php
                        $serviceTypeLower = strtolower(str_replace(' ', '-', $serviceType));
                    @endphp
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="package-type-header {{ $serviceTypeLower }}">
                            <h3>{{ trans('home_trans.' . $serviceType) }}</h3>
                        </div>

                        <!-- Accordion -->
                        <div class="accordion" id="{{ $serviceTypeLower }}Accordion">
                            <!-- Loop Through Packages -->
                            @foreach (['Basic', 'Advanced', 'Pro'] as $packageType)
                                @php
                                    $packageTypeLower = strtolower($packageType);
                                    $accordionId = $serviceTypeLower . '-' . $packageTypeLower;
                                @endphp

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $accordionId }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $accordionId }}" aria-expanded="false" aria-controls="collapse{{ $accordionId }}">
                                            {{ trans('home_trans.' . $packageType) }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $accordionId }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $accordionId }}" data-bs-parent="#{{ $serviceTypeLower }}Accordion">
                                        <div class="accordion-body">
                                            <p class="package-price">
                                                @php
                                                    $price = '';
                                                    switch ($serviceType) {
                                                        case 'Website Development':
                                                            switch ($packageType) {
                                                                case 'Basic': $price = '300$ - 500$'; break;
                                                                case 'Advanced': $price = '800$ - 1,500$'; break;
                                                                case 'Pro': $price = '2,500$ - 5,000$'; break;
                                                            }
                                                            break;
                                                        case 'Graphic Design':
                                                            switch ($packageType) {
                                                                case 'Basic': $price = '200$ - 400$'; break;
                                                                case 'Advanced': $price = '600$ - 900$'; break;
                                                                case 'Pro': $price = '1,200$ - 2,000$'; break;
                                                            }
                                                            break;
                                                        case 'App Development':
                                                            switch ($packageType) {
                                                                case 'Basic': $price = '1,500$ - 3,000$'; break;
                                                                case 'Advanced': $price = '5,000$ - 10,000$'; break;
                                                                case 'Pro': $price = '15,000$ - 30,000$'; break;
                                                            }
                                                            break;
                                                    }
                                                @endphp
                                                {{ $price }}
                                            </p>
                                            <ul>
                                                @php
                                                    $features = [];
                                                    switch ($serviceType) {
                                                        case 'Website Development':
                                                            switch ($packageType) {
                                                                case 'Basic':
                                                                    $features = ['Simple website design', 'Responsive design', 'Social media integration', 'Basic performance optimization', '2 weeks support'];
                                                                    break;
                                                                case 'Advanced':
                                                                    $features = ['Complete website design', 'UI/UX optimization', 'Basic SEO', 'Content management system', '1 month support'];
                                                                    break;
                                                                case 'Pro':
                                                                    $features = ['Custom UI/UX design', 'Advanced SEO', 'Payment gateway integration', 'Marketing tools integration', '3 months support'];
                                                                    break;
                                                            }
                                                            break;
                                                        case 'Graphic Design':
                                                            switch ($packageType) {
                                                                case 'Basic':
                                                                    $features = ['10 Social Media Posts', '1 Cover & Story', 'Limited Revisions', 'PNG & JPG Files'];
                                                                    break;
                                                                case 'Advanced':
                                                                    $features = ['20 Social Media Posts', '2 Covers & 4 Stories', '3 Ad Designs', 'Unlimited Revisions', 'PNG, JPG, PSD Files'];
                                                                    break;
                                                                case 'Pro':
                                                                    $features = ['30 Social Media Posts', 'Covers & Visual Identities', 'Short Motion Graphic Video', 'Professional Ads', 'Branding & Design Consultations'];
                                                                    break;
                                                            }
                                                            break;
                                                        case 'App Development':
                                                            switch ($packageType) {
                                                                case 'Basic':
                                                                    $features = ['Simple Hybrid App', 'Basic Functions & Login', 'One Month Support'];
                                                                    break;
                                                                case 'Advanced':
                                                                    $features = ['Custom App for Android & iOS', 'Database Integration', 'Push Notifications', 'Professional Interfaces', 'Three Months Support'];
                                                                    break;
                                                                case 'Pro':
                                                                    $features = ['Comprehensive App', 'Data Management Control Panel', 'Payment & Security Systems', 'Six Months Support'];
                                                                    break;
                                                            }
                                                            break;
                                                    }
                                                @endphp
                                                @foreach($features as $feature)
                                                    <li>{{ trans('home_trans.' . $feature) }}</li>
                                                @endforeach
                                            </ul>
                                            <a href="https://wa.me/+{{setting()->phone ?? ''}}" target="_blank" class="btn btn-sm btn-outline-light">{{ trans('home_trans.Book Now') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Banner Section -->
        <div class="container text-center py-5">
            <div class="banner-content banner-modern">
                <p class="lead fw-bold animate__animated animate__fadeIn animate__delay-1s text-white">
                    {{ trans('home_trans.Ready to take your project to the next level?') }}
                </p>
                <p class="mb-4 text-white-50 animate__animated animate__fadeIn animate__delay-2s">
                    {{ trans('home_trans.Book your favorite package now and enjoy exclusive prices and offers') }}
                </p>
                <a href="https://wa.me/+{{setting()->phone ?? ''}}" target="_blank" class="btn btn-primary rounded-pill px-4 py-2 animate__animated animate__pulse animate__infinite">
                    {{ trans('home_trans.Book Now') }}
                </a>
            </div>

        </div>
        <!-- End Banner Section -->

    </div>
    <!-- End Service Packages Section -->





    <!-- Start: Up Lancer Process Section -->
    <div class="container-xxl py-5 mt-5 wow fadeInUp" data-wow-delay="0.1s" style="border-top: 1px solid #eaeaea;">
        <div class="container text-center">
            <h2 class="mb-4 display-5 text-primary">{{trans('home_trans.You’re going to love your Up Lancer')}}</h2>
            <p class="text-dark mb-5">{{trans('home_trans.Including the people behind the scenes')}}</p>

            <div class="row g-5 text-start align-items-center justify-content-center">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-pencil-ruler fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">{{trans('home_trans.Tell us about your product')}}</h5>
                        <p class="text-muted">{{trans('home_trans.Share your ideas, and we will turn them into reality. We will gather all your needs to start crafting the perfect solution.')}}</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">{{trans('home_trans.Kick things off with a prototype')}}</h5>
                        <p class="text-muted">{{trans('home_trans.We begin with a working prototype, allowing you to visualize your product and test its core features before moving forward.')}}</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-edit fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">{{trans('home_trans.Make changes before we build')}}</h5>
                        <p class="text-muted">{{trans('home_trans.Once the prototype is reviewed, you can suggest changes. We’ll fine-tune everything to ensure it’s just right.')}}</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">{{trans('home_trans.Get the exact product your users need')}}</h5>
                        <p class="text-muted">{{trans('home_trans.Once all changes are made, we deliver a flawless final product that’s ready to provide an excellent user experience.')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Up Lancer Process Section -->


    <div class="container-xxl py-5">
        <div class="container px-4 sm:px-20 lg:px-28">
            <div class="row align-items-center justify-content-between">
                <!-- Left Text Section -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="display-4 fw-bold text-primary mb-4">
                        {{trans('home_trans.Plug in Up Lancer')}}
                    </h2>
                    <p class="lead text-dark mb-4">
                        {{trans('home_trans.We’ve refined our process from product prototyping to continuous quality.')}}
                    </p>
                    <p class="text-dark mb-4">
                        {{trans('home_trans.Get a new product that works reliably so you can bring it to market quickly and with confidence. Or add a Up Lancer to your distributed team to help lighten your load for an important feature add-on, API product or internal project.')}}
                    </p>
                    <!-- Get Started Button -->
                    <button type="button" class="btn btn-primary px-4 py-2 rounded-pill text-white" data-toggle="modal" data-target="#exampleModal">
                        {{trans('home_trans.Start with Up Lancer')}}
                    </button>
                </div>
                <!-- Right Image Section -->
                <div class="col-lg-6 text-center">
                    <img src="{{asset('images/site/plugin.svg')}}" alt="Plugin" class="img-fluid wow fadeInUp" data-wow-delay="0.1s">
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonial Start -->
{{--  <div class="container-xxl py-5">--}}
{{--      <div class="container">--}}
{{--          <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">--}}
{{--              <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>--}}
{{--              <h1 class="display-6 mb-4">What Our Clients Say!</h1>--}}
{{--          </div>--}}
{{--          <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">--}}
{{--              <div class="testimonial-item bg-light rounded p-4">--}}
{{--                  <div class="d-flex align-items-center mb-4">--}}
{{--                      <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-1.jpg" alt="">--}}
{{--                      <div class="ms-4">--}}
{{--                          <h5 class="mb-1">Client Name</h5>--}}
{{--                          <span>Profession</span>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
{{--              </div>--}}
{{--              <div class="testimonial-item bg-light rounded p-4">--}}
{{--                  <div class="d-flex align-items-center mb-4">--}}
{{--                      <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-2.jpg" alt="">--}}
{{--                      <div class="ms-4">--}}
{{--                          <h5 class="mb-1">Client Name</h5>--}}
{{--                          <span>Profession</span>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
{{--              </div>--}}
{{--              <div class="testimonial-item bg-light rounded p-4">--}}
{{--                  <div class="d-flex align-items-center mb-4">--}}
{{--                      <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-3.jpg" alt="">--}}
{{--                      <div class="ms-4">--}}
{{--                          <h5 class="mb-1">Client Name</h5>--}}
{{--                          <span>Profession</span>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
{{--              </div>--}}
{{--              <div class="testimonial-item bg-light rounded p-4">--}}
{{--                  <div class="d-flex align-items-center mb-4">--}}
{{--                      <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-4.jpg" alt="">--}}
{{--                      <div class="ms-4">--}}
{{--                          <h5 class="mb-1">Client Name</h5>--}}
{{--                          <span>Profession</span>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--  </div>--}}
    <!-- Testimonial End -->



@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#exampleModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- JavaScript for Counter Animation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const counters = document.querySelectorAll("[data-target1]");
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target1");
                    const count = +counter.innerText;

                    const increment = target / 200; // Adjust speed here

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 20); // Update every 20ms
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        });
    </script>

@endsection
