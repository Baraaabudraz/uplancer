@extends('cms.layouts.master')
@section('content')
    <form action="{{route('products.create')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">{{trans('dashboard_trans.Image')}}</span>
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Image')}}"></i>
        </label>
        <br>
        <!--end::Label-->
        <div class="dz-default dz-message">قم بإسقاط الصور هنا أو إضغط للرفع</div>
    </form>

@endsection
