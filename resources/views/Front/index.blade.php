@extends('Front.parent')
@section('title','Home')
@section('styles','')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="{{asset('uplancer/img/carousel-1.jpg')}}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="{{asset('/uplancer/img/carousel-2.jpg')}}" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="{{asset('/uplancer/img/carousel-3.jpg')}}" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="w-100" src="{{asset('/uplancer/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 1500px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn"></h4>
                            <h1 class="display-3 text-white mb-0 animated zoomIn">Unlock Your Digital Potential with Our Expert Guidance</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('/uplancer/img/carousel-2.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 1500px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn">Up Lancer</h4>
                            <h1 class="display-3 text-white mb-0 animated zoomIn">Your Trusted Partner  in Creative and Innovative Digital Solutions.</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('/uplancer/img/carousel-3.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 3000px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn"></h4>
                            <h1 class="display-4 text-white mb-0 animated zoomIn">Transform Your Vision into Reality with Up Lancer's Professional Services.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->

    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{asset('/uplancer/img/about.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>

                        <h1 class="display-6 mb-4"># Empower Your Success with <span class="text-primary">Up Lancer</span>- Where Excellence Meets Innovation </h1>
                        <p>Welcome to UP Lancer, the place where creativity and technological advancements converge. Allow us to assist you in realizing your vision and transforming your ideas into reality through our specialized team in web and mobile development, user interface design, and marketing. Join us and embark on a distinctive journey of programming, design, and marketing that will propel you to new heights.</p>
                        <!--                        <p class="mb-4"></p>-->
                        <!--                        <div class="d-flex align-items-center mb-4 pb-2">-->
                        <!--                            <img class="flex-shrink-0 " src="/uplancer/logo/up-lancer-team-logo.png" alt="" style="width: 80px; height: 50px;">-->
                        <!--&lt;!&ndash;                            <div class="ps-4">&ndash;&gt;-->
                        <!--&lt;!&ndash;                                <h6>Jhon Doe</h6>&ndash;&gt;-->
                        <!--&lt;!&ndash;                                <small>SEO & Founder</small>&ndash;&gt;-->
                        <!--&lt;!&ndash;                            </div>&ndash;&gt;-->
                        <!--                        </div>-->
                        <!--                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>-->
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
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="display-6 mb-4">We Focuse On Making The Best In All Sectors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-1.jpg')}}" alt="">
                        <h4 class="mb-0">Web Development</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-2.jpg')}}" alt="">
                        <h4 class="mb-0">Mobile App Development</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-3.jpg')}}" alt="">
                        <h4 class="mb-0">SEO</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-4.jpg')}}" alt="">
                        <h4 class="mb-0">Social Media Marketing</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-5.jpg')}}" alt="">
                        <h4 class="mb-0">Graphic Design</h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="#">
                        <img class="img-fluid rounded mb-4" src="{{asset('/uplancer/img/service-6.jpg')}}" alt="">
                        <h4 class="mb-0">UI/UX Design</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
                        <h1 class="display-6 mb-4">Why People Trust Us?</h1>
                        <p class="mb-4">At UP Lancer, we have earned the trust and confidence of our clients by consistently delivering excellent results and maintaining a strong track record of success. Here are the key factors that contribute to the trust our clients place in us:</p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="skill">
                                    <div class="justify-content-between">
                                        <p class="mb-1">Expertise: </p>
                                        <p class="mb-4">UP Lancer is home to a team of highly skilled professionals specializing in web development, mobile app development, UI/UX design, and digital marketing. Clients trust our team for their extensive knowledge and ability to provide exceptional solutions.</p>
                                    </div>
                                    <!--                                    <div class="progress">-->
                                    <!--                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>-->
                                    <!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="justify-content-between">
                                        <p class="mb-1">Track Record:</p>
                                        <p class="mb-2">We have a proven track record of completing projects on time and exceeding client expectations, showcasing our ability to consistently deliver high-quality outcomes.</p>
                                    </div>
                                    <!--                                    <div class="progress">-->
                                    <!--                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>-->
                                    <!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skill">
                                    <div class="justify-content-between">
                                        <p class="mb-1">Client-Centric Approach: </p>
                                        <p class="mb-2">We prioritize the needs and goals of our clients. We invest time in understanding their unique requirements and tailor our solutions accordingly. Our client-centric approach ensures personalized experiences and solutions that align precisely with their vision.</p>
                                    </div>
                                    <!--                                    <div class="progress">-->
                                    <!--                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>-->
                                    <!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{asset('uplancer/img/feature.jpg')}}" alt="">
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
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="project-item border rounded h-100 p-4" data-dot="01" >
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.01.32.jpg')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.01.32.jpg')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>Elektra Store (Mobile App)</h6>
                    <span>Thousands of products with free home delivery.</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="02">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.01.51.jpg')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.01.51.jpg')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>Budget Planner (Mobile App)</h6>
                    <span>App It allows you to create a personalized monthly budget that helps you control your finances.</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="03">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.02.12.jpg')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/mobile app/WhatsApp Image 2023-05-25 at 15.02.12.jpg')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>B Store</h6>
                    <span>An online store application to purchase products.</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="04">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/portfolio/seo/2022-12-30_17h07_15.png')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/seo/2022-12-30_17h07_15.png')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>On-page and Technical SEO</h6>
                    <span>In the past 28 days, we successfully improved the number of organic clicks and impressions for an ecommerce store.</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="05">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/portfolio/seo/2023-01-13_21h22_33.png')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/seo/2023-01-13_21h22_33.png')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>Keyword Research and On-page SEO for Ecommerce Stores</h6>
                    <span>In the past 28 days, we achieved remarkable results for an ecommerce store by increasing the total revenue by 278.6% and boosting the conversion rate by 49.5%.</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="06">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/portfolio/Web/EMS.jpg')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/portfolio/Web/EMS Dashboard.png')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>Employee Management System (Web App)</h6>
                    <span>Web system for Employee Management</span>
                </div>
                <div class="project-item border rounded h-100 p-4" data-dot="07">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="{{asset('/uplancer/img/project-10.jpg')}}" style="object-fit: cover; height: 155px" alt="">
                        <a href="{{asset('/uplancer/img/project-10.jpg')}}" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6>UI / UX Design</h6>
                    <span>Digital agency website design and development</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Team Start -->

    <!-- Team End -->


    <!-- Testimonial Start -->
    <!--    <div class="container-xxl py-5">-->
    <!--        <div class="container">-->
    <!--            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
    <!--                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>-->
    <!--                <h1 class="display-6 mb-4">What Our Clients Say!</h1>-->
    <!--            </div>-->
    <!--            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                <div class="testimonial-item bg-light rounded p-4">-->
    <!--                    <div class="d-flex align-items-center mb-4">-->
    <!--                        <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-1.jpg" alt="">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Client Name</h5>-->
    <!--                            <span>Profession</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
    <!--                </div>-->
    <!--                <div class="testimonial-item bg-light rounded p-4">-->
    <!--                    <div class="d-flex align-items-center mb-4">-->
    <!--                        <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-2.jpg" alt="">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Client Name</h5>-->
    <!--                            <span>Profession</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
    <!--                </div>-->
    <!--                <div class="testimonial-item bg-light rounded p-4">-->
    <!--                    <div class="d-flex align-items-center mb-4">-->
    <!--                        <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-3.jpg" alt="">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Client Name</h5>-->
    <!--                            <span>Profession</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
    <!--                </div>-->
    <!--                <div class="testimonial-item bg-light rounded p-4">-->
    <!--                    <div class="d-flex align-items-center mb-4">-->
    <!--                        <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-4.jpg" alt="">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Client Name</h5>-->
    <!--                            <span>Profession</span>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!-- Testimonial End -->


@endsection
@section('scripts')

@endsection
