@extends('cms.layouts.master')

@section('title', trans('dashboard_trans.Home'))

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-wrap justify-content-between">
            <div class="page-title d-flex align-items-center">
                <h1 class="text-dark fw-bolder fs-3">{{ trans('dashboard_trans.Home') }}</h1>
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7">
                    <li class="breadcrumb-item text-muted">{{ trans('dashboard_trans.Dashboard') }}</li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-dark">{{ trans('dashboard_trans.Home') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-5 g-xl-8">
        @php
            $cards = [
                ['route' => 'services.index', 'bg' => 'info'   , 'icon' => 'print',     'title' => trans('dashboard_trans.Services')],
                ['route' => 'projects.index', 'bg' => 'primary', 'icon' => 'list',      'title' => trans('dashboard_trans.Projects')],
                ['route' => 'members.index',  'bg' => 'warning', 'icon' => 'users',     'title' => trans('dashboard_trans.Team Members')],
                ['route' => 'sponsors.index', 'bg' => 'success', 'icon' => 'copyright', 'title' => trans('dashboard_trans.Sponsors')],
            ];
        @endphp

        @foreach($cards as $card)
            <div class="col-md-6 col-xl-3">
                <a href="{{ route($card['route']) }}" class="card bg-{{ $card['bg'] }} hoverable card-xl-stretch mb-5">
                    <div class="card-body text-center">
                        <span class="svg-icon svg-icon-white svg-icon-3x">
                            <i class="fas fa-{{ $card['icon'] }} fa-3x"></i>
                        </span>
                        <div class="text-white fw-bolder fs-4 mt-4">{{ $card['title'] }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @if(setting())
        <div class="card-body">
            <div class="text-center mb-4" style="background-color: #5d3991; padding: 20px; border-radius: 10px;">
                <img src="{{ Storage::url(setting()->logo ?? '') }}" class="image-input-wrapper w-200px bgi-position-center mb-3 " alt="{{ setting()->alt ?? '' }}">
            </div>

            <div class="row mb-3">
                <label class="col-lg-4 fw-bold text-muted">{{ trans('dashboard_trans.Website Name') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ setting()->name }}</span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-4 fw-bold text-muted">{{ trans('dashboard_trans.Email') }}</label>
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">{{ setting()->email }}</span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-4 fw-bold text-muted">{{ trans('dashboard_trans.Phone') }}</label>
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bolder fs-6 text-gray-800 me-2">{{ setting()->phone }}</span>
                    <span class="badge bg-success">{{ trans('dashboard_trans.Verified') }}</span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-4 fw-bold text-muted">{{ trans('dashboard_trans.Company Site') }}</label>
                <div class="col-lg-8">
                    <a href="{{ setting()->url }}" target="_blank" class="fw-bold fs-6 text-primary text-decoration-none">{{ setting()->name }}</a>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-lg-4 fw-bold text-muted">{{ trans('dashboard_trans.Connected Accounts') }}</label>
                <div class="col-lg-8">
                    <a href="{{ setting()->linkedin }}"><img src="{{ asset('assets/media/svg/brand-logos/linkedin.svg') }}" class="w-30px me-2" alt=""></a>
                    <a href="{{ setting()->facebook }}" target="_blank"><img src="{{ asset('assets/media/svg/brand-logos/facebook-4.svg') }}" class="w-30px me-2" alt=""></a>
                    <a href="{{ setting()->instagram }}"><img src="{{ asset('assets/media/svg/brand-logos/instagram-2016.svg') }}" class="w-30px me-2" alt=""></a>
                    <a href="{{ setting()->x }}"><img src="{{ asset('assets/media/svg/brand-logos/twitter.svg') }}" class="w-30px me-2" alt=""></a>
                </div>
            </div>
        </div>
    @else
        <div class="card-body text-center text-muted">لم يتم ضبط إعدادات الموقع بعد</div>
    @endif
@endsection

