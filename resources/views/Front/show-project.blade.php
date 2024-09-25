@extends('Front.parent')
@section('title', $project->name)
<link href="{{asset('uplancer/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
@section('styles')
    <style>
        .project-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-image:hover img {
            transform: scale(1.05);
        }
    </style>
@endsection
@section('content')
    <!-- Project Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4">
                        @foreach(json_decode($project->images) as $image)
                            <div class="col-md-6">
                                <div class="project-image">
                                    <a href="{{ asset('images/projects/'.$image) }}" data-lightbox="project-gallery">
                                        <img class="img-fluid rounded" src="{{ asset('images/projects/'.$image) }}" alt="Project Image">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-6">{{ $project->name }}</h1>
                    <p class="mb-4">{{ $project->description }}</p>

                    <ul class="list-unstyled mb-4">
{{--                        <li><strong>Client:</strong> </li>--}}
                        <li><strong>Date:</strong> {{ $project->created_at->format('F j, Y') }}</li>
                        <li><strong>Category:</strong> {{ $project->service->name }}</li>
                        <li><strong>Technology:</strong> {{ $project->technology }}</li>
                    </ul>

{{--                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5" target="_blank">Visit Project</a>--}}
                </div>
            </div>

            <div class="row g-5 mt-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="mb-4">Project Features</h2>
                    @if(json_decode($project->features))
                        <ul class="list-group list-group-flush">
                            @foreach(json_decode($project->features) as $feature)
                                <li class="list-group-item">
                                    {{$feature}}
                                </li>
                            @endforeach
                        </ul>
                </div>
                @else
                    <p>No features available for this project.</p>
                @endif
            </div>

        </div>
    </div>
    <!-- Project Details End -->

@endsection
@section('scripts')
    <script src="{{asset('uplancer/lib/lightbox/js/lightbox.min.js')}}"></script>
@endsection
