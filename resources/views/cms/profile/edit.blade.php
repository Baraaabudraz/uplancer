@extends('cms.layouts.master')
@section('title', 'إعدادات الحساب')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Profile')}}</h1>
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
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Profile')}}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                @if(session()->has('alert-type'))
                    <!--begin::Alert-->
                    <div class="alert {{session()->get('alert-type')}} alert-dismissible bg-light-primary  d-flex flex-column flex-sm-row p-5 mb-10 ">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-primary  me-4 mb-5 mb-sm-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.25" x="3" y="21" width="18" height="2" rx="1"
                                                      fill="#191213"></rect>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M4.08576 11.5L3.58579 12C3.21071 12.375 3 12.8838 3 13.4142V17C3 18.1045 3.89543 19 5 19H8.58579C9.11622 19 9.62493 18.7893 10 18.4142L10.5 17.9142L4.08576 11.5Z"
                                                      fill="#121319"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.5 10.0858L11.5858 4L18 10.4142L11.9142 16.5L5.5 10.0858Z"
                                                      fill="#121319"></path>
                                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M18.1214 1.70705C16.9498 0.535476 15.0503 0.535476 13.8787 1.70705L13 2.58576L19.4142 8.99997L20.2929 8.12126C21.4645 6.94969 21.4645 5.0502 20.2929 3.87862L18.1214 1.70705Z"
                                                      fill="#191213"></path>
                                            </svg>

                                        </span>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <!--begin::Content-->
                            <h5>{{session()->get('message')}}</h5>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z"
                                                          fill="#12131A"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.29289 8.29289C8.68342 7.90237 9.31658 7.90237 9.70711 8.29289L12 10.5858L14.2929 8.29289C14.6834 7.90237 15.3166 7.90237 15.7071 8.29289C16.0976 8.68342 16.0976 9.31658 15.7071 9.70711L13.4142 12L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L12 13.4142L9.70711 15.7071C9.31658 16.0976 8.68342 16.0976 8.29289 15.7071C7.90237 15.3166 7.90237 14.6834 8.29289 14.2929L10.5858 12L8.29289 9.70711C7.90237 9.31658 7.90237 8.68342 8.29289 8.29289Z"
                                                          fill="#12131A"></path>
                                                </svg>
                                            </span>
                        </button>
                        <!--end::Close-->
                    </div>
                @endif
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{trans('dashboard_trans.General Information')}}</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                    @auth('admin')
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Update User Data Form-->
                    <form method="POST" action="{{ route('profile.update',auth()->user()->id) }}" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--begin::Card body-->
                        <div class="row card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Image')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('assets/media/avatars/blank.png')}})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper" style="background-image: url('{{asset('images/admin/'.auth()->user()->image)}}')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">{{trans('dashboard_trans.Allowed file types')}}: png، jpg، jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">{{trans('dashboard_trans.Name')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-6 fv-row">
                                            <input type="text" name="name" class="form-control form-control-solid " placeholder="{{trans('dashboard_trans.Name')}}" value="{{auth()->user()->name}}" />
                                            @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6 ">
                                <label  class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Address')}}</label>
                                <div class="col-lg-4 fv-row">
                                <input type="text" name="address" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Address')}}" value="{{auth()->user()->address}}" />
                                @error('address')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-6 ">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Phone')}} </label>
                                <div class="col-lg-4 fv-row">
                                <input type="tel" name="mobile_number" value="{{auth()->user()->mobile_number}}" class="form-control form-control-solid @error('mobile_number') is-invalid @enderror ">
                                @error('mobile_number')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-6 ">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Gender')}} </label>
                                <div class="col-lg-6 fv-row">
                                <div class="form-check form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                           value="Male" @if(auth()->user()->gender === 'Male') checked @endif>
                                    <label class="form-check-label" for="gender_male">{{trans('dashboard_trans.Male')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                           value="Female" @if(auth()->user()->gender === 'Female') checked @endif>
                                    <label class="form-check-label" for="gender_female">{{trans('dashboard_trans.Female')}}</label>
                                </div>
                                @error('gender')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Email')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="email" data-placeholder="البريد الالكتروني" name="email" class="form-control form-control-solid" value="{{auth()->user()->email}}" />
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">{{trans('dashboard_trans.Password')}}</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-4 fv-row">
                                    <input type="password" name="password" class="form-control form-control-solid" placeholder=" {{trans('dashboard_trans.Password')}}" />
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">{{trans('dashboard_trans.Clear data')}}</button>
                            <button type="submit" class="btn btn-primary">{{trans('dashboard_trans.Save Edit')}}</button>
                        </div>
                        <!--end::Actions-->
                    <!--end::Update User Data Form-->
                </div>
                    </form>

                <!--end::Content-->
            </div>

                    <!--end::Content-->
                </div>

            <!--end::Content-->
    </div>
    @endauth




        <!--end::Container-->

    <!--end::Post-->
@endsection
@section('scripts')
    <script>

        function addNewField() {
            var container = document.getElementById("fields-container");
            var fieldCount = container.getElementsByClassName("form-group").length;

            var newField = document.createElement("div");
            newField.className = "form-group";

            var label = document.createElement("label");
            label.innerText = "محل تفريغ " + (fieldCount + 1) + ":";

            var input = document.createElement("input");
            input.type = "text";
            input.name = "store[]";
            input.className = "form-control form-control-solid ";

            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.onclick = function() { removeField(this); };
            deleteButton.className = "btn-sm btn-danger";

            var deleteIcon = document.createElement("i");
            deleteIcon.className = "fas fa-trash";

            deleteButton.appendChild(deleteIcon);

            newField.appendChild(label);
            newField.appendChild(input);
            newField.appendChild(deleteButton);

            container.appendChild(newField);
        }

        function removeField(button) {
            var field = button.parentNode;
            var container = field.parentNode;
            container.removeChild(field);
        }
    </script>
@endsection
