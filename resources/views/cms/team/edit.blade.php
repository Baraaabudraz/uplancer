@extends('cms.layouts.master')
@section('title',trans('dashboard_trans.Edit member details'))
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Edit member details')}}</h1>
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
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit member details')}}</li>
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

                    <form method="POST" id="kt_cms_add_member_form" action="{{route('members.update',$member->id)}}" enctype="multipart/form-data" class="w-100 position-relative mb-3" data-kt-redirect="{{route('members.index')}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Image')}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url({{Storage::url($member->image)}})"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="image">
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
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter Name Of')}} {{trans('dashboard_trans.Member')}} " name="name[{{$key}}]" value="{{$member->getTranslation('name',$key)}}" />
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
                                            <input name="position[{{$key}}]" class="form-control @error('position') is-invalid @enderror" value="{{$member->getTranslation('position',$key)}}">
                                            @error('position.'. $key)
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @endforeach

                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Address')}} </span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$member->address}}">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Phone')}} </span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$member->phone}}">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Roles')}}</label>
                                        <select class="form-select mb-2 select2-hidden-accessible" data-control="select2" name="role_id" data-hide-search="true" aria-hidden="true" data-placeholder="{{trans('dashboard_trans.All roles')}}">
                                            <option></option>
                                        </select>
                                        @error('role_id')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Status')}}</label>
                                        <select class="form-select mb-2 select2-hidden-accessible" data-control="select2" name="status" data-hide-search="true" aria-hidden="true" data-placeholder="{{trans('dashboard_trans.Select Option')}}">
                                            <option></option>
                                            <option value="Active" @selected($member->status == 'Active')>{{trans('dashboard_trans.Active')}}</option>
                                            <option value="InActive" @selected($member->status == 'InActive')>{{trans('dashboard_trans.InActive')}}</option>
                                            <option value="Blocked" @selected($member->status == 'Blocked')>{{trans('dashboard_trans.Blocked')}}</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Gender')}}:</label>
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" @checked($member->gender == 'Male') type="radio" name="gender" id="gender_male"
                                                   value="Male">
                                            <label class="form-check-label" for="gender_male">{{trans('dashboard_trans.Male')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" @checked($member->gender == 'Female')  name="gender" id="gender_female"
                                                   value="Female">
                                            <label class="form-check-label" for="gender_female">{{trans('dashboard_trans.Female')}}</label>
                                        </div>
                                        @error('gender')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">{{trans('dashboard_trans.Connected Accounts')}}</h3>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_connected_accounts" class="collapse show">
                                        <!--begin::Card body-->
                                        <div class="card-body border-top p-9">
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
                                                            <input type="url" value="{{$member->linkedin}}" class="form-control-input" name="linkedin" placeholder="LinkedIn URL">
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
                                                            <input type="url" value="{{$member->facebook}}" class="form-control-input" name="facebook" placeholder="Facebook URL">

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
                                                            <input class="form-control-input" value="{{$member->github}}" type="url" name="github" placeholder="Github URL">
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
                                                            <input class="form-control-input" value="{{$member->x}}" type="url" name="x" placeholder="X URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack">
                                                    <div class="d-flex">
                                                        <i class="fas fa-phone-square fa-3x me-6" style="color: #00b300"></i>
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Whatsapp</a>
                                                            <div class="fs-6 fw-bold text-gray-400">Keep in touch</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-control form-control-solid form-control">
                                                            <input class="form-control-input" value="{{$member->whatsapp}}" type="url" name="whatsapp" placeholder="whatsapp URL">
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
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('members.index') }}" id="kt_cms_add_member_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_cms_add_member_submit" class="btn btn-primary">
                                <span class="indicator-label">{{trans('dashboard_trans.Save Edit')}}</span>
                                <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
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
    <script>
        const roles = {
            get : "{{route('get_roles')}}"
        }
    </script>
    <script src="{{asset('assets/js/cms/members/save-member.js')}}"></script>

@endsection
