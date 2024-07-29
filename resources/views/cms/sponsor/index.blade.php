@extends('cms.layouts.master')

@section('title')
    {{trans('dashboard_trans.Sponsors')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3"> {{trans('dashboard_trans.Sponsors')}}</h1>
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
                        <a href="{{route('categories.index')}}" class="text-muted text-hover-primary"> {{trans('dashboard_trans.Sponsors')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark"> {{trans('dashboard_trans.Sponsors')}}</li>
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
                <span class="card-label fw-bolder fs-3 mb-1"> {{trans('dashboard_trans.Sponsors')}}</span>
            </h3>

            <div class="card-toolbar">
                @if(isset(Auth()->user()->role->permission['name']['sponsor']['can-add']))
                    <a href="{{route('sponsors.create')}}" class="btn btn-sm btn-light-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                        <span class="svg-icon svg-icon-2">
												<i class="fa fa-plus"></i>
											</span>
                        <!--end::Svg Icon-->  {{trans('dashboard_trans.Add new sponsor')}}</a>
                @endif
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
                        <th>{{trans('dashboard_trans.Image')}}</th>
                        <th>{{trans('dashboard_trans.Name')}}</th>
                        <th>{{trans('dashboard_trans.Operations')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sponsors as $key=>$sponsor)
                        <tr>
                            <td>{{$key+1}}</td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-30px me-5">
                                        <img src="{{url('/images/sponsor/'.$sponsor->image)}}" class="" alt="">
                                    </div>
                                </div>
                            </td>

                            <td>{{$sponsor->name}}</td>
                            <td>
                                @if(isset(Auth()->user()->role->permission['name']['sponsor']['can-edit']))
                                    <a href="{{route('sponsors.edit' , $sponsor->id)}}" class="btn btn-sm btn-light-primary">
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
                                @endif
                                @if(isset(Auth()->user()->role->permission['name']['sponsor']['can-delete']))
                                    <a href="#"  onclick="confirmDelete (this, '{{ $sponsor->id }}')"
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
                                @endif
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="kt-pagination--circle float-end">
                    <ul class="pagination">
                        {{$sponsors->links()}}
                    </ul>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>



@endsection


@section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/advanced.js')}}"></script>

    <script>

        $('#kt_modal_1').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

    </script>

    <script src="{{asset('/assets/js/axios.js')}}"></script>
    <script>
        function confirmDelete(app,id){
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
                        deleteSponsor(app,id)
                    )

                }
            })
        }
        function deleteSponsor(app,id){
            axios.delete('/cms/admin/sponsors/'+id)
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
        function showMessage(data){
            let timerInterval
            Swal.fire({
                title: data.title,
                text:data.text,
                icon:data.icon,
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

