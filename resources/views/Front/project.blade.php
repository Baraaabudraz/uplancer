@extends('Front.parent')
@section('title','Projects')
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
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
                <h1 class="display-6 mb-4">Discover Our Latest Projects</h1>
            </div>

            <!-- Grid of Projects -->
            <div class="row g-4">
                @foreach($projects as $project)
                <!-- Project 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="project-item shadow-lg rounded p-3 h-100">
                        <div class="position-relative mb-3">
                            <img class="img-fluid rounded" src="{{url('images/projects/'.json_decode($project->images)[0])}}" alt="Project">
                            <div class="overlay">
                                <a href="{{route('project-show',$project->id)}}" class="view-icon">
                                    <i class="fa fa-eye fa-2x"></i>
                                </a>
                            </div>
                        </div>
                        <h6 class="mb-2">{{$project->name}}</h6>
                        <p>{{$project->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            {{$projects->links()}}
        </div>
    </div>
    <!-- Projects Page End -->
@endsection
