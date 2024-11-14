@extends('Front.parent')
@section('title','Home')
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

</style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 font-weight-bold ">Software Development for Businesses & Founders</h1>
                    <p class="lead mt-4"></p>
                    <ul class="list-unstyled  mt-4" style="font-size: 22px; color: black">
                        <li class="mb-2">
                            <i class="fa fa-check-circle text-primary"></i> Skilled in development, design, & marketing.
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-circle text-primary"></i> Acquire a high-performing distributed team.
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-circle text-primary"></i> Trusted by founders for cost-effective solutions.
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-lg mt-3" data-toggle="modal" data-target="#exampleModal">Get Started</button>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/site/hero-team.svg')}}" alt="Business Illustration" class="img-fluid">
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
                        <h5 class="modal-title">Let's talk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row modal-body">
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Company Name</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="company_name" value="" >
                            @error('company_name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Name</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="name" value="" >
                            @error('name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Email</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="email" value="" >
                            @error('email')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row py-2">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Phone Number</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="phone" value="" >
                            @error('phone')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">What can Up Lancer do for you?</span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios1"  value="option1">
                                        <label class="form-check-label" for="Radios1">
                                            Create an Amazing New Product
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios2" value="option2" >
                                        <label class="form-check-label" for="Radios2">
                                            Make my great product even greater
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="service" id="Radios3" value="option3">
                                        <label class="form-check-label" for="Radios3">
                                            Something else
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-md-12 d-flex flex-column mb-8 fv-row py-2">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Can you tell us more about that?</span>
                            </label>
                            <textarea class="form-control form-control-solid" placeholder="" name="message" ></textarea>
                            @error('message')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">What is your budget?</span>
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
                                <span class="required">How did you hear about Up Lancer?</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="" name="hear" value="">
                            @error('hear')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Facts Start -->

    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title text-start text-primary">About Us</h6>
                        <h1 class="display-6 mb-4">
                            Empower Your Success with <span class="text-primary">Up Lancer</span> - Where Excellence Meets Innovation
                        </h1>
                        <p class="lead text-muted mb-4">
{{--                            {{$settings->about}}--}}
                        </p>

                        <div class="row mb-4">
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-lightbulb fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">Innovative Solutions</h5>
                            </div>
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-award fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">Award-Winning Expertise</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">Customer-Centric</h5>
                            </div>
                            <div class="col-6 text-center">
                                <div class="bg-white rounded-circle p-3 shadow-sm mb-3" style="width: 80px; height: 80px; margin: 0 auto;">
                                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                                </div>
                                <h5 class="mb-0">Security & Trust</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        <div class="p-4 bg-white shadow-lg rounded mb-4">
                            <h3 class="text-primary mb-3">Our Vision</h3>
                            <p class="text-dark">
                                At Up Lancer, our vision is to redefine the standards of quality and innovation in every sector we serve. We believe in creating impactful solutions that not only meet the needs of today but anticipate the challenges of tomorrow.
                            </p>
                        </div>
                        <div class="p-4 bg-white shadow-lg rounded">
                            <h3 class="text-primary mb-3">Our Mission</h3>
                            <p class="text-dark">
                                Our mission is to empower businesses to reach their full potential by providing expert solutions that are innovative, reliable, and tailored to meet the unique goals of each client.
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
                <h1 class="display-6 mb-4">We Focus On Making The Best In All Sectors</h1>
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
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title text-start text-primary">Why Choose Us</h6>
                        <h1 class="display-6 mb-4">Why People Trust Us?</h1>
                        <div class="why-us-content">
                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Innovative Solutions</h5>
                                    <p class="text-muted">At UP Lancer, we don’t just follow trends – we set them. Our team is committed to innovation, delivering cutting-edge web and mobile solutions.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Quality-Driven Processes</h5>
                                    <p class="text-muted">Our development process ensures timely delivery and the highest standards of quality.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-leaf fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Long-Term Value</h5>
                                    <p class="text-muted">We focus on mas-customization and long-term, helping your business grow without frequent redevelopments.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Collaborative Partnership</h5>
                                    <p class="text-muted">We work closely with our clients to tailor solutions to their needs and business goals.</p>
                                </div>
                            </div>

                            <div class="why-item d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-lock fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Security & Reliability</h5>
                                    <p class="text-muted">We provide secure and robust solutions to protect your data and operations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white p-5 rounded shadow-lg text-center">
                        <h3 class="mb-4 text-primary">Why Trust Us?</h3>
                        <p class="text-dark">{{$settings->why_us}}</p>
                        <a href="{{route('about')}}" class="btn btn-primary rounded-pill py-3 px-5">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature End -->

    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
                <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
            </div>
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="project-item shadow-lg rounded p-3 h-100">
                        <div class="position-relative mb-3">
                            <img class="img-fluid rounded lazyload"   src="{{url('images/projects/',json_decode($project->images)[0])}}" alt="">
                                <div class="overlay">
                                    <a href="{{route('project-show',$project->id)}}" class="view-icon">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                </div>
                        </div>
                        <h6 class="text-primary">{{$project->name}}</h6>
                            <span>{{Str::limit($project->description,120)}}</span>
                </div>
            </div>
                @endforeach
            <div class="text-center mt-5">
                <a href="{{route('projects')}}" class="btn btn-primary rounded-pill py-3 px-5">View All Projects</a>
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
    <!-- Start: Up Lancer Process Section -->
    <div class="container-fluid bg-light py-5 mt-5 wow fadeInUp" data-wow-delay="0.1s" style="border-top: 1px solid #eaeaea;">
        <div class="container text-center">
            <h2 class="mb-4 display-5 text-primary">You’re going to love your Up Lancer</h2>
            <p class="text-dark mb-5">Including the people behind the scenes.</p>

            <div class="row g-5 text-start align-items-center justify-content-center">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-pencil-ruler fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Tell us about your product</h5>
                        <p class="text-muted">Share your ideas, and we'll turn them into reality. We'll gather all your needs to start crafting the perfect solution.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Kick things off with a prototype</h5>
                        <p class="text-muted">We begin with a working prototype, allowing you to visualize your product and test its core features before moving forward.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-edit fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Make changes before we build</h5>
                        <p class="text-muted">Once the prototype is reviewed, you can suggest changes. We’ll fine-tune everything to ensure it’s just right.</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="process-step bg-white rounded shadow p-4 h-100">
                        <div class="step-icon mb-4">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Get the exact product your users need</h5>
                        <p class="text-muted">Once all changes are made, we deliver a flawless final product that’s ready to provide an excellent user experience.</p>
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
                        Plug in Up Lancer
                    </h2>
                    <p class="lead text-dark mb-4">
                        We’ve refined our process from product prototyping to continuous quality.
                    </p>
                    <p class="text-dark mb-4">
                        Get a new product that works reliably so you can bring it to market quickly and with confidence. Or add a Up Lancer to your distributed team to help lighten your load for an important feature add-on, API product or internal project.
                    </p>
                    <!-- Get Started Button -->
                    <button type="button" class="btn btn-primary px-4 py-2 rounded-pill text-white" data-toggle="modal" data-target="#exampleModal">
                        Get Started
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

@endsection
