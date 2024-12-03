@extends('cms.layouts.master')
@section('title',trans('dashboard_trans.Website'))
@section('content')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                 data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Website Settings')}}</h1>
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
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Website Settings')}}</li>
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
        <div class="alert {{session()->get('alert-type')}} alert-dismissible" role="alert">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
<div class="card">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title fs-3 fw-bolder">{{trans('dashboard_trans.Website Settings')}}</div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_project_settings_form" action="{{route('update-settings')}}" method="POST" enctype="multipart/form-data" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        @csrf
        @method('PUT')
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Website Logo')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url({{url('images/settings/logo/',$website_settings->logo)}})"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="logo"  accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="logo">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text">{{trans('dashboard_trans.Allowed file types')}}: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Website Name')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="name" value="{{$website_settings->name}}" placeholder="{{trans('dashboard_trans.Website Name')}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Company Site')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="company_site" value="{{$website_settings->company_site}}" placeholder="{{trans('dashboard_trans.Company Site')}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Phone')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="tel" class="form-control form-control-solid" value="{{$website_settings->phone}}" name="phone" placeholder="{{trans('dashboard_trans.Phone')}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Email')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                    <input type="email" name="email" value="{{$website_settings->email}}" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Email')}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->
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
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.About')}} ({{$lang}})</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <textarea type="text" name="about[{{$key}}]" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.About')}}">{{$website_settings->getTranslation('about',$key)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--begin::Col-->
                            </div>
                        @endforeach
                            <div class="card-body border-top px-9 pt-3 pb-4">
                                @foreach(config('lang') as $key => $lang)
                                    <div class="row mb-8">
                                        <!--begin::Col-->
                                        <div class="col-xl-3">
                                            <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Meta Description')}} ({{$lang}})</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                            <textarea type="text" name="meta_description[{{$key}}]" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Meta Description')}}">{{$website_settings->getTranslation('meta_description',$key)}}</textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--begin::Col-->
                                    </div>
                                @endforeach
                        @foreach(config('lang') as $key => $lang)
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Contact Description')}} ({{$lang}})</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <textarea type="text" name="desc_contact[{{$key}}]" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Contact Description')}}">{{$website_settings->getTranslation('desc_contact',$key)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--begin::Col-->
                            </div>
                        @endforeach
                        @foreach(config('lang') as $key => $lang)
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Why Us')}} ({{$lang}})</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                    <textarea type="text" name="why_us[{{$key}}]" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Why Us')}}">{{$website_settings->getTranslation('why_us',$key)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--begin::Col-->
                            </div>
                        @endforeach
                    </div>
                    <!--end::Card body--><!--end::Form-->
                </div>
                <!--end::Content-->
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
                                        <input type="url" value="{{$website_settings->linkedin}}" class="form-control-input" name="linkedin" placeholder="LinkedIn URL">
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
                                        <input type="url" value="{{$website_settings->facebook}}" class="form-control-input" name="facebook" placeholder="Facebook URL">

                                    </div>
                                </div>
                            </div>
                            <!--end::Item-->
                            <div class="separator separator-dashed my-5"></div>
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <div class="d-flex">
                                    <img src="{{asset('assets/media/svg/brand-logos/instagram-2016.svg')}}" class="w-30px me-6" alt="">
                                    <div class="d-flex flex-column">
                                        <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Instagram</a>
                                        <div class="fs-6 fw-bold text-gray-400">Integrate Projects Discussions</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="form-control form-control-solid form-control">
                                        <input class="form-control-input" value="{{$website_settings->instagram}}" type="url" name="instagram" placeholder="Instagram URL">
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
                                        <input class="form-control-input" value="{{$website_settings->x}}" type="url" name="x" placeholder="X URL">
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
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{trans('dashboard_trans.Clear data')}}</button>
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">{{trans('dashboard_trans.Save Edit')}}</button>
        </div>
        <!--end::Card footer-->
        <input type="hidden"><div></div>
    </form>
    <!--end:Form-->
</div>
@endsection
