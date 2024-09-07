@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new service')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new service')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All services')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new service')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new service')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of services')}}
                            <a href="{{ route('services.index') }}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data" class="w-100 position-relative mb-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-10" style="border:1px ">
                                <div class="row">
                                    @foreach(config('lang') as $key => $lang)
                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Name')}} ({{$lang}})</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                   data-bs-toggle="tooltip"
                                                   title="{{trans('dashboard_trans.Enter the name of the service')}}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter Name Of')}} {{trans('dashboard_trans.service')}} " name="name[{{$key}}]" value="{{old('name.'.$key)}}" />
                                            @error('name.'.$key)
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
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
                                        @error('description.'.$key)
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        @endforeach

                                        <div  class="col-md-6 ">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Image')}}</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Image')}}"></i>
                                            </label>
                                            <br>
                                            <!--end::Label-->

{{--                                            <div class="dz-default dz-message" >قم بإسقاط الصور هنا أو إضغط للرفع</div>--}}
                                            <input id="files" type="file" class="dropzone" name="image" multiple="multiple" accept="image/jpeg, image/png, image/jpg">
                                        </div>
                                        <output id="result"></output>
                                </div>
                            </div>
                        </div>


                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-center py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">
                                {{trans('dashboard_trans.Clear data')}}
                            </button>

                            <button type="submit" class="addUserBtn1 btn btn-success me-2">
                                {{trans('dashboard_trans.Create')}}
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>


                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->

        </div>


    </div>
    <!--end::Card-->

@endsection
@section('scripts')
    <script src="{{asset('assets/js/custom/uppy/uppy.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/uppy/uppy.js')}}"></script>
{{--    <script src="{{asset('assets/js/custom/dropzonejs/dropzonejs.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/custom/documentation/forms/dropzonejs.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/custom/documentation/forms/dropzonejs.js.map')}}"></script>--}}

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

@endsection
