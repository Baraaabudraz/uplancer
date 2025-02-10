@extends('Front.parent')
@section('title',trans('home_trans.Home'))

@section('keywords',setting()->meta_keyword ?? '')
@section('description',setting()->meta_description ?? '')

@section('og:title',trans('home_trans.Home'))
@section('og:keywords',setting()->meta_keyword ?? '')
@section('og:description',setting()->meta_description ?? '')

@section('styles')

<style>
    .process-step {
        transition: all 0.3s ease;
    }

    .process-step:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .step-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }

    .process-step h5 {
        font-size: 18px;
        color: #333;
    }

    .process-step p {
        font-size: 14px;
        color: #666;
    }

    .bg-light {
        background-color: #f9f9f9;
    }

    .display-5 {
        font-size: 2.5rem;
    }
    .hero h1 {
        line-height: 1.3; /* تحسين التباعد بين أسطر العنوان */
    }

    .hero ul li span {
        font-weight: 500; /* جعل النصوص أكثر وضوحًا */
    }

</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="container-fluid hero bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4">
                        {{ trans('home_trans.Software Development for Businesses & Founders') }}
                    </h1>
                    <ul class="list-unstyled fs-5 mt-4">
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
                    <button type="button"  class="btn btn-primary btn-lg mt-4 px-4 py-2 rounded-pill text-white" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('home_trans.Start with Up Lancer') }}
                    </button>
                </div>

                <!-- Image Content -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/site/hero-team.svg') }}" alt="Business Illustration" class="img-fluid w-100 max-height-400">
                </div>
            </div>
        </div>
    </section>


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

    <!-- Facts Start -->

    <!-- Facts End -->

    <!-- Section: Statistics Counter -->
    <div class="container-fluid py-5 bg-light wow fadeInUp">
        <div class="container text-center">
            <div class="row g-4">
                <!-- Projects Completed -->
                <div class="col-md-4">
                    <div class="counter-item d-flex flex-column align-items-center">
                        <div class="icon-wrapper bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-tasks fa-2x"></i>
                        </div>
                        <h2 class="display-5 fw-bold text-primary mb-1" data-target1="150">0</h2>
                        <p class="text-muted mb-0">{{ trans('home_trans.Projects Completed') }}</p>
                    </div>
                </div>
                <!-- Happy Clients -->
                <div class="col-md-4">
                    <div class="counter-item d-flex flex-column align-items-center">
                        <div class="icon-wrapper bg-success text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-smile fa-2x"></i>
                        </div>
                        <h2 class="display-5 fw-bold text-success mb-1" data-target1="120">0</h2>
                        <p class="text-muted mb-0">{{ trans('home_trans.Satisfied Customers') }}</p>
                    </div>
                </div>
                <!-- Website Visitors -->
                <div class="col-md-4">
                    <div class="counter-item d-flex flex-column align-items-center">
                        <div class="icon-wrapper bg-warning text-white rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h2 class="display-5 fw-bold text-warning mb-1" data-target1="600">0</h2>
                        <p class="text-muted mb-0">{{ trans('home_trans.Visitor') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section: Statistics Counter -->

    <!-- About Start -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6">
                    <div>
                        <h6 class="section-title text-start text-primary mb-3">{{trans('home_trans.Discover Our Story')}}</h6>
                        <h1 class="display-5 fw-bold mb-4">
                            {{trans('home_trans.Empower Your Success with')}}
                            <span class="text-primary">{{trans('home_trans.Up Lancer')}}</span> -
                            {{trans('home_trans.Where Excellence Meets Innovation')}}
                        </h1>
                        <div class="row text-center">
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Innovative Solutions')}}</h6>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="fas fa-award fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Award-Winning Expertise')}}</h6>
                            </div>
                            <div class="col-6">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Customer-Centric')}}</h6>
                            </div>
                            <div class="col-6">
                                <div class="feature-icon bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="fas fa-shield-alt fa-2x"></i>
                                </div>
                                <h6 class="mt-3 fw-bold">{{trans('home_trans.Security & Trust')}}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="h-100">
                        <div class="bg-white p-4 shadow-lg rounded mb-4">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Vision')}}</h3>
                            <p class="text-muted">
                                {{trans('home_trans.At Up Lancer, our vision is to redefine the standards of quality and innovation in every sector we serve. We believe in creating impactful solutions that not only meet the needs of today but anticipate the challenges of tomorrow.')}}
                            </p>
                        </div>
                        <div class="bg-white p-4 shadow-lg rounded">
                            <h3 class="text-primary mb-3">{{trans('home_trans.Our Mission')}}</h3>
                            <p class="text-muted">
                                {{trans('home_trans.Our mission is to empower businesses to reach their full potential by providing expert solutions that are innovative, reliable, and tailored to meet the unique goals of each client.')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <div class="container-fluid py-5 bg-light wow fadeInUp">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <h6 class="section-title text-uppercase text-primary mb-2">{{ trans('home_trans.Why Up Lancer?') }}</h6>
                <h2 class="display-5 fw-bold">{{ trans('home_trans.Why People Trust Us?') }}</h2>
            </div>

            <!-- Content Cards -->
            <div class="row g-4 justify-content-center text-center">
                <!-- Card 1 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white" >
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-lightbulb fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">{{ trans('home_trans.Innovative Solutions') }}</h5>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">{{ trans('home_trans.Quality-Driven Processes') }}</h5>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4 col-sm-6  wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-leaf fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">{{ trans('home_trans.Long-Term Value') }}</h5>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">{{ trans('home_trans.Collaborative Partnership') }}</h5>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
                        <div class="icon-wrapper mx-auto mb-3">
                            <i class="fas fa-lock fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">{{ trans('home_trans.Security & Reliability') }}</h5>
                    </div>
                </div>
            </div>

            <!-- Call-to-Action -->
            <div class="text-center mt-5">
                <a href="{{ route('about') }}" class="btn btn-primary btn-lg rounded-pill px-5">
                    {{ trans('home_trans.Learn More') }}
                </a>
            </div>
        </div>
    </div>


    <!-- Feature End -->

    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Our Projects')}}</h6>
                <h1 class="display-6 mb-4">{{trans('home_trans.Learn More About Our Complete Projects')}}</h1>
            </div>
            <div class="row g-4">
{{--                @foreach($projects as $project)--}}
{{--                <div class="col-md-4" >--}}
{{--                    <div class="project-item shadow-lg rounded p-3 h-100">--}}
{{--                        <div class="position-relative mb-3">--}}
{{--                            <img class="img-fluid rounded lazyload" loading="lazy" src="{{Storage::url($project->thumbnail)}}" alt="{{$project->alt}}">--}}
{{--                                <div class="overlay">--}}
{{--                                    <a href="{{route('project-show',$project->slug)}}" class="view-icon">--}}
{{--                                        <i class="fa fa-eye fa-2x"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                        </div>--}}
{{--                        <h6 class="text-primary">{{$project->name}}</h6>--}}
{{--                            <span>{{Str::limit($project->description,120)}}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--                @endforeach--}}
            <div class="text-center mt-5">
                <a href="{{route('projects')}}" class="btn btn-primary rounded-pill py-3 px-5">{{trans('home_trans.View All Projects')}}</a>
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
    </div>


    <!-- Service Packages Section -->
{{--    <section class="py-5" style="background-color: #f8f9fa;">--}}
{{--        <div class="container text-center">--}}
{{--            <h2 class="fw-bold mb-4 text-primary">{{ trans('home_trans.Our Service Packages') }}</h2>--}}
{{--            <p class="text-muted mb-5">{{ trans('home_trans.Choose the perfect package for your project needs') }}</p>--}}

{{--            <div class="row g-4">--}}
{{--                <!-- Web and Mobile App Development Package -->--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="card h-100 shadow-sm border-0">--}}
{{--                        <div class="card-body d-flex flex-column justify-content-between">--}}
{{--                            <h4 class="fw-bold text-primary">{{ trans('home_trans.Web & Mobile App Development') }}</h4>--}}
{{--                            <p class="text-muted">{{ trans('home_trans.Get tailored, robust, and innovative web and mobile apps for your business') }}</p>--}}
{{--                            <a href="{{ route('services') }}" class="btn btn-outline-primary w-100">{{ trans('home_trans.Order Now') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Graphic Design Package -->--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="card h-100 shadow-sm border-0">--}}
{{--                        <div class="card-body d-flex flex-column justify-content-between">--}}
{{--                            <h4 class="fw-bold text-success">{{ trans('home_trans.Graphic Design') }}</h4>--}}
{{--                            <p class="text-muted">{{ trans('home_trans.Visually stunning and creative designs tailored to your branding needs.') }}</p>--}}
{{--                            <a href="{{ route('services') }}" class="btn btn-outline-success w-100">{{ trans('home_trans.Learn More') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- SEO Optimization Package -->--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="card h-100 shadow-sm border-0">--}}
{{--                        <div class="card-body d-flex flex-column justify-content-between">--}}
{{--                            <h4 class="fw-bold text-warning">{{ trans('home_trans.SEO Optimization') }}</h4>--}}
{{--                            <p class="text-muted">{{ trans('home_trans.Enhance your visibility on search engines and attract more customers.') }}</p>--}}
{{--                            <a href="{{ route('services') }}" class="btn btn-outline-warning w-100">{{ trans('home_trans.Learn More') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Custom Projects Package -->--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="card h-100 shadow-sm border-0">--}}
{{--                        <div class="card-body d-flex flex-column justify-content-between">--}}
{{--                            <h4 class="fw-bold text-danger">{{ trans('home_trans.Custom Projects') }}</h4>--}}
{{--                            <p class="text-muted">{{ trans('home_trans.Your project deserves a unique package tailored to its specific needs.') }}</p>--}}
{{--                            <a href="{{ route('contact') }}" class="btn btn-outline-danger w-100">{{ trans('home_trans.Contact Us') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



    <!-- Start: Up Lancer Process Section -->
    <div class="container-fluid bg-light py-5 mt-5 wow fadeInUp" data-wow-delay="0.1s" style="border-top: 1px solid #eaeaea;">
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

    <section class="bg-light py-5">
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
    </section>


    <!-- End: Up Lancer Process Section -->
    <!-- Team End -->

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
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
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
