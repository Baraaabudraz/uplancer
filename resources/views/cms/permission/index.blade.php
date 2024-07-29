@extends('cms.layouts.master')

@section('title')
    {{trans('dashboard_trans.All permissions')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Permissions')}}</h1>
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
                        <a href="{{route('permissions.index')}}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Permissions')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.All permissions')}}</li>
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
                <span class="card-label fw-bolder fs-3 mb-1">{{trans('dashboard_trans.All permissions')}}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('permissions.create')}}" class="btn btn-sm btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                    <span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                    <!--end::Svg Icon-->  {{trans('dashboard_trans.Add new permissions')}}</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!----------------------------------------------------------------------->
            <!--end::Alert-->
            <!--begin::Table container-->
            <div class="table-responsive">
                <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>#</th>
                        <th>{{trans('dashboard_trans.Role')}}</th>
                        <th>{{trans('dashboard_trans.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($permissions)>0)
                            @foreach($permissions as $key=>$permission)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$permission->role->name}}</td>
                                    <td>
                                        <a href="{{route('permissions.edit' , $permission->id)}}" class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                                            <span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<path
                                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
																		<path
                                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3"/>
																	</svg>
																</span>
                                            <!--end::Svg Icon-->{{trans('dashboard_trans.Edit')}}</a>

                                        <a href="#"  onclick="confirmDelete (this, '{{ $permission->id }}')"
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
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td>No permission to display</td>
                        @endif
                        </tbody>
                    </table>
                <div class="kt-pagination--circle float-end">
                    <ul class="pagination">
                        {{$permissions->links()}}
                    </ul>
                </div>
                </div>
            </div>
        </div>
@endsection
@section('page-scripts')
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
                        deletePermission(app, id)
                    )
                }
            })
        }
        function deletePermission(app, id) {
            axios.delete('/cms/admin/permissions/' + id)
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
