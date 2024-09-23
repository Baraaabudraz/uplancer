@extends('Front.parent')
@section('title','Home')
@section('styles')
@endsection
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}" aria-current="{{$key == 0 ? 'true' : ''}}" aria-label="Slide {{$key + 1}}">
                        <img class="img-fluid" src="{{asset('images/sliders/'.$slider->image)}}" alt="Image">
                    </button>
                @endforeach
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img class="w-100" src="{{asset('images/sliders/'.$slider->image)}}" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 1500px;">
                                <h4 class="text-white text-uppercase mb-4 animated zoomIn"></h4>
                                <h1 class="display-3 text-white mb-0 animated zoomIn">{{$slider->description}}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Carousel End -->


    <!-- Facts Start -->

    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl bg-light">
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
                            <p class="text-muted">
                                At Up Lancer, our vision is to redefine the standards of quality and innovation in every sector we serve. We believe in creating impactful solutions that not only meet the needs of today but anticipate the challenges of tomorrow.
                            </p>
                        </div>
                        <div class="p-4 bg-white shadow-lg rounded">
                            <h3 class="text-primary mb-3">Our Mission</h3>
                            <p class="text-muted">
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
    <div class="container-xxl py-5 bg-light">
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
                                    <p>At UP Lancer, we don’t just follow trends – we set them. Our team is committed to innovation, delivering cutting-edge web and mobile solutions.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Quality-Driven Processes</h5>
                                    <p>Our development process ensures timely delivery and the highest standards of quality.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-leaf fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Long-Term Value</h5>
                                    <p>We focus on mas-customization and long-term, helping your business grow without frequent redevelopments.</p>
                                </div>
                            </div>

                            <div class="why-item mb-4 d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Collaborative Partnership</h5>
                                    <p>We work closely with our clients to tailor solutions to their needs and business goals.</p>
                                </div>
                            </div>

                            <div class="why-item d-flex align-items-start" data-animate="fade-up">
                                <div class="icon-wrapper bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-lock fa-2x"></i>
                                </div>
                                <div>
                                    <h5>Security & Reliability</h5>
                                    <p>We provide secure and robust solutions to protect your data and operations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white p-5 rounded shadow-lg text-center">
                        <h3 class="mb-4 text-primary">Why Trust Us?</h3>
                        <p class="text-muted">{{$settings->why_us}}</p>
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
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
                <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
            </div>
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-md-4">
                    <div class="project-item shadow-lg rounded p-3 h-100">
                        <div class="position-relative mb-3">
                            <img class="img-fluid rounded" src="{{asset('images/projects/'.json_decode($project->images)[0])}}" alt="">
                                <div class="overlay">
                                    <a href="{{route('project-show',$project->id)}}" class="view-icon">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                </div>
                        </div>
                        <h6 class="text-primary">{{$project->name}}</h6>
                        </a>
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
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>
                <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
            </div>
            <div class="row g-4">
                @foreach($members as $member)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center p-4">
                        <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="{{asset('images/members/'.$member->image)}}" style="width: 80px; height: 220px" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>{{$member->name}}</h5>
                                <span class="text-primary">{{$member->position}}</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->github}}"><i class="fab fa-github"></i></a>
                                <a class="btn btn-square btn-primary rounded-circle" href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>
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

@endsection
