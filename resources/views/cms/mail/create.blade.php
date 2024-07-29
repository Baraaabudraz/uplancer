@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Create Mail')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Create Mail')}}</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Create Mail')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Create Mail')}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-10" style="border:1px ">
                            <div class="row">
                                <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Choose')}}</label>
                                <select id="mail" class="form-control">
                                    <option value="0">{{trans('dashboard_trans.Mail to all staff')}}</option>
                                    <option value="1">{{trans('dashboard_trans.Mail to industries')}}</option>
                                    <option value="2">{{trans('dashboard_trans.Mail to users')}}</option>
                                    <option value="3">{{trans('dashboard_trans.Mail to all industries')}}</option>

                                </select>
                                <br>
                                <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                    <div id="industry">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Industries')}}</label>
                                        <select name="industry" class="form-control">
                                            <option disabled hidden selected>{{trans('dashboard_trans.Choose industry')}}</option>
                                            @foreach($industries as $industry)
                                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('industry')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                    <div id="user">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Users')}}</label>
                                        <select name="user" class="form-control">
                                            <option selected hidden disabled>{{trans('dashboard_trans.Users')}}</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('user')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Message content')}}</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Files')}}</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-end mt-2">
                                <button type="submit" class="btn btn-primary">{{trans('dashboard_trans.Send')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection
@section('scripts')
    <style type="text/css">
        #industry {
            display: none;
        }

        #user {
            display: none;
        }
    </style>
    <script type="text/javascript">
        $('#mail').on('change', function () {
            if (this.value == "1") {
                $("#industry").show()
            } else {
                $("#industry").hide()
            }
            if (this.value == "2") {
                $("#user").show()
            } else {
                $("#user").hide()
            }
        })

    </script>
@endsection

