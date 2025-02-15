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
            <div class="row g-4" id="project-container">
                <!-- Projects will be loaded here -->
            </div>
            <div class="text-center mt-5">
                <a href="#" id="load-more-btn" class="btn btn-primary rounded-pill py-3 px-5">
                    <span class="load-more-text">{{trans('home_trans.Load More Projects')}}</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Project End -->
    <!-- Projects Page End -->
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            let currentPage = 1;
            const projectContainer = $('#project-container');
            const loadMoreBtn = $('#load-more-btn');
            const loadMoreText = $('.load-more-text');
            const spinner = $('.spinner-border');

            function loadPosts(page) {
                loadMoreBtn.attr('disabled', true);
                loadMoreText.addClass('d-none');
                spinner.removeClass('d-none');

                $.ajax({
                    url: "{{route('get-projects')}}",
                    type: 'GET',
                    dataType: 'json',
                    data: { page: page },
                    success: function (getProjects) {
                        loadMoreBtn.attr('disabled', false);
                        loadMoreText.removeClass('d-none');
                        spinner.addClass('d-none');

                        if (getProjects.data && getProjects.data.length > 0) {
                            $.each(getProjects.data, function (key, project) {
                                var projectName = project.name[$('html').attr('lang')] || project.name['ar'] || project.name['en'] || '';
                                var projectDescription = project.description[$('html').attr('lang')] || project.description['ar'] || project.description['en'] || '';
                                const projectHtml = `
                                       <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                       <div class="project-item shadow-lg rounded p-3 h-100">
                                           <div class="position-relative mb-3">
                                               <img class="img-fluid rounded lazyload" src="storage/${project.thumbnail}" loading="lazy" alt=""  data-uc-img="loading: lazy">>
                                               <div class="overlay">
                                                    <a href="show-project/${project.slug}" class="view-icon">
                                                        <i class="fa fa-eye fa-2x"></i>
                                                    </a>
                                               </div>
                                           </div>
                                           <h6 class="text-primary">${projectName}</h6>
                                           <span class="text-truncate-2">${projectDescription.substring(0,100)}....</span>
                                      </div>
                                    </div>
                                       `;
                                projectContainer.append(projectHtml);
                            });
                        } else {
                            loadMoreBtn.hide();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        loadMoreBtn.attr('disabled', false);
                        loadMoreText.removeClass('d-none');
                        spinner.addClass('d-none');
                    }
                });
            }

            loadPosts(currentPage);

            loadMoreBtn.on('click', function (event) {
                event.preventDefault();
                currentPage++;
                loadPosts(currentPage);
            });
        });
    </script>
@endsection
