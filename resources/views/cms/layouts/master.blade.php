<!DOCTYPE html>
@if(App::getLocale()=='ar')
    <html dir="rtl" lang="ar">
    @else
        <html dir="ltr" lang="en">
        @endif
        <!--begin::Head-->
        <head>
            <base href="">
            <meta charset="utf-8"/>
            <title> {{trans('dashboard_trans.Dashboard')}} | @yield('title')</title>
            <meta name="description" content="UP Lancer, the place where creativity and technological advancements converge"/>
            <meta name="keywords" content="Growth your business"/>
            <link rel="canonical" href="Https://www.uplancerps.com"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>

            <meta name="csrf-token" content="{{ csrf_token() }}"/>

            <link rel="shortcut icon" href="{{asset('admin/img/dashboard-logo.png')}}"/>
            <!--begin::Fonts-->
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-right"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

            <!--end::Fonts-->
            <!--begin::Page Vendor Stylesheets(used by this page)-->
            @if(App::getLocale()=='ar')
                <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
                <!--end::Page Vendor Stylesheets-->

                <!--begin::Global Stylesheets Bundle(used by all pages)-->
                <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
                <!--end::Global Stylesheets Bundle-->
            @else
                <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <!--end::Page Vendor Stylesheets-->

                <!--begin::Global Stylesheets Bundle(used by all pages)-->
                <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
                <!--end::Global Stylesheets Bundle-->
            @endif

            @yield('links')
        </head>
        <!--end::Head-->
        <!--begin::Body-->
        <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                <div id="kt_aside" class="aside aside-light aside-hoverable"  data-kt-drawer="true" data-kt-drawer-name="aside"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                    <!--begin::Brand-->
                    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="{{route('dashboard')}}">
                            <img alt="Logo" src="{{asset('uplancer/logo/up-lancer-team-logo.png')}}" class="w-200px logo"/>
                        </a>
                        <!--end::Logo-->
                        <!--begin::Aside toggler-->
                        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                             data-kt-toggle-name="aside-minimize">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
                            <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.5"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Aside toggler-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside menu-->

                    <div class="aside-menu flex-column-fluid">
                        <!--begin::Aside Menu-->
                        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                             data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                            <!--begin::Menu-->
                            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                                 id="#kt_aside_menu" data-kt-menu="true">
                                <div class="menu-item">
                                    <a class="menu-link active" href="{{route('dashboard')}}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                        fill="#000000" opacity="0.3"/>
													<path
                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                        fill="#000000"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-title">{{trans('dashboard_trans.Dashboard')}}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-content pt-8 pb-2">
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{trans('dashboard_trans.General')}}</span>
                                    </div>
                                </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Services')}}</span>
										<span class="menu-arrow"></span>
									</span>
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('services.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.All services')}}</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('services.create')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.Add new service')}}</span>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Projects')}}</span>
										<span class="menu-arrow"></span>
									</span>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('projects.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span class="menu-title">{{trans('dashboard_trans.All projects')}}</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{route('projects.create')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                <span class="menu-title">{{trans('dashboard_trans.Add new project')}}</span>
                                            </a>
                                        </div>

                                    </div>

                                </div>
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <div class="separator mx-1 my-4">
                                        </div>
                                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{trans('dashboard_trans.Blog')}}</span>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Sections')}}</span>
                                        <span class="menu-arrow"></span>
									</span>
                                    <div class="menu-sub menu-sub-accordion">
                                        @if(isset(Auth()->user()->role->permission['name']['blog']['can-list']))
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('sections.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.All sections')}}</span>
                                                </a>
                                            </div>
                                        @endif
                                        @if(isset(Auth()->user()->role->permission['name']['blog']['can-add']))
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('sections.create')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.Add new section')}}</span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Posts')}}</span>
                                        <span class="menu-arrow"></span>
									</span>
                                    <div class="menu-sub menu-sub-accordion">
                                        @if(isset(Auth()->user()->role->permission['name']['blog']['can-list']))
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('posts.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.All posts')}}</span>
                                                </a>
                                            </div>
                                        @endif
                                        @if(isset(Auth()->user()->role->permission['name']['blog']['can-add']))
                                            <div class="menu-item">
                                                <a class="menu-link" href="{{route('posts.create')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                    <span class="menu-title">{{trans('dashboard_trans.Add new post')}}</span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            @if(isset(Auth()->user()->role->permission['name']['user']['can-view']))
                                    <div class="menu-item">
                                        <div class="menu-content pt-8 pb-2">
                                            <div class="separator mx-1 my-4">
                                            </div>
                                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{trans('dashboard_trans.Users')}}</span>
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Users')}}</span>
										<span class="menu-arrow"></span>
									</span>
                                            @endif
                                            @if(isset(Auth()->user()->role->permission['name']['admin']['can-view']))
                                                <div class="menu-sub menu-sub-accordion">
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="{{route('admins.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                            <span class="menu-title">{{trans('dashboard_trans.All Admins')}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if(isset(Auth()->user()->role->permission['name']['admin']['can-view']))
                                        <div class="menu-item">
                                            <div class="menu-content">
                                                <div class="separator mx-1 my-4">
                                                </div>
                                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{trans('dashboard_trans.Settings')}}</span>
                                            </div>
                                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Settings')}}</span>
                                        <span class="menu-arrow"></span>
									</span>
                                                <div class="menu-sub menu-sub-accordion">
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="{{route('settings.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                            <span class="menu-title">{{trans('dashboard_trans.Website')}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @if(isset(Auth()->user()->role->permission['name']['role']['can-view']))
                                                    <div class="menu-sub menu-sub-accordion">
                                                        <div class="menu-item">
                                                            <a class="menu-link" href="{{route('roles.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                                <span class="menu-title">{{trans('dashboard_trans.Roles')}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(isset(Auth()->user()->role->permission['name']['permission']['can-view']))
                                                    <div class="menu-sub menu-sub-accordion">
                                                        <div class="menu-item">
                                                            <a class="menu-link" href="{{route('permissions.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                                                <span class="menu-title">{{trans('dashboard_trans.Permissions')}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Aside menu-->
                </div>
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" style="" class="header align-items-stretch">

                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Aside mobile toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                     id="kt_aside_mobile_toggle">
                                    <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                                    <span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
												<path
                                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                    fill="#000000" opacity="0.3"/>
											</g>
										</svg>
									</span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Aside mobile toggle-->
                            <!--begin::Mobile logo-->
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                {{--                                <a href="" class="d-lg-none">--}}
                                {{--                                    <img alt="Logo" src="{{asset('assets/media/logos/logo-1-dark.svg')}}" class="h-20px"/>--}}
                                {{--                                </a>--}}
                            </div>

                            <!--end::Mobile logo-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                <!--begin::Navbar-->
                                <div class="d-flex align-items-stretch" id="kt_header_nav">
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Topbar-->

                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    <!--begin::Toolbar wrapper-->

                                    <!--end::Notifications-->

                                    {{--                                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">--}}

                                    {{--                                        <div class="app-navbar-item">--}}
                                    {{--                                            <!--begin::Menu toggle-->--}}
                                    {{--                                            <span class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-20px h-20px w-sm-15px h-sm-15px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">--}}
                                    {{--                                    <!--begin::Svg Icon | path: icons/duotune/general/gen060.svg-->--}}
                                    {{--                                                    <img class="symbol symbol h-15px" src="{{asset('assets/media/flags/united-arab-emirates.svg')}}" alt="" />--}}

                                    {{--                                                <!--end::Svg Icon-->--}}
                                    {{--                                </span>--}}
                                    {{--                                            <span> </span>--}}
                                    {{--                                            <!--begin::Menu toggle-->--}}
                                    {{--                                            <!--begin::Menu-->--}}

                                    {{--                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-175px" data-kt-menu="true" data-kt-element="theme-mode-menu" style="">--}}
                                    {{--                                                <!--begin::Menu item-->--}}

                                    {{--                                                <ul class="menu-item px-3 my-0">--}}

                                    {{--                                                        <li class="menu-title">--}}
                                    {{--                                                            <a rel="alternate" hreflang="" href="">--}}

                                    {{--                                                            </a>--}}
                                    {{--                                                        </li>--}}

                                    {{--                                                </ul>--}}
                                    {{--                                                <!--end::Menu item-->--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <!--end::Menu-->--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                            @auth('admin')
                                                @if(auth()->user()->image)
                                                    <img src="{{asset('images/admin/'.Auth()->user()->image)}}" alt="Admin" />
                                                @else
                                                    <img alt="Logo" src="{{asset('assets/media/avatars/blank.png')}}"/>
                                                @endif
                                            @endauth
                                        </div>

                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                            <!--begin::Menu item-->

                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        @auth('admin')
                                                            @if(auth()->user()->image)
                                                                <img alt="Logo" src="{{asset('images/admin/'.Auth()->user()->image)}}"/>
                                                            @else
                                                                <img alt="Logo" src="{{asset('assets/media/avatars/blank.png')}}"/>
                                                            @endif
                                                        @endauth
                                                    </div>

                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            {{Auth()->user()->name}}
                                                        </div>
                                                        <div class="fw-lighter d-flex align-items-center fs-8">
                                                            {{Auth()->user()->email}}
                                                        </div>
                                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{Auth()->user()->user_name}}</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom, top">
                                                <a href="#" class="menu-link px-5">
                                                    @if (App::getLocale() == 'en')
                                                        <span class="menu-title position-relative">Language
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
														<img class="w-15px h-15px rounded-1 ms-2" src="{{asset('assets/media/flags/united-states.svg')}}" alt="metronic"></span></span>
                                                    @else
                                                        <span class="menu-title position-relative">اللغة
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">العربية
														<img class="w-15px h-15px rounded-1 ms-2" src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt="metronic"></span></span>
                                                    @endif
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4" style="">
                                                    <!--begin::Menu item-->
                                                    @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                                                    <div class="menu-item px-3">
                                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
															</span>  {{ $properties['native'] }}</a>
                                                    </div>
                                                    @endforeach
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5 my-1">
                                                <a href="{{route('profile.edit',auth()->user()->id)}}" class="menu-link px-5">{{trans('dashboard_trans.Profile')}}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            @auth('admin')
                                                <div class="menu-item px-5">
                                                    <a class="menu-link px-5" href="{{route('admin.logout')}}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{trans('dashboard_trans.Log Out')}}
                                                    </a>
                                                    <form id="logout-form" action="{{route('admin.logout')}}" method="GET" class="d-none">
                                                    </form>
                                                </div>
                                            @endauth

                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::User -->

                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->

                        </div>

                        <!--end::Container-->
                    </div>

                    <!--end::Header-->
                    <!--begin::Content-->

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div id="kt_content_container" class="container">
                            @yield('content')
                        </div>
                    </div>

                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <a href="https://www.uplancerps.com" target="_blank" class="text-gray-800 text-hover-primary">Copy Right || Up Lancer</a>
                                <span class="text-muted fw-bold me-1">2022©</span>
                            </div>

                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                                {{--                        <li class="menu-item">--}}
                                {{--                            <a href="" target="_blank" class="menu-link px-2">من نحن</a>--}}
                                {{--                        </li>--}}
                                {{--                        <li class="menu-item">--}}
                                {{--                            <a href="" target="_blank" class="menu-link px-2">الدعم--}}
                                {{--                                الفني</a>--}}
                                {{--                        </li>--}}
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--end::Main-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Page Custom Javascript(used by this page)-->

        {{--<script src="assets/js/custom/widgets.js"></script>--}}
        {{--<script src="assets/js/custom/modals/create-app.js"></script>--}}


        {{--<!--end::Page Custom Javascript-->--}}
        <!--end::Javascript-->
        @yield('scripts')
        </body>
        <!--end::Body-->
        </html>
