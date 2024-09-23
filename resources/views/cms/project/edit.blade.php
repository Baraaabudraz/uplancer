@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Edit project')}}
@endsection

@section('links')
    <style>
        #result{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px 0;
        }

        .thumbnail {
            height: 92px;
            border: 4px #ffb500 solid;
            border-radius: 10px;
        }
    </style>
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Edit project')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All projects')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit project')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Edit project')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of projects')}}
                            <a href="{{ route('projects.index') }}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" action="{{route('projects.update',$project->id)}}" enctype="multipart/form-data" class="w-100 position-relative mb-3">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-10" style="border:1px ">
                                <div class="row">
                                    @foreach(config('lang') as $key => $lang)
                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Name')}} ({{$lang}})</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                   data-bs-toggle="tooltip"
                                                   title="{{trans('dashboard_trans.Enter the name of the project')}}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter the name of the project')}} " name="name[{{$key}}]" value="{{$project->getTranslation('name',$key)}}" />
                                            @error('name.'.$key)
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @endforeach

                                    @foreach(config('lang') as $key => $lang)
                                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">{{trans('dashboard_trans.Description')}} ({{$lang}})</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                            </label>
                                            <!--end::Label-->
                                            <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{$project->getTranslation('description',$key)}}</textarea>
                                            @error('description.'.$key)
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @endforeach
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Services')}}</label>
                                        <select class="form-select" name="service_id" >
                                            <option disabled hidden selected>{{trans('dashboard_trans.All services')}}</option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}" @selected($project->service_id  == $service->id)>{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div  class="col-md-6 ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Image')}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Image')}}"></i>
                                        </label>
                                        <br>
                                        <!--end::Label-->

                                        {{--                                            <div class="dz-default dz-message" >قم بإسقاط الصور هنا أو إضغط للرفع</div>--}}
                                        <input id="files" type="file" class="dropzone" name="images[]" multiple="multiple" accept="image/jpeg, image/png, image/jpg,image/webp">
                                    </div>
                                    <output id="result">
                                        @foreach(json_decode($project->images) as $key => $image)
                                            <img src="{{url('images/projects/',$image)}}" style="height: 100px" width="100">
                                        @endforeach
                                    </output>

                                </div>
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">{{trans('dashboard_trans.Additional information')}}</h3>
                                        </div>
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_notifications" class="collapse show">
                                        <!--begin::Form-->
                                        <!--begin::Card body-->
                                        <div class="card-body border-top px-9 pt-3 pb-4">
                                            <div class="row mb-8">
                                                <!--begin::Col-->
                                                <div class="col-xl-3">
                                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Project Features')}}</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                    <div id="features-container">
                                                        @foreach(json_decode($project->features) as $features)
                                                        <div class="feature-input d-flex mb-3">
                                                            <input type="text" name="features[]" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Features')}}" value="{{$features}}">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- زر إضافة خاصية جديدة -->
                                                    <button type="button" id="add-feature-btn" class="btn btn-light-primary mt-3">{{trans('dashboard_trans.Add Feature')}}</button>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->

                                            </div>
                                            <div class="row mb-8">
                                                <!--begin::Col-->
                                                <div class="col-xl-3">
                                                    <div class="fs-6 fw-bold mt-2 mb-3">{{trans('dashboard_trans.Technology')}}</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                                    <div id="features-container">
                                                        <div class="feature-input d-flex mb-3">
                                                            <input type="text" name="technology" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Technology')}}" value="{{$project->technology}}">
                                                        </div>
                                                    </div>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    @error('technology')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <!--end::Col-->

                                            </div>

                                        </div>
                                        <!--end::Card body--><!--end::Form-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </div>
                        </div>


                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-center py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">
                                {{trans('dashboard_trans.Clear data')}}
                            </button>

                            <button type="submit" class="addUserBtn1 btn btn-success me-2">
                                {{trans('dashboard_trans.Save Edit')}}
                            </button>
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
        document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
            if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
                const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
                const output = document.querySelector("#result");
                output.innerHTML = "";
                for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
                    if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
                    const picReader = new FileReader(); // RETRIEVE DATA URI
                    picReader.addEventListener("load", function (event) { // LOAD EVENT FOR DISPLAYING PHOTOS
                        const picFile = event.target;
                        const div = document.createElement("div");
                        div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]); //READ THE IMAGE
                }
            } else {
                alert("Your browser does not support File API");
            }
        });
    </script>

    <script>
        document.getElementById('add-feature-btn').addEventListener('click', function() {
            // إنشاء حقل إدخال جديد مع زر حذف
            var newFeatureGroup = document.createElement('div');
            newFeatureGroup.classList.add('feature-input', 'd-flex', 'mb-3');

            // إنشاء حقل الإدخال الجديد
            var newFeatureInput = document.createElement('input');
            newFeatureInput.type = 'text';
            newFeatureInput.name = 'features[]';
            newFeatureInput.classList.add('form-control', 'form-control-solid');
            newFeatureInput.placeholder = "{{trans('dashboard_trans.Features')}}";

            // إنشاء زر الحذف للحقل الجديد
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-2', 'remove-feature-btn');
            deleteButton.textContent = "{{trans('dashboard_trans.Delete')}}";

            // إضافة حقل الإدخال وزر الحذف للمجموعة
            newFeatureGroup.appendChild(newFeatureInput);
            newFeatureGroup.appendChild(deleteButton);

            // إضافة المجموعة الجديدة إلى حاوية الخصائص
            document.getElementById('features-container').appendChild(newFeatureGroup);

            // إضافة وظيفة الحذف لزر الحذف الجديد
            deleteButton.addEventListener('click', function() {
                newFeatureGroup.remove();
            });
        });

        // إضافة وظيفة الحذف لأزرار الحذف الموجودة مسبقًا (في حال كانت هناك حقول مسبقة مضافة)
        document.querySelectorAll('.remove-feature-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                button.parentElement.remove();
            });
        });
    </script>
@endsection
