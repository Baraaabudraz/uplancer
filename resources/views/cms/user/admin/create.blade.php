@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new admin')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new admin')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Admins')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new admin')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new admin')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of admin')}}
                            <a href="#" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
        <form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.General Information')}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Name')}}</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" required="">
                                @error('name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Address')}}</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control ">
                                @error('address')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Phone')}} </label>
                                <input type="tel" name="mobile_number" value="{{old('mobile_number')}}"
                                       class="form-control @error('mobile_number') is-invalid @enderror ">
                                @error('mobile_number')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Gender')}}:</label>
                                <div class="form-check form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                           value="Male">
                                    <label class="form-check-label" for="gender_male">{{trans('dashboard_trans.Male')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                           value="Female">
                                    <label class="form-check-label" for="gender_female">{{trans('dashboard_trans.Female')}}</label>
                                </div>
                                @error('gender')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Designation')}}</label>
                                <input type="text" name="designation" value="{{old('designation')}}"
                                       class="form-control @error('designation') is-invalid @enderror" required="">
                                @error('designation')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
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
                                         style="background-image: url({{asset('assets/media/avatars/dummy.png')}});object-fit: cover"></div>
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
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.Login Information')}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Email')}}</label>
                                <input type="email" value="{{old('email')}}" name="email"
                                       class="form-control @error('email') is-invalid @enderror" required="">
                                @error('email')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Password')}}</label>
                                <input type="password" name="password" class="form-control" required="">
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Roles')}}</label>
                                <select class="form-select" name="role_id" required="">
                                    <option hidden disabled selected>{{trans('dashboard_trans.Choose')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">{{trans('dashboard_trans.Status')}}:</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" name="status" type="checkbox" id="status_1" checked="checked">
                                            <label class="form-check-label" for="status_1"></label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center py-6 px-9">
                <button type="reset" class="btn btn-white btn-active-light-primary me-2">
                    {{trans('dashboard_trans.Clear data')}}
                </button>

                <button type="submit" class="addUserBtn1 btn btn-success me-2">
                    {{trans('dashboard_trans.Create')}}
                </button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
