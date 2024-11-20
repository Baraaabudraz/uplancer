@extends('Front.parent')
@section('title','Services')
@section('content')

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
        {{$services->links()}}
    </div>

    <!-- Service End -->


<!-- Testimonial Start -->
<!--<div class="container-xxl py-5">-->
<!--    <div class="container">-->
<!--        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
<!--            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>-->
<!--            <h1 class="display-6 mb-4">What Our Clients Say!</h1>-->
<!--        </div>-->
<!--        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
<!--            <div class="testimonial-item bg-light rounded p-4">-->
<!--                <div class="d-flex align-items-center mb-4">-->
<!--                    <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-1.jpg" alt="">-->
<!--                    <div class="ms-4">-->
<!--                        <h5 class="mb-1">Client Name</h5>-->
<!--                        <span>Profession</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
<!--            </div>-->
<!--            <div class="testimonial-item bg-light rounded p-4">-->
<!--                <div class="d-flex align-items-center mb-4">-->
<!--                    <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-2.jpg" alt="">-->
<!--                    <div class="ms-4">-->
<!--                        <h5 class="mb-1">Client Name</h5>-->
<!--                        <span>Profession</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
<!--            </div>-->
<!--            <div class="testimonial-item bg-light rounded p-4">-->
<!--                <div class="d-flex align-items-center mb-4">-->
<!--                    <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-3.jpg" alt="">-->
<!--                    <div class="ms-4">-->
<!--                        <h5 class="mb-1">Client Name</h5>-->
<!--                        <span>Profession</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
<!--            </div>-->
<!--            <div class="testimonial-item bg-light rounded p-4">-->
<!--                <div class="d-flex align-items-center mb-4">-->
<!--                    <img class="flex-shrink-0 rounded-circle border p-1" src="/uplancer/img/testimonial-4.jpg" alt="">-->
<!--                    <div class="ms-4">-->
<!--                        <h5 class="mb-1">Client Name</h5>-->
<!--                        <span>Profession</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Testimonial End -->


@endsection
