@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Edit product')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Edit product')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Products')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit product')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Edit product')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of products')}}
                            <a href="#" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <form method="POST" action="{{route('products.update',$products->id)}}" enctype="multipart/form-data" class="w-100 position-relative mb-3">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-10" style="border:1px ">
                                <div class="row">
                                    @foreach(config('lang') as $key => $lang)
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Name')}} {{$lang}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                               data-bs-toggle="tooltip"
                                               title="{{trans('dashboard_trans.Name')}}"></i>
                                        </label>
                                            <input class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Enter Name Of')}} {{trans('dashboard_trans.product')}} " name="name[{{$key}}]" value="{{$products->getTranslation('name' ,$key)}}" />
                                        @error('name.'.$key)
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    @endforeach
                                        @foreach(config('lang') as $key => $lang)
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Description')}} {{$lang}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""></i>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{$products->getTranslation('description',$key)}}</textarea>
                                        @error('description.'.$key)
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        @endforeach
                                        @foreach(config('lang') as $key => $lang)
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Additional information')}} {{$lang}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <textarea name="additional_info[{{$key}}]" class="form-control @error('additional_info') is-invalid @enderror ">{{$products->getTranslation('additional_info',$key)}}</textarea>
                                        @error('additional_info.'.$key)
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        @endforeach
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Choose industrial sector')}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                            <option disabled hidden selected>{{trans('dashboard_trans.Choose')}} {{trans('dashboard_trans.Industrial Sector')}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($products->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Choose subcategory')}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <select name="subcategory_id" id="subcategory_id"   class="form-select @error('subcategory_id') is-invalid @enderror" >
                                            <option value="" id="loading" @if($products->subcategory_id == 'category_id') selected @endif>Loading</option>
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        @auth('admin')
                                    <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Choose industry')}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"></i>
                                        </label>
                                        <select class="form-select @error('industry_id') is-invalid @enderror"  name="industry_id">
                                            <option disabled hidden selected>{{trans('dashboard_trans.Choose industry')}}</option>
                                            @foreach($industries as $industry)
                                                <option value="{{$industry->id}}" @if($products->industry_id == $industry->id) selected @endif>{{$industry->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('industry_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        @endauth
                                    <div  class="col-md-6 ">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">{{trans('dashboard_trans.Image')}}</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Image')}}"></i>
                                        </label>
                                        <br>
                                        <input id="files" type="file"  class="dropzone" name="images[]" multiple="multiple" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <output id="result">
                                        @foreach(json_decode($products->image) as $key => $image)
                                            <img src="{{url('images/product/',$image)}}" style="height: 100px" width="100">
                                        @endforeach
                                    </output>

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
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->

        </div>


    </div>
    <!--end::Card-->

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                $('#subcategory_id').empty()
                var category_id = this.value;
                $.ajax({
                    url: "{{route('get_subcategories')}}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function(result){
                        $.each(result, function(key, modelName){
                            console.log(key)
                            //Use the Option() constructor to create a new HTMLOptionElement.
                            var option = new Option(key, modelName);
                            //Convert the HTMLOptionElement into a JQuery object that can be used with the append method.
                            $(option).html(modelName);
                            $(option).val(key);
                            //Append the option to our Select element.
                            $("#subcategory_id").append(option);
                        });

                        //Change the text of the default "loading" option.
                        $('#loading').text('-- select --');
                    }
                });
            });
        });
    </script>
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
@endsection