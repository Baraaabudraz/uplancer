@extends('cms.layouts.master')

@section('title')
    {{trans('dashboard_trans.All sections')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Sections')}}</h1>
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
                        <a href="{{route('sections.index')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Sections')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.All sections')}}</li>
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
                <span class="card-label fw-bolder fs-3 mb-1">{{trans('dashboard_trans.All sections')}}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('sections.create')}}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                    <span class="svg-icon svg-icon-2">
												<i class="fa fa-plus"></i>
											</span>
                    <!--end::Svg Icon-->  {{trans('dashboard_trans.Add new section')}}</a>
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
                <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>#</th>
                            <th>{{trans('dashboard_trans.Name')}}</th>
                            <th>{{trans('dashboard_trans.Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($sections)>0)
                            @foreach($sections as $key=>$section)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$section->name}}</td>
                                    <td>
                                        <a href="{{route('sections.edit',$section->id)}}" type="button"
                                           class="btn btn-primary btn-sm active">{{trans('dashboard_trans.Edit')}}</a>
                                        <a href="#" onclick="confirmDelete (this, '{{ $section->id }}')" type="button"
                                           class="btn btn-danger btn-sm">{{trans('dashboard_trans.Delete')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td>No created section yet</td>
                        @endif
                        </tbody>
                    </table>
                <div class="kt-pagination--circle float-end">
                    <ul class="pagination">
                        {{$sections->links()}}
                    </ul>
                </div>
                </div>
            </div>
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
                        deleteSection(app, id)
                    )
                }
            })
        }
        function deleteSection(app, id) {
            axios.delete('/cms/admin/sections/' + id)
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
