@extends('Front.parent')
@section('title','Contact Us')
@section('styles')
    <!-- Custom CSS -->
    <style>
        .contact-info {
            background-color: #fff;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .contact-info .icon {
            background-color: #f8f9fa;
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .contact-info:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-info h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection
@section('content')

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Get In Touch</h6>
                <h1 class="display-6 mb-4">We'd Love To Hear From You!</h1>
            </div>
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="contact-info text-center rounded p-4 shadow wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon mb-4">
                            <i class="fa fa-phone-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Call Us</h5>
                        <p class="mb-2">{{$settings->phone}}</p>
                    </div>
                    <div class="contact-info text-center rounded p-4 shadow wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon mb-4">
                            <i class="fa fa-envelope fa-3x text-primary"></i>
                        </div>
                        <h5 class="mb-3">Email Us</h5>
                        <p class="mb-2">{{$settings->email}}</p>
                    </div>
{{--                    <div class="contact-info text-center rounded p-4 shadow wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                        <div class="icon mb-4">--}}
{{--                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>--}}
{{--                        </div>--}}
{{--                        <h5 class="mb-3">Visit Us</h5>--}}
{{--                        <p class="mb-2">123 Street, City, Country</p>--}}
{{--                    </div>--}}
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <p class="text-center mb-4">Get in touch with us now to start your journey towards success. Our team is ready to assist you with your inquiries and provide the best solutions for your needs.</p>
                        <form action="{{route('send-contact-form')}}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                    @error('name')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                    @error('email')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="tobic" class="form-control" id="tobic" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                    @error('subject')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                    @error('message')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>

                        <!-- WhatsApp Contact -->
                        <div class="col-12 text-center mt-4">
                            <a class="btn btn-success rounded-pill py-3 px-5" href="https://wa.me/+970597644664" target="_blank">
                                <i class="fa fa-whatsapp me-3"></i>Contact Us on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<!-- Google Map Start -->
<!--    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">-->
<!--        <iframe class="w-100 mb-n2" style="height: 450px;"-->
<!--            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"-->
<!--            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
<!--    </div>-->
    <!-- Google Map End -->

@endsection
