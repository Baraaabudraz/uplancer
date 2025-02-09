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
        <div class="alert {{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card shadow-sm ">
                <div class="card-header text-center  text-white" style="background-color: #5d3991">
                    <h3 class="card-title text-white">{{trans('dashboard_trans.Website Settings')}}</h3>
                </div>
                <form id="kt_add_setting_form" action="{{ route('settings.store') }}" enctype="multipart/form-data" method="POST" class="form p-4" data-kt-redirect="{{route('settings.index')}}">
                    @csrf
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
                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url({{asset('assets/media/avatars/blank.png')}})"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg">
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
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label">{{trans('dashboard_trans.Favicon')}}</label>
                            <input type="file" name="favicon" class="form-control" accept=".png, .svg">
                            <input type="hidden" name="favicon">
                        </div>
                    </div>
                    <div class="row g-4 mt-2">
                        @foreach(config('lang') as $key => $lang)
                        <div class="col-md-6">
                            <label class="form-label">{{trans('dashboard_trans.Website Name')}} ({{$lang}})</label>
                            <input type="text" name="name[{{$key}}]" value="{{ old('name.'.$key) }}" class="form-control" placeholder="{{trans('dashboard_trans.Website Name')}}">
                        </div>
                        @endforeach
                        <div class="col-md-6">
                            <label class="form-label">{{trans('dashboard_trans.Company Site')}}</label>
                            <input type="url" name="url" value="{{ old('url') }}" class="form-control" placeholder="{{trans('dashboard_trans.Company Site')}}">
                        </div>
                    </div>
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <label class="form-label">{{trans('dashboard_trans.Phone')}}</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="{{trans('dashboard_trans.Phone')}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{trans('dashboard_trans.Email')}}</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{trans('dashboard_trans.Email')}}">
                        </div>
                    </div>
                    <div class="row g-4 mt-2">
                    @foreach(config('lang') as $key=> $lang)
                    <div class="col-md-6">
                        <label class="form-label">{{trans('dashboard_trans.About')}} {{trans('dashboard_trans.Up Lancer')}} ({{$lang}})</label>
                        <textarea name="about[{{$key}}]" class="form-control" rows="4" placeholder="وصف الموقع">{{ old('about.'.$key) }}</textarea>
                    </div>
                    @endforeach
                    </div>
                    <div class="row g-4 mt-2">
                    @foreach(config('lang') as $key=> $lang)
                            <div class="col-md-6">
                        <label class="form-label">{{trans('dashboard_trans.Why Us')}} ? ({{$lang}})</label>
                        <textarea name="why_us[{{$key}}]" class="form-control" rows="4" placeholder="{{trans('dashboard_trans.Why Us')}}">{{ old('why_us.'.$key) }}</textarea>
                    </div>
                    @endforeach
                    </div>

                    <div class="accordion mt-4" id="metaSettings">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#metaInfo" aria-expanded="true">
                                   {{trans('dashboard_trans.Meta Settings')}}
                                </button>
                            </h2>
                            <div id="metaInfo" class="accordion-collapse collapse show">
                                @foreach(config('lang') as $key=>$lang)
                                <div class="accordion-body">
                                    <label class="form-label">{{trans('dashboard_trans.Meta Description')}} ({{$lang}})</label>
                                    <textarea name="meta_description[{{$key}}]" class="form-control" placeholder="{{trans('dashboard_trans.Meta Description')}}">{{ old('meta_description.'.$key) }}</textarea>
                                    <label class="form-label mt-2">{{trans('dashboard_trans.Meta Keywords')}} ({{$lang}})</label>
                                    <textarea name="meta_keyword[{{$key}}]" class="form-control" placeholder="{{trans('dashboard_trans.Meta Keywords')}}">{{ old('meta_keyword.'.$key) }}</textarea>
                                    <label class="form-label mt-2">(Alt){{trans('dashboard_trans.Alternative Text')}} ({{$lang}})</label>
                                    <textarea name="alt[{{$key}}]" class="form-control" placeholder="نص بديل للصورة">{{ old('alt.'.$key) }}</textarea>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion mt-4 mb-10" id="socialAccounts">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#socialInfo" aria-expanded="true">
                                    {{trans('dashboard_trans.Connected Accounts')}}
                                </button>
                            </h2>
                            <div id="socialInfo" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedin" value="{{ old('linkedin') }}" class="form-control" placeholder="رابط LinkedIn">
                                    <label class="form-label mt-2">Facebook</label>
                                    <input type="url" name="facebook" value="{{ old('facebook') }}" class="form-control" placeholder="رابط Facebook">
                                    <label class="form-label mt-2">Instagram</label>
                                    <input type="url" name="instagram" value="{{ old('instagram') }}" class="form-control" placeholder="رابط Instagram">
                                    <label class="form-label mt-2">Twitter (X)</label>
                                    <input type="url" name="x" value="{{ old('x') }}" class="form-control" placeholder="رابط X">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('settings.index') }}" id="kt_add_setting_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit"  class="btn btn-primary" id="kt_add_setting_submit">
                            <span class="indicator-label">{{trans('dashboard_trans.Submit')}}</span>
                            <span class="indicator-progress">{{'الرجاء الانتظار'}}...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/save-setting.js')}}"></script>
@endsection
