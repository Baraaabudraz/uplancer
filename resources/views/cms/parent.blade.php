<!DOCTYPE html>
@if(App::getLocale()=='ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif
	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>{{trans('home_trans.Masnaaco')}} | {{trans('dashboard_trans.Dashboard')}} </title>
		<meta name="description" content="Updates and statistics">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

        <!--end::Fonts -->


        @yield('head-page-vendor')
		<!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('cms/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />

@yield('style')
        @if(App::getLocale()=='ar')
            <link href="{{asset('cms/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{asset('cms/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        @endif
		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="{{asset('cms/assets/css/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('cms/assets/css/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('cms/assets/css/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('cms/assets/css/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{asset('cms/assets/media/logos/favicon.ico')}}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{asset('cms/assets/media/logos/logo-light.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->

				<!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="index.html">
								<img alt="Logo" src="{{asset('cms/assets/media/logos/logo-light.png')}}" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>

							<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                                    <a href="{{ route('dashboard') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
												<i class="fas fa-fw fa-tachometer-alt"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Dashboard')}}</span>
                                    </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
                                    <a href="{{ route('home') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
												<i class="fas fa-fw fa-home"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Go to website ')}}</span>
                                    </a>
                                </li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Custom</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="{{route('categories.index')}}" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                            <i class="fas fa-fw fa-list-alt"></i>
                                         </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Industrial Sectors')}}</span>
                                      </a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="{{route('subcategories.index')}}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg></span><span class="kt-menu__link-text">{{trans('dashboard_trans.Subcategories')}}</span></a>

								</li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="{{route('products.index')}}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg></span><span class="kt-menu__link-text">{{trans('dashboard_trans.Products')}}</span></a>

                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="{{route('slider.index')}}" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                            <i class="far fa-fw fa-window-minimize"></i>
                                         </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Slides')}}</span>
                                    </a>
                                </li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">{{trans('dashboard_trans.Users')}}/{{trans('dashboard_trans.Industries')}}</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                            <i class="fa fa-user-alt"></i>
                                       </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Users')}}</span>
                                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                    </a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Skins</span></span></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('admins.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Admins')}}</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('users.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Users')}}</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('industries.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Industries')}}</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Shipping Companies')}}</span></a></li>
										</ul>
									</div>
								</li>

								<li class="kt-menu__item " aria-haspopup="true">
                                    <a target="_blank" href="{{route('industries_orders.industries')}}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Industries Order')}}</span>
                                    </a>
                                </li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">{{trans('dashboard_trans.Blog')}}</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                             <i class="fa fa-blog"></i>
                                         </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Blog')}}</span>
                                        <i class="kt-menu__ver-arrow la la-angle-right">
                                        </i>
                                    </a>
                                    <div class="kt-menu__submenu ">
                                        <span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Skins</span></span></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('sections.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Sections')}}</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('posts.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Posts')}}</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__section ">
                                    <h4 class="kt-menu__section-text">{{trans('dashboard_trans.Mail')}}</h4>
                                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="{{route('mail.create')}}" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                          <i class="fa fa-mail-bulk"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Mail')}}</span></a>
                                </li>
                                <li class="kt-menu__section ">
                                    <h4 class="kt-menu__section-text">{{trans('dashboard_trans.Settings')}}</h4>
                                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                        <span class="kt-menu__link-icon">
                                        <i class="fa fa-cog"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{trans('dashboard_trans.Settings')}}</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu ">
                                        <span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Skins</span></span></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('roles.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Roles')}}</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('permissions.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{trans('dashboard_trans.Permissions')}}</span></a></li>
                                        </ul>
                                    </div>
                                </li>
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">


					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->

						<!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"></div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Search -->

							<!--begin: Search -->
							<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg> </span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
									<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
										<form method="get" class="kt-quick-search__form">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
												<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
												<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
											</div>
										</form>
										<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
										</div>
									</div>
								</div>
							</div>

							<!--end: Search -->

							<!--end: Search -->


							<!--begin: Language bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--langs">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon">
                                         @if (App::getLocale() == 'en')
                                            <img class="" src="{{asset('cms/assets/media/flags/226-united-states.svg')}}" alt="" />
                                        @else
                                            <img class="" src="{{asset('cms/assets/media/flags/133-saudi-arabia.svg')}}" alt="" />
                                        @endif
									</span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
									<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                        @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                                        <li class="kt-nav__item kt-nav__item--active">
											<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="kt-nav__link">
												<span class="kt-nav__link-icon"></span>
												<span class="kt-nav__link-text"> {{ $properties['native'] }}</span>
											</a>

										</li>
                                        @endforeach

									</ul>
								</div>
							</div>

							<!--end: Language bar -->

							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile">{{Auth()->user()->name}}</span>
										<img class="kt" alt="Pic" src="{{url('images/admin/',Auth()->user()->image)}}" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->

									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{asset('cms/assets/media/misc/bg-1.jpg')}})">
										<div class="kt-user-card__avatar">
											<img class="kt" alt="Pic" src="{{url('images/admin/',auth()->user()->image)}}" />
											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										</div>
										<div class="kt-user-card__name">
											{{Auth()->user()->name}}
										</div>

                                        <div class="kt-user-card__name">
                                            {{Auth()->user()->email}}
                                        </div>

									</div>
									<!--end: Head -->

									<!--begin: Navigation -->
                                    @if(auth('admin')->check())
									<div class="kt-notification">
										<div class="kt-notification__custom kt-space-between">
											<a href="{{route('admin.logout')}}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">{{trans('dashboard_trans.Log Out')}}</a>
										</div>
									</div>
                                    @endif

                                    @if(auth('industry')->check())
                                    <div class="kt-notification">
                                        <div class="kt-notification__custom kt-space-between">
                                            <a href="{{route('logout','industry')}}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">{{trans('dashboard_trans.Log Out')}}</a>
                                        </div>
                                    </div>
                                    @endif

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


                    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <a  href="{{route('dashboard')}}">
                                <h3 class="kt-subheader__title" style="color: blue">{{trans('dashboard_trans.Dashboard')}}</h3></a>
                                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                <span class="kt-subheader__desc">@yield('page-title')</span>
                                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                <span class="kt-subheader__desc">@yield('subheader')</span>
                                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
                                </div>
                            </div>

                        </div>
                    </div>


                        @yield('content')

                    </div>
					<!-- begin:: Footer -->
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2022&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">BaraaAbudraz</a>
							</div>
							<div class="kt-footer__menu">
								<a href="#" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->



		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Global Config(global config for global JS sciprts) -->

		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->

        <script src="{{asset('cms/assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('cms/assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->


        @yield('page-vendors')
        @yield('page-scripts')

	</body>

	<!-- end::Body -->
</html>
