@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Add new permissions')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Add new permissions')}}</h1>
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
                    <a href="{{route('permissions.index')}}"
                       class="text-muted text-hover-primary">{{trans('dashboard_trans.All permissions')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new permissions')}}</li>
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
        <div class="alert {{session()->get('alert-type')}} alert-custom alert-notice alert-light-primary fade show"
             role="alert">
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Add new permissions')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div
                            class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of permissions')}}
                            <a href="{{route('permissions.index')}}"
                               class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
    <form action="{{route('permissions.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between mb-5">
                <h5 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.Add new permissions')}}</h5>
            </div>
            <div class="col-md-12 mb-10" style="border:1px ">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Roles')}}</label>
                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                <option hidden disabled selected>{{trans('dashboard_trans.Choose Role')}}</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="table-responsive">
                        <table class="table table-striped table-dark gy-5 gs-7 border rounded">
                            <thead>
                            <tr>
                                <th scope="col">{{trans('dashboard_trans.Permission')}}</th>
                                <th scope="col">{{trans('dashboard_trans.can-add')}}</th>
                                <th scope="col">{{trans('dashboard_trans.can-edit')}}</th>
                                <th scope="col">{{trans('dashboard_trans.can-delete')}}</th>
                                <th scope="col">{{trans('dashboard_trans.can-view')}}</th>
                                <th scope="col">{{trans('dashboard_trans.can-list')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{trans('dashboard_trans.Industrial Sectors')}}</td>
                                <td><input type="checkbox" name="name[category][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[category][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[category][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[category][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[category][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Subcategories')}}</td>
                                <td><input type="checkbox" name="name[subcategory][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[subcategory][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[subcategory][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[subcategory][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[subcategory][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Roles')}}</td>
                                <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Permissions')}}</td>
                                <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Products')}}</td>
                                <td><input type="checkbox" name="name[product][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[product][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[product][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[product][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[product][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Users')}}</td>
                                <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Admins')}}</td>
                                <td><input type="checkbox" name="name[admin][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-list]" value="1"></td>
                            </tr>

                            <tr>
                                <td>{{trans('dashboard_trans.Slides')}}</td>
                                <td><input type="checkbox" name="name[slider][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[slider][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[slider][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[slider][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[slider][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Sponsors')}}</td>
                                <td><input type="checkbox" name="name[sponsor][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[sponsor][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[sponsor][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[sponsor][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[sponsor][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Industries')}}</td>
                                <td><input type="checkbox" name="name[industry][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[industry][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[industry][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[industry][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[industry][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Industries Order')}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" name="name[industries_order][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[industries_order][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Blog')}}</td>
                                <td><input type="checkbox" name="name[blog][can-add]" value="1"></td>
                                <td><input type="checkbox" name="name[blog][can-edit]" value="1"></td>
                                <td><input type="checkbox" name="name[blog][can-delete]" value="1"></td>
                                <td><input type="checkbox" name="name[blog][can-view]" value="1"></td>
                                <td><input type="checkbox" name="name[blog][can-list]" value="1"></td>
                            </tr>
                            <tr>
                                <td>{{trans('dashboard_trans.Mail')}}</td>
                                <td><input type="checkbox" name="name[mail][can-add]" value="1"></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" name="name[mail][can-view]" value="1"></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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



@endsection

