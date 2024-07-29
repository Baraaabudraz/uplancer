@extends('cms.layouts.master')
@section('title')
    {{trans('dashboard_trans.Edit User')}}
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{trans('dashboard_trans.Edit User')}}</h1>
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
                    <a href="#" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Users')}}</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit User')}}</li>
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
                        <h1 class="mb-3">{{trans('dashboard_trans.Edit User')}}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-gray-400 fw-bold fs-5">{{trans('dashboard_trans.You can browse the list of user')}}
                            <a href="{{route('users.index')}}" class="fw-bolder link-primary">{{trans('dashboard_trans.here')}}</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
        <form action="{{route('users.update',$users->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-10" style="border:1px ">
                    <div class="row">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between mb-7">
                            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.General Information')}}</h6>
                        </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Name')}}</label>
                            <input type="text" name="name" value="{{$users->name}}"
                                       class="form-control @error('name') is-invalid @enderror" required="">
                                @error('name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.User Name')}}</label>
                            <input type="text" name="user_name" value="{{$users->user_name}}"
                                       class="form-control @error('name') is-invalid @enderror" required="">
                                @error('user_name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Address')}}</label>
                            <input type="text" name="address" value="{{$users->address}}" class="form-control ">
                                @error('address')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Country')}}</label>
                            <select class="form-control input-lg c-square" name="country" id="country">
                                <option value="1" hidden disabled selected>{{trans('dashboard_trans.Country')}}</option>
                                <option value="Afghanistan" @if($users->country == 'Afghanistan') selected @endif>Afghanistan</option>
                                <option value="Albania" @if($users->country == 'Afghanistan') selected @endif>Albania</option>
                                <option value="Algeria" @if($users->country == 'Albania') selected @endif>Algeria</option>
                                <option value="American Samoa" @if($users->country == 'American Samoa') selected @endif>American Samoa</option>
                                <option value="Andorra" @if($users->country == 'Andorra') selected @endif>Andorra</option>
                                <option value="Angola" @if($users->country == 'Angola') selected @endif>Angola</option>
                                <option value="Anguilla" @if($users->country == 'Anguilla') selected @endif>Anguilla</option>
                                <option value="Antartica" @if($users->country == 'Antartica') selected @endif>Antarctica</option>
                                <option value="Antigua and Barbuda" @if($users->country == 'Antigua and Barbuda') selected @endif>Antigua and Barbuda</option>
                                <option value="Argentina" @if($users->country == 'Argentina') selected @endif>Argentina</option>
                                <option value="Armenia" @if($users->country == 'Armenia') selected @endif>Armenia</option>
                                <option value="Aruba" @if($users->country == 'Aruba') selected @endif>Aruba</option>
                                <option value="Australia" @if($users->country == 'Australia') selected @endif>Australia</option>
                                <option value="Austria" @if($users->country == 'Austria') selected @endif>Austria</option>
                                <option value="Azerbaijan" @if($users->country == 'Azerbaijan') selected @endif>Azerbaijan</option>
                                <option value="Bahamas" @if($users->country == 'Bahamas') selected @endif>Bahamas</option>
                                <option value="Bahrain" @if($users->country == 'Bahrain') selected @endif>Bahrain</option>
                                <option value="Bangladesh" @if($users->country == 'Bangladesh') selected @endif>Bangladesh</option>
                                <option value="Barbados" @if($users->country == 'Barbados') selected @endif>Barbados</option>
                                <option value="Belarus" @if($users->country == 'Belarus') selected @endif>Belarus</option>
                                <option value="Belgium" @if($users->country == 'Belgium') selected @endif>Belgium</option>
                                <option value="Belize" @if($users->country == 'Belize') selected @endif>Belize</option>
                                <option value="Benin" @if($users->country == 'Benin') selected @endif>Benin</option>
                                <option value="Bermuda" @if($users->country == 'Bermuda') selected @endif>Bermuda</option>
                                <option value="Bhutan" @if($users->country == 'Bhutan') selected @endif>Bhutan</option>
                                <option value="Bolivia" @if($users->country == 'Bolivia') selected @endif>Bolivia</option>
                                <option value="Bosnia and Herzegowina" @if($users->country == 'Bosnia and Herzegowina') selected @endif>Bosnia and Herzegowina</option>
                                <option value="Botswana" @if($users->country == 'Botswana') selected @endif>Botswana</option>
                                <option value="Bouvet Island" @if($users->country == 'Bouvet Island') selected @endif>Bouvet Island</option>
                                <option value="Brazil" @if($users->country == 'Brazil') selected @endif>Brazil</option>
                                <option value="British Indian Ocean Territory" @if($users->country == 'British Indian Ocean Territory') selected @endif>British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam" @if($users->country == 'Brunei Darussalam') selected @endif>Brunei Darussalam</option>
                                <option value="Bulgaria" @if($users->country == 'Bulgaria') selected @endif>Bulgaria</option>
                                <option value="Burkina Faso" @if($users->country == 'Burkina Faso') selected @endif>Burkina Faso</option>
                                <option value="Burundi" @if($users->country == 'Burundi') selected @endif>Burundi</option>
                                <option value="Cambodia" @if($users->country == 'Cambodia') selected @endif>Cambodia</option>
                                <option value="Cameroon" @if($users->country == 'Cameroon') selected @endif>Cameroon</option>
                                <option value="Canada" @if($users->country == 'Canada') selected @endif>Canada</option>
                                <option value="Cape Verde" @if($users->country == 'Cape Verde') selected @endif>Cape Verde</option>
                                <option value="Cayman Islands" @if($users->country == 'Cayman Islands') selected @endif>Cayman Islands</option>
                                <option value="Central African Republic" @if($users->country == 'Central African Republic') selected @endif>Central African Republic</option>
                                <option value="Chad" @if($users->country == 'Chad') selected @endif>Chad</option>
                                <option value="Chile" @if($users->country == 'Chile') selected @endif>Chile</option>
                                <option value="China" @if($users->country == 'China') selected @endif>China</option>
                                <option value="Christmas Island" @if($users->country == 'Christmas Island') selected @endif>Christmas Island</option>
                                <option value="Cocos Islands" @if($users->country == 'Cocos Islands') selected @endif>Cocos (Keeling) Islands</option>
                                <option value="Colombia" @if($users->country == 'Colombia') selected @endif>Colombia</option>
                                <option value="Comoros" @if($users->country == 'Comoros') selected @endif>Comoros</option>
                                <option value="Congo" @if($users->country == 'Congo') selected @endif>Congo</option>
                                <option value="Cook Islands" @if($users->country == 'Cook Islands') selected @endif>Cook Islands</option>
                                <option value="Zimbabwe" @if($users->country == 'Zimbabwe') selected @endif>Zimbabwe</option>
                            </select>
                            @error('country')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Phone')}}</label>
                            <input type="tel" name="mobile" value="{{$users->mobile}}" class="form-control @error('mobile') is-invalid @enderror">
                                @error('mobile')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between mb-7">
                            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard_trans.Login Information')}}</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Email')}}</label>
                                <input type="email" value="{{$users->email}}" name="email"
                                       class="form-control @error('email') is-invalid @enderror" required="">
                                @error('email')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">{{trans('dashboard_trans.Password')}}</label>
                                <input type="password" name="password" class="form-control" required="" placeholder="{{trans('dashboard_trans.Password')}}">
                                @error('password')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-footer d-flex justify-content-center py-6 px-9">
                    <button type="reset" class="btn btn-white btn-active-light-primary me-2">
                        {{trans('dashboard_trans.Clear data')}}
                    </button>
                    <button type="submit" class="addUserBtn1 btn btn-success me-2">
                        {{trans('dashboard_trans.Edit')}}
                    </button>
                </div>
        </form>
            </div>
        </div>
    </div>
@endsection

