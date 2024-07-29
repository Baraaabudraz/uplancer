@extends('frontend.parent')
@section('title')
    {{trans('home_trans.Select a login method')}}
@endsection
@section('style')

    <!-- css -->
{{--    @if(App::getLocale()=='ar')--}}
{{--    <link href="{{asset('cms/assets/css/selection/rtl.css') }}" rel="stylesheet">--}}
{{--    @else--}}
{{--    <link href="{{asset('cms/assets/css/selection/ltr.css') }}" rel="stylesheet">--}}
{{--    @endif--}}
@endsection
@section('content')
    <div class="c-layout-page" style="margin-top: 100px;">
    <div class="wrapper">
        <section class="height-100vh d-flex align-items-center page-section-ptb login">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align" >
                    <div style="border-radius: 15px;" class="col-lg-6 col-md-6  bg-white">
                        <div class="login-fancy pb-40 clearfix" >
                            <div class="card-title">
                                <h3 style="font-family: 'Tajawal', sans-serif" >{{trans('home_trans.Select a login method')}}</h3>
                                <hr>
                            </div>
                            <div class="form-inline" >
                                <a class="btn btn-default col-lg-3" title="{{trans('home_trans.Industries')}}" href="{{route('loginView','industry')}}">
                                    <img alt="user-img" width="100px;" src="{{asset('cms/img/industry.png')}}">
                                    <div class="c-info" align="center">
                                        <label >{{trans('home_trans.Industries')}}</label>
                                    </div>
                                </a>

                                <a class="btn btn-default col-lg-3" title="{{trans('home_trans.Users')}}" href="{{route('loginView','user')}}">
                                    <img alt="user-img" width="100px;" src="{{asset('cms/img/users.png')}}">
                                    <div class="c-info" align="center">
                                        <label>{{trans('home_trans.Users')}}</label>
                                    </div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
    </div>
        </section>

        <!--=================================
    login-->
    </div>
    <div class="c-layout-page" style="margin-top: 100px;">
    <!-- jquery -->
{{--    <script src="{{asset('admin/js/jquery-3.3.1.min.js') }}"></script>--}}
{{--    <!-- plugins-jquery -->--}}
{{--    <script src="{{asset('admin/js/plugins-jquery.js') }}"></script>--}}
{{--    <!-- plugin_path -->--}}
{{--    <script>--}}
{{--        var plugin_path = 'js/';--}}

{{--    </script>--}}


{{--    <!-- toastr -->--}}
{{--    @yield('j')--}}
{{--    <!-- custom -->--}}
{{--    <script src="{{asset('admin/js/custom.js') }}"></script>--}}

@endsection



