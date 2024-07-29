@extends('cms.layouts.master')

@section('title')
    {{trans('dashboard_trans.Home')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Home')}}</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Home')}}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <div class="col-xl-6">
            <!--begin::Statistics Widget 5-->
            <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart3.svg-->
                    <!--begin::Svg Icon | path: assets/media/icons/duotone/Devices/Printer.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-2hx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
                            <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 float-end">
                                       <div class="text-inverse-warning fw-bolder fs-1  mt-5">{{App\Models\Order::count()}}</div>
												</span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-danger fw-bolder fs-2 mb-2 mt-5">{{trans('dashboard_trans.Orders')}}</div>
                    <div class="fw-bold text-inverse-danger fs-7"></div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-6">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('products.index')}}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                    <!--begin::Svg Icon | path: assets/media/icons/duotone/General/Bank.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="32" height="32" viewBox="0 0 32 32"
                                                                            fill="none">
<path opacity="0.3"
      d="M5.33317 13.3333H10.6665V22.6666H13.3332V13.3333H18.6665V22.6666H21.3332V13.3333H26.6665V22.6666C28.1393 22.6666 29.3332 23.8605 29.3332 25.3333V26.6666C29.3332 28.1393 28.1393 29.3333 26.6665 29.3333H5.33317C3.86041 29.3333 2.6665 28.1393 2.6665 26.6666V25.3333C2.6665 23.8605 3.86041 22.6666 5.33317 22.6666V13.3333Z"
      fill="#000000"/>
<path
    d="M2.6665 9.8054C2.6665 8.71499 3.33037 7.73443 4.3428 7.32947L15.0095 3.0628C15.6452 2.80849 16.3545 2.80849 16.9902 3.0628L27.6569 7.32947C28.6693 7.73443 29.3332 8.71499 29.3332 9.8054V10.6666C29.3332 12.1394 28.1393 13.3333 26.6665 13.3333H5.33317C3.86041 13.3333 2.6665 12.1394 2.6665 10.6666V9.8054Z"
    fill="#000000"/>
</svg></span>
                    <!--end::Svg Icon-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 float-end">
                                       <div class="text-inverse-warning fw-bolder fs-1  mt-5">{{App\Models\Product::count()}}</div>
												</span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-primary fw-bolder fs-2 mb-2 mt-5">{{trans('dashboard_trans.Products')}}</div>
                    <div class="fw-bold text-inverse-primary fs-7">{{trans('dashboard_trans.All Products')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        @if(isset(Auth()->user()->role->permission['name']['user']['can-view']))
        <div class="col-xl-6">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('users.index')}}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
														<path
                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														<path
                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
													</svg>
												</span>
                    <!--end::Svg Icon-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 float-end">
                                       <div class="text-inverse-warning fw-bolder fs-1  mt-5">{{App\Models\User::count()}}</div>
												</span>
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{trans('dashboard_trans.Users')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->

            <!--end::Row-->
        </div>
        @endif
        @if(isset(Auth()->user()->role->permission['name']['industry']['can-view']))
        <div class="col-xl-6">
            <!--begin::Statistics Widget 5-->
            <a href="{{route('industries.index')}}" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-bar1.svg-->
                    <!--begin::Svg Icon | path: assets/media/icons/duotone/General/User.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
														<path
                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														<path
                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
													</svg>
												</span>
                    <!--end::Svg Icon-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 float-end">
                                       <div class="text-inverse-warning fw-bolder fs-1  mt-5">{{App\Models\Industry::count()}}</div>
												</span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{trans('dashboard_trans.Industries')}}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        @endif
        <!--end::Row-->
    </div>
@endsection
