@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new project')}}
@endsection

@section('links')
    <style>
        #result{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px 0;
        }

        .thumbnail {
            height: 92px;
            border: 4px #ffb500 solid;
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                 data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new project')}}</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All projects')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new project')}}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    @if(session()->has('alert-type'))
        <div class="alert {{session()->get('alert-type')}} alert-custom alert-notice alert-light-primary fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text"> {{session()->get('message')}}</div>
        </div>
    @endif
    <!--begin::Card-->
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!----------------------------------------------------------------------->
                    <!-------------------------------Form---------------------------------------->
                    <!--begin:Form-->
                    <!--------------------- this is out takbeeees ---------------------------->
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new project')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of projects')}}
                            <a href="{{ route('projects.index') }}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" id="kt_cms_add_project_form" action="{{route('projects.store')}}" enctype="multipart/form-data" class="w-100 position-relative mb-3" data-kt-redirect="{{route('projects.create')}}">
                        @csrf
                        <!--begin::Aside column-->

                        <div class="card-title">
                            <h2>{{trans('dashboard_trans.Image')}}</h2>
                            <!--end::Card title-->
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    <style>.image-input-placeholder { background-image: url({{asset('assets/media/avatars/blank.png')}}''); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url({{url('assets/media/svg/files/blank-image-dark.svg')}}''); }</style>
                                    <!--end::Image input placeholder-->
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="ki-duotone ki-cross fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="ki-duotone ki-cross fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                        <!--end::Remove-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-5">{{trans('dashboard_trans.Allowed file types')}}:</div>
                                        <!--end::Description-->
                                        @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end::Image input-->


                                <!--end::Card body-->

                        <!--end::Aside column-->
                        <div class="row">
                            <div class="col-md-12 mb-10" style="border:1px ">
                                <div class="row">
                                    @foreach(config('lang') as $key => $lang)
                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Name')}} ({{$lang}})</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                   data-bs-toggle="tooltip"
                                                   title="{{trans('dashboard_trans.Enter the name of the project')}}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter the name of the project')}} " name="name[{{$key}}]" id="name" value="{{old('name.'.$key)}}" />
                                            <div id="name-{{ $key }}-error" class="error-message"></div>
                                        </div>
                                    @endforeach

                                        @foreach(config('lang') as $key => $lang)
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Description')}} ({{$lang}})</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{old('description.'.$key)}}</textarea>
                                        <div id="description-{{ $key }}-error" class="error-message"></div>
                                    </div>
                                        @endforeach


                                        @foreach(config('lang') as $key => $lang)
                                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">{{trans('dashboard_trans.Meta Description')}} ({{$lang}})</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Meta Description')}}"></i>
                                                </label>
                                                <!--end::Label-->
                                                <textarea name="meta_description[{{$key}}]" class="form-control @error('meta_description') is-invalid @enderror">{{old('meta_description.'.$key)}}</textarea>
                                                <div id="meta_description-{{ $key }}-error" class="error-message"></div>

                                            </div>
                                        @endforeach


                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Services')}}</label>
                                            <select class="form-select mb-2 select2-hidden-accessible" data-control="select2" name="service_id" data-hide-search="true"    aria-hidden="true"  data-placeholder="{{trans('dashboard_trans.All services')}}">
                                                    <option></option>
                                            </select>
                                            <div id="service_id-{{ $key }}-error" class="error-message"></div>

                                        </div>

                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Slug</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                   data-bs-toggle="tooltip"
                                                   title="{{trans('dashboard_trans.Slug')}}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Slug')}}" name="slug" id="slug" value="{{old('slug')}}" />
                                            <div id="slug-{{ $key }}-error" class="error-message"></div>
                                        </div>
                                        <!--begin::Media-->
                                        <div class="card card-flush py-4 col-md-12">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>{{trans('dashboard_trans.Media')}}</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-2">
                                                    <!--begin::Dropzone-->
                                                    <div class="dropzone" id="kt_cms_add_project_media">
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick">
                                                            <!--begin::Icon-->
                                                            <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
                                                            <div class="ms-4">
                                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">{{trans('dashboard_trans.Drop files here or click to upload')}}.</h3>
                                                                <span class="fs-7 fw-semibold text-gray-400">{{trans('dashboard_trans.Upload up to 10 files')}}</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product media gallery')}}.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Card header-->
                                            <div id="images-{{ $key }}-error" class="error-message"></div>

                                        </div>
                                        </div>
                                        <!--end::Media-->
                                </div>
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">{{trans('dashboard_trans.Additional information')}}</h3>
                                        </div>
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_notifications" class="collapse show">
                                        <!--begin::Form-->
                                        <!--begin::Card body-->
                                        <div class="card-body border-top px-9 pt-3 pb-4">
                                            @foreach(config('lang') as $key => $lang)
                                                <div class="row mb-8">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-3">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">
                                                            {{ trans('dashboard_trans.Project Features') }} ({{ $lang }})
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                        <div id="features-container-{{ $key }}">
                                                            <!-- Dynamic feature inputs -->
                                                            <div class="feature-input d-flex mb-3">
                                                                <input type="text" name="features[{{ $key }}][]" class="form-control form-control-solid"
                                                                       placeholder="{{ trans('dashboard_trans.Features') }}" value="">
                                                            </div>
                                                        </div>
                                                        <!-- Add Feature Button -->
                                                        <button type="button" class="btn btn-light-primary mt-3 add-feature-btn" data-lang="{{ $key }}">
                                                            {{ trans('dashboard_trans.Add Feature') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="row mb-8">
                                                <!--begin::Col-->
                                                <div class="col-xl-3">
                                                    <div class="fs-6 fw-bold mt-2 mb-3">{{ trans('dashboard_trans.Technology') }}</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="technology" class="form-control form-control-solid"
                                                           placeholder="{{ trans('dashboard_trans.Technology') }}" value="{{ old('technology') }}">
                                                    <div id="technology-{{ $key }}-error" class="error-message"></div>

                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        </div>

                                        <!--end::Card body--><!--end::Form-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                        </div>
                                    </div>

                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('projects.index') }}" id="kt_cms_add_project_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_cms_add_project_submit" class="btn btn-primary">
                                <span class="indicator-label">{{trans('dashboard_trans.Create')}}</span>
                                <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        <!--end::Actions-->
                        </div>
                    </form>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        </div>
    </div>

    <!--end::Card-->

@endsection
@section('scripts')
<script>
    const routes = {
        post: "{{ route('store-media') }}",
    };

    const services = {
        get: "{{ route('get-services') }}",
    };
</script>

<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-project.js')}}"></script>


    <script>
        document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
            if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
                const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
                const output = document.querySelector("#result");
                output.innerHTML = "";
                for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
                    if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
                    const picReader = new FileReader(); // RETRIEVE DATA URI
                    picReader.addEventListener("load", function (event) { // LOAD EVENT FOR DISPLAYING PHOTOS
                        const picFile = event.target;
                        const div = document.createElement("div");
                        div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]); //READ THE IMAGE
                }
            } else {
                alert("Your browser does not support File API");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const featureButtons = document.querySelectorAll(".add-feature-btn");

            featureButtons.forEach((button) => {
                button.addEventListener("click", function () {
                    const lang = this.dataset.lang; // Get the language code
                    const container = document.getElementById(`features-container-${lang}`); // Find the corresponding container

                    // Create a new input field
                    const newFeatureInput = document.createElement("div");
                    newFeatureInput.className = "feature-input d-flex mb-3";
                    newFeatureInput.innerHTML = `
                <input type="text" name="features[${lang}][]" class="form-control form-control-solid" placeholder="Enter feature">
                <button type="button" class="btn btn-danger ms-2 remove-feature-btn">X</button>
            `;

                    // Add the new input to the container
                    container.appendChild(newFeatureInput);

                    // Add event listener to remove the feature input
                    newFeatureInput.querySelector(".remove-feature-btn").addEventListener("click", function () {
                        newFeatureInput.remove();
                    });
                });
            });
        });

    </script>

    <script>
        document.querySelectorAll('input[name]').forEach(function(input) {
            input.addEventListener('input', function() {
                // Check if the input field's name is "name[en]"
                if (this.name === 'name[en]') {
                    let projectName = this.value;
                    let slug = projectName
                        .toLowerCase() // Convert to lowercase
                        .trim() // Remove leading and trailing spaces
                        .replace(/[\s\W-]+/g, '-') // Replace spaces and non-word characters with dashes
                        .replace(/^-+|-+$/g, ''); // Remove leading and trailing dashes

                    // Set the slug value in the slug input field
                    document.getElementById('slug').value = slug;
                }
            });
        });


    </script>
@endsection
