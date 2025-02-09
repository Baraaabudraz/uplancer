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
        <div class="alert {{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">الموقع الإلكتروني</h3>
                    @if(!$website_settings)
                        <a href="{{ route('settings.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> ضبط اعداد الموقع
                        </a>
                    @endif
                    @if($website_settings)
                        <a href="{{ route('settings.edit',$website_settings->id) }}" class="btn btn-success">تعديل الإعدادات</a>
                    @endif
                </div>

                @if($website_settings)
                    <div class="card-body">
                        <div class="text-center mb-4" style="background-color: #5d3991">
                            <img src="{{Storage::url($website_settings->logo ?? '')}}" class="image-input-wrapper w-200px  bgi-position-center mb-5"  alt="{{$website_settings->alt ?? ''}}">
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
                    <span class="badge badge-success">{{trans('dashboard_trans.Verified')}}</span>
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
                    <a href="{{$website_settings->url}}" target="_blank" class="fw-bold fs-6 text-gray-800 text-hover-primary">{{$website_settings->url}}</a>
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
                        <div class="card-footer text-center">
                            <button onclick="confirmDelete(this, '{{ $website_settings->id }}')" class="btn btn-danger">{{trans('dashboard_trans.Delete')}}</button>
                        </div>
                        @else
                            <div class="card-body text-center text-muted">لم يتم ضبط إعدادات الموقع بعد</div>
                        @endif
                    </div>
            </div>
        </div>
        </div>
        @endsection
        @section('scripts')
        <script src="{{asset('/assets/js/axios.js')}}"></script>
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

