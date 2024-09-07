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
                        <a href="{{route('dashboard')}}"
                           class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
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
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->

        <div class="card-header cursor-pointer">
            @if(!$website_settings)
            <div class="card-toolbar">
                <a href="{{route('settings.create')}}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                    <span class="svg-icon svg-icon-2">
											<i class="fa fa-plus"></i>
											</span>
                    <!--end::Svg Icon-->  {{trans('dashboard_trans.Add Settings to website')}}</a>

            </div>
            @endif
            <!--begin::Card title-->

            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{trans('dashboard_trans.Website Settings')}}</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            @if($website_settings)
                <a href="{{route('edit-website-settings')}}" class="btn btn-primary align-self-center">{{trans('dashboard_trans.Edit Website Settings')}}</a>
            @endif

            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        @if($website_settings)
        <div class="card-body p-9">
            <div class="col-lg-8 py-10">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url({{url('images/settings/logo/',$website_settings->logo)}})"></div>
                    <!--end::Preview existing avatar-->
                </div>
                <!--end::Image input-->
            </div>
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{trans('dashboard_trans.Website Name')}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{$website_settings->name}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{trans('dashboard_trans.Email')}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">{{$website_settings->email}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{trans('dashboard_trans.Phone')}}
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Phone number must be active" aria-label="Phone number must be active"></i></label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bolder fs-6 text-gray-800 me-2">{{$website_settings->phone}}</span>
                    <span class="badge badge-success">Verified</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{trans('dashboard_trans.Company Site')}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <a href="{{$website_settings->company_site}}" target="_blank" class="fw-bold fs-6 text-gray-800 text-hover-primary">{{$website_settings->company_site}}</a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{trans('dashboard_trans.Connected Accounts')}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <a href="{{$website_settings->linkedin}}"><img src="{{asset('assets/media/svg/brand-logos/linkedin.svg')}}" class="w-30px me-6" alt=""></a>
                    <a href="{{$website_settings->facebook}}" target="_blank"><img src="{{asset('assets/media/svg/brand-logos/facebook-4.svg')}}" class="w-30px me-6" alt=""></a>
                    <a href="{{$website_settings->instagram}}"><img src="{{asset('assets/media/svg/brand-logos/instagram-2016.svg')}}" class="w-30px me-6" alt="">
                    </a>
                    <a href="{{$website_settings->x}}"><img src="{{asset('assets/media/svg/brand-logos/twitter.svg')}}" class="w-30px me-6" alt="">
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-10">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Allow Changes</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">Yes</span>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->
            @else
                No created Settings Yet
            @endif
        </div>

            <a href="#"  onclick="confirmDelete (this, '{{ $website_settings->id }}')"
               class="btn btn-sm btn-light-danger">
                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                <span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                fill="#000000" fill-rule="nonzero"/>
																			<path
                                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                fill="#000000" opacity="0.3"/>
																		</g>
																	</svg>
																</span>
                <!--end::Svg Icon-->{{trans('dashboard_trans.Delete')}}
            </a>
        <!--end::Card body-->
    </div>
@endsection
@section('scripts')
        <script src="{{asset('/cms/assets/js/axios.js')}}"></script>
        <script>
            function confirmDelete(app, id) {
                Swal.fire({
                    title: '{{trans('dashboard_trans.Are sure of the deleting process?')}}',
                    text: "{{trans('dashboard_trans.You wont be able to revert this!')}}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{trans('dashboard_trans.Delete')}}',
                    cancelButtonText: '{{trans('dashboard_trans.Cancel')}}',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            deleteSettings(app, id)
                        )
                    }
                })
            }

            function deleteSettings(app, id) {
                axios.delete('/cms/admin/settings/' +id)
                    .then(function (response) {
                        // handle success
                        console.log(response);
                        app.closest('tr').remove();
                        showMessage(response.data)
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                        showMessage(error.response.data);
                    })
                    .then(function () {
                        // always executed
                    });
            }

            function showMessage(data) {
                let timerInterval
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            }
        </script>
@endsection

