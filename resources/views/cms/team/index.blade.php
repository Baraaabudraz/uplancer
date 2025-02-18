@extends('cms.layouts.master')

@section('title', trans('dashboard_trans.Team Members'))

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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Team Members')}}</h1>
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

                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('members.index')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Team Members')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.All Members')}}</li>
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
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{trans('dashboard_trans.All Members')}}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('members.create')}}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                    <span class="svg-icon svg-icon-2">
											<i class="fa fa-plus"></i>
											</span>
                    <!--end::Svg Icon-->  {{trans('dashboard_trans.Add new member')}}</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!----------------------------------------------------------------------->
            <!--end::Alert-->
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="kt_cms_members_table">
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_cms_projects_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>{{trans('dashboard_trans.Team Members')}}</th>
                        <th>{{trans('dashboard_trans.Position')}}</th>
                        <th>{{trans('dashboard_trans.Phone')}}</th>
                        <th>{{trans('dashboard_trans.Role')}}</th>
                        <th>{{trans('dashboard_trans.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection


@section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/cms/members/members.js')}}"></script>
@endsection

