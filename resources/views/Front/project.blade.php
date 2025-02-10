@extends('Front.parent')
@section('title',trans('home_trans.Projects'))
@section('keywords',setting()->meta_keyword ?? '')
@section('description',trans('home_trans.Explore Up Lancer projects that merge creativity and technology to turn your ideas into reality'))

@section('og:title',trans('home_trans.Projects'))
@section('og:keywords',setting()->meta_keyword ?? '')
@section('og:description',trans('home_trans.Explore Up Lancer projects that merge creativity and technology to turn your ideas into reality'))
@section('styles')
    <!-- Custom CSS -->
    <style>
        .project-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .project-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
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
            transition: color 0.3s ease;
        }

        .view-icon:hover {
            color: #ffcc00;
        }

        h6 {
            font-weight: bold;
        }

        p {
            color: #6c757d;
        }

    </style>
@endsection
@section('content')

    <!-- Projects Page Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">{{trans('home_trans.Our Projects')}}</h6>
                <h1 class="display-6 mb-4">{{trans('home_trans.Learn More About Our Complete Projects')}}</h1>
            </div>
            <div class="row g-4">
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="project-item shadow-lg rounded p-3 h-100">
                            <div class="position-relative mb-3">
                                <img class="img-fluid rounded lazyload" src="{{Storage::url($project->thumbnail)}}" loading="lazy" alt="">
                                <div class="overlay">
                                    <a href="{{route('project-show',$project->slug)}}" class="view-icon">
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
    <!-- Projects Page End -->
@endsection
