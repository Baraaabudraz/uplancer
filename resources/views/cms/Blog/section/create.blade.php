@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new section')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new section')}}</h1>
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
                    <a href="{{route('sections.index')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.All sections')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new section')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new section')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of sections')}}
                            <a href="{{route('sections.index')}}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
            <form action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between mb-5">
                        <h4 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.Add new section')}}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-10" style="border:1px ">
                            <div class="row">
                                @foreach(config('lang') as $key=>$lang)
                                <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Name')}} ({{$lang}})</label>
                            <input type="text" name="name[{{$key}}]" class="form-control @error('name') is-invalid @enderror "
                                   id="" aria-describedby="" placeholder="{{trans('dashboard_trans.Section Name')}}">
                            @error('name')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                                @endforeach
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
            </div>
        </div>
    </div>
    </div>

@endsection

