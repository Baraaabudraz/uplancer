@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Edit sponsor logo')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">   {{trans('dashboard_trans.Edit sponsor logo')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.Sponsors')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">   {{trans('dashboard_trans.Edit sponsor logo')}}</li>
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
                        <h1 class="mb-3">   {{trans('dashboard_trans.Edit sponsor logo')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of sponsors')}}
                            <a href="{{route('sponsors.index')}}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" action="{{route('sponsors.update',$sponsor->id)}}" enctype="multipart/form-data" class="w-100 position-relative mb-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-10" style="border:1px ">
                                <div class="row">

                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Name')}} </span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                        </label>
                                        <input class="form-control form-control-solid" name="name" placeholder=" " value="{{$sponsor->name}}" />
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <div class="col-md-6">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Image')}}</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Image')}}"></i>
                                            </label>
                                            <br>
                                            <!--end::Label-->
                                            <div class="image-input image-input-outline"  data-kt-image-input="true"
                                                 style="background-image: url({{asset('assets/media/avatars/dummy.png')}});object-fit: cover">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-400px h-300px"
                                                <div class="image-input-wrapper w-400px h-300px"
                                                     style="background-image: url({{url('images/sponsor/',$sponsor->image)}});object-fit: cover"></div>></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-40px h-40px bg-white shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="{{trans('dashboard_trans.Edit')}}">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="image" accept="image/*"/>
                                                    <input type="hidden" name="avatar_remove"/>
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-40px h-40px bg-white shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="{{trans('dashboard_trans.Delete')}}">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-40px h-40px bg-white shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="{{trans('dashboard_trans.Delete')}}">
                                                                    <i class="bi bi-x fs-2"></i>
                                                                </span>
                                                <!--end::Remove-->
                                                <br>
                                                @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-center py-6 px-9">
                                <button type="reset" class="btn btn-white btn-active-light-primary me-2">
                                    {{trans('dashboard_trans.Clear data')}}
                                </button>

                                <button type="submit" class="addUserBtn1 btn btn-success me-2">
                                    {{trans('dashboard_trans.Edit')}}
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
@section('page-scripts')

    <script src="{{asset('cms/assets/plugins/custom/uppy/uppy.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('cms/assets/js/pages/crud/file-upload/uppy.js')}}" type="text/javascript"></script>
@endsection
