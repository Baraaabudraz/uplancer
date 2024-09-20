@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new member')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new member')}}</h1>
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
                    <a href="{{route('members.index')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Members')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new member')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new member')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of members')}}
                            <a href="{{ route('members.index') }}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" action="{{route('members.store')}}" enctype="multipart/form-data" class="w-100 position-relative mb-3">
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
                                                   title="{{trans('dashboard_trans.Enter the name of the member')}}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter Name Of')}} {{trans('dashboard_trans.Member')}} " name="name[{{$key}}]" value="{{old('name.'.$key)}}" />
                                            @error('name.'. $key)
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @endforeach

                                    @foreach(config('lang') as $key => $lang)
                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Position')}} ({{$lang}})</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                            </label>
                                            <!--end::Label-->
                                            <input name="position[{{$key}}]" class="form-control @error('position') is-invalid @enderror" value="{{old('position.'.$key)}}">
                                            @error('position.'. $key)
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
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">Connected Accounts</h3>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_connected_accounts" class="collapse show">
                                        <!--begin::Card body-->
                                        <div class="card-body border-top p-9">
                                            <!--begin::Notice-->
                                            {{--                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">--}}
                                            {{--                            <!--begin::Icon-->--}}
                                            {{--                            <!--begin::Svg Icon | path: icons/duotone/Design/Select.svg-->--}}
                                            {{--                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">--}}
                                            {{--													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                                            {{--														<path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3"></path>--}}
                                            {{--														<path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000"></path>--}}
                                            {{--													</svg>--}}
                                            {{--												</span>--}}
                                            {{--                            <!--end::Svg Icon-->--}}
                                            {{--                            <!--end::Icon-->--}}
                                            {{--                            <!--begin::Wrapper-->--}}
                                            {{--                            <div class="d-flex flex-stack flex-grow-1">--}}
                                            {{--                                <!--begin::Content-->--}}
                                            {{--                                <div class="fw-bold">--}}
                                            {{--                                    <div class="fs-6 text-gray-700">--}}
                                            {{--                                        <a href="#" class="fw-bolder">Learn More</a></div>--}}
                                            {{--                                </div>--}}
                                            {{--                                <!--end::Content-->--}}
                                            {{--                            </div>--}}
                                            {{--                            <!--end::Wrapper-->--}}
                                            {{--                        </div>--}}
                                            <!--end::Notice-->
                                            <!--begin::Items-->
                                            <div class="py-2">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/media/svg/brand-logos/linkedin.svg')}}" class="w-30px me-6" alt="">
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">LinkedIn</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Plan properly your workflow</div>

                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input type="url" value="{{old('linkedin')}}" class="form-control-input" name="linkedin" placeholder="LinkedIn URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/media/svg/brand-logos/facebook-4.svg')}}" class="w-30px me-6" alt="">
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Facebook</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Keep eye on your Profile</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input type="url" value="{{old('facebook')}}" class="form-control-input" name="facebook" placeholder="Facebook URL">

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/media/svg/brand-logos/github-2.svg')}}" class="w-30px me-6" alt="">
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">GitHub</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Integrate Projects Discussions</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input class="form-control-input" value="{{old('github')}}" type="url" name="github" placeholder="Github URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/media/svg/brand-logos/twitter.svg')}}" class="w-30px me-6" alt="">
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">X</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Integrate Projects Discussions</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input class="form-control-input" value="{{old('x')}}" type="url" name="x" placeholder="X URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/media/svg/brand-logos/alcatel-mobile-3.svg')}}" class="w-30px me-6" alt="">
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Whatsapp</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Keep in touch</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input class="form-control-input" value="{{old('whatsapp')}}" type="url" name="whatsapp" placeholder="whatsapp URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Content-->
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
