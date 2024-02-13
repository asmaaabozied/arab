<!DOCTYPE html>
@if(app()->getLocale() == 'en')
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
@else
<html lang="ar" dir="rtl" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
@endif
    <head>

        <meta charset="utf-8" />
        <title>Arab Workers</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
          content="Tailwind Admin & Dashboard Template"
          name="description"
        />
        <meta content="" name="Themesbrand" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> --}}
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">

        <link rel="stylesheet" href="{{asset('assets/Dashboard/assets/css/icons.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/Dashboard/assets/css/tailwind.css')}}"/>
        <link href="{{ asset('assets/Dashboard/assets/libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('libraries')

    </head>

    <body data-mode="light" data-sidebar-size="lg">


        <!-- leftbar-tab-menu -->
        <nav class="border-b border-slate-100 dark:bg-zinc-800 print:hidden flex items-center fixed top-0 right-0 left-0 bg-white z-10 dark:border-zinc-700">

            <div class="flex items-center justify-between w-full">
                <div class="topbar-brand flex items-center">
                    <div class="navbar-brand flex items-center justify-between shrink px-5 h-[70px] border-r bg-slate-50 border-r-gray-50 dark:border-zinc-700 dark:bg-zinc-800">
                        <a href="#" class="flex items-center font-bold text-lg  dark:text-white">
                            <img src="{{asset("assets/icons/arabWorkers/logo.png")}}" alt="" class="ltr:mr-2 rtl:ml-2 inline-block mt-1 h-8" />
                            {{-- <span class="hidden xl:block align-middle">Arab Workers</span> --}}
                        </a>
                    </div>
                    <button type="button" class="text-gray-600 dark:text-white h-[70px] ltr:-ml-10 ltr:mr-6 rtl:-mr-10 rtl:ml-10 vertical-menu-btn" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <form class="app-search hidden xl:block px-5">
                        <div class="relative inline-block">
                            <input type="text" class="bg-gray-50/30 dark:bg-zinc-700/50 border-0 rounded focus:ring-0 placeholder:text-sm px-4 dark:placeholder:text-gray-200 dark:text-gray-100 dark:border-zinc-700 " placeholder="Search...">
                            <button class="py-1.5 px-2.5 text-white bg-violet-500 inline-block absolute ltr:right-1 top-1 rounded shadow shadow-violet-100 dark:shadow-gray-900 rtl:left-1 rtl:right-auto" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>
                <div class="flex items-center">

                    <div>
                        <div class="dropdown relative sm:hidden block">
                            <button type="button" class="text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 dropdown-toggle" data-dropdown-toggle="navNotifications">
                                <i data-feather="search" class="h-5 w-5"></i>
                            </button>

                            <div class="dropdown-menu absolute px-4 -left-36 top-0 mx-4 w-72 z-50 hidden list-none border border-gray-50 rounded bg-white shadow dark:bg-zinc-800 dark:border-zinc-600 dark:text-gray-300" id="navNotifications">
                                <form class="py-3 dropdown-item" aria-labelledby="navNotifications">
                                    <div class="form-group m-0">
                                        <div class="flex w-full">
                                            <input type="text" class="border-gray-100 dark:border-zinc-600 dark:text-zinc-100 w-fit" placeholder="Search ..." aria-label="Search Result">
                                            <button class="btn btn-primary border-l-0 rounded-l-none bg-violet-500 border-transparent text-white" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown relative language hidden sm:block">
                        <button class="btn border-0 py-0 dropdown-toggle px-4 h-[70px]" type="button" aria-expanded="false" data-dropdown-toggle="navNotifications">
                            <img src="{{asset('assets/Dashboard/assets/images/flags/us.jpg')}}" alt="" class="h-4" id="header-lang-img">
                        </button>
                        <div class="dropdown-menu absolute -left-24 z-50 hidden w-40 list-none rounded bg-white shadow dark:bg-zinc-800" id="navNotifications">
                            <ul class="border border-gray-50 dark:border-gray-700" aria-labelledby="navNotifications">
                                <li>
                                    <a href="{{route('employer.change.app.language','en')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-zinc-600/50 dark:hover:text-white"><img src="{{asset('assets/Dashboard/assets/images/flags/us.jpg')}}" alt="user-image" class="mr-1 inline-block h-3"> <span class="align-middle">English</span></a>
                                </li>
                                <li>
                                    <a href="{{route('employer.change.app.language','ar')}}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-50/50 dark:text-gray-200 dark:hover:bg-zinc-600/50 dark:hover:text-white"><img src="{{asset('assets/Dashboard/assets/images/flags/ksa.png')}}" alt="user-image" class="mr-1 inline-block h-3"> <span class="align-middle">العربية</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        {{-- Dark and light Themes --}}
                    <div>
                        <button type="button" class="light-dark-mode text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 hidden sm:block ">
                            <i data-feather="moon" class="h-5 w-5 block dark:hidden"></i>
                            <i data-feather="sun" class="h-5 w-5 hidden dark:block"></i>
                    </div>

                    <div>

                        <span class=" text-primary fw-normal  mx-2">
                            {{ number_format(convertCurrency(auth()->user()->wallet_balance, auth()->user()->current_currency),2) }}
                                            <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                        </span>
                        <i class="fa fa-wallet me-sm-1 mx-1 " aria-hidden="true"></i>
                    </div>

                    <div>
                        <div class="dropdown relative ">
                            <div class="relative">
                                <button type="button" class="btn border-0 h-[70px] dropdown-toggle px-4 text-gray-500 dark:text-gray-100" aria-expanded="false" data-dropdown-toggle="notification">
                                    <i data-feather="bell" class="h-5 w-5"></i>
                                </button>
                                    <span class="absolute text-xs px-1.5 bg-red-500 text-white font-medium rounded-full left-6 top-2.5">5</span>
                            </div>
                            <div class="dropdown-menu absolute z-50 hidden w-80 list-none rounded bg-white shadow dark:bg-zinc-800 " id="notification">
                                <div class="border border-gray-50 dark:border-gray-700 rounded" aria-labelledby="notification">
                                    <div class="grid grid-cols-12 p-4">
                                        <div class="col-span-6">
                                            <h6 class="m-0 text-gray-700 dark:text-gray-100"> Notifications </h6>
                                        </div>
                                        <div class="col-span-6 justify-self-end">
                                            <a href="#!" class="text-xs underline dark:text-gray-400"> Unread (3)</a>
                                        </div>
                                    </div>
                                    <div class="max-h-56" data-simplebar>
                                        <div>
                                            <a href="#!" class="text-reset notification-item">
                                                <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                                    <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                        <img src="{{asset('assets/Dashboard/assets/images/users/avatar-3.jpg')}}" class="rounded-full h-8 w-8" alt="user-pic">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h6 class="mb-1 text-gray-700 dark:text-gray-100">James Lemire</h6>
                                                        <div class="text-13 text-gray-600">
                                                            <p class="mb-1 dark:text-gray-400">It will seem like simplified English.</p>
                                                            <p class="mb-0"><i class="mdi mdi-clock-outline dark:text-gray-400"></i> <span>1 hour ago</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#!" class="text-reset notification-item">
                                                <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                                    <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                        <div class="h-8 w-8 bg-violet-500 rounded-full text-center">
                                                            <i class="bx bx-cart text-xl leading-relaxed text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h6 class="mb-1 text-gray-700 dark:text-gray-100">Your order is placed</h6>
                                                        <div class="text-13 text-gray-600">
                                                            <p class="mb-1 dark:text-gray-400">If several languages coalesce the grammar</p>
                                                            <p class="mb-0"><i class="mdi mdi-clock-outline dark:text-gray-400"></i> <span>3 min ago</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#!" class="text-reset notification-item">
                                                <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                                    <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                        <div class="h-8 w-8 bg-green-500 rounded-full text-center">
                                                            <i class="bx bx-badge-check text-xl leading-relaxed text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h6 class="mb-1 text-gray-700 dark:text-gray-100">Your item is shipped</h6>
                                                        <div class="text-13 text-gray-600">
                                                            <p class="mb-1 dark:text-gray-400">If several languages coalesce the grammar</p>
                                                            <p class="mb-0"><i class="mdi mdi-clock-outline dark:text-gray-400"></i> <span>3 min ago</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#!" class="text-reset notification-item">
                                                <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                                    <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                        <img src="{{asset('assets/Dashboard/assets/images/users/avatar-6.jpg')}}" class="rounded-full h-8 w-8" alt="user-pic">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <h6 class="mb-1 text-gray-700 dark:text-gray-100">Salena Layfield</h6>
                                                        <div class="text-13 text-gray-600">
                                                            <p class="mb-1 dark:text-gray-400">As a skeptical Cambridge friend of mine occidental.</p>
                                                            <p class="mb-0"><i class="mdi mdi-clock-outline dark:text-gray-400"></i> <span>1 hour ago</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-1 border-t grid border-gray-50 dark:border-zinc-600 justify-items-center">
                                        <a class="btn border-0 text-violet-500" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle mr-1"></i> <span>View More..</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="dropdown relative ltr:mr-4 rtl:ml-4">
                            <button type="button" class="flex items-center px-4 py-5 border-x border-gray-50 bg-gray-50/30 dropdown-toggle dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img class="h-8 w-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2" src="{{asset('assets/Dashboard/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                                <span class="fw-medium hidden xl:block">Shawn L.</span>
                                <i class="mdi mdi-chevron-down align-bottom hidden xl:block"></i>
                            </button>
                            <div class="dropdown-menu absolute top-0 ltr:-left-3 rtl:-right-3 z-50 hidden w-40 list-none rounded bg-white shadow dark:bg-zinc-800" id="profile/log">
                                <div class="border border-gray-50 dark:border-zinc-600" aria-labelledby="navNotifications">
                                    <div class="dropdown-item dark:text-gray-100">
                                        <a class="px-3 py-2 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="{{route('employer.show.my.profile')}}">
                                            <i class="mdi mdi-face-man text-16 align-middle mr-1"></i> Profile
                                        </a>
                                    </div>
                                    {{-- <div class="dropdown-item dark:text-gray-100">
                                        <a class="px-3 py-2 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="lock-screen.html">
                                            <i class="mdi mdi-lock text-16 align-middle mr-1"></i> Lock Screen
                                        </a>
                                    </div> --}}
                                    <hr class="border-gray-50 dark:border-gray-700">
                                    <div class="dropdown-item dark:text-gray-100">
                                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="p-3 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="logout.html">
                                            <i class="mdi mdi-logout text-16 align-middle mr-1"></i> {{trans('dashboard::auth.logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('employer.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

                <div class="hidden">
                    <div class="fixed inset-0 bg-black/40 transition-opacity z-40"></div>
                    <div class="h-screen z-50 bg-white fixed w-80 right-0" data-simplebar>
                        <div class="flex items-center p-4 border-b border-gray-100">
                            <h5 class="m-0 mr-2">Theme Customizer</h5>
                            <a href="javascript:void(0);" class="h-6 w-6 text-center bg-gray-700 ml-auto rounded-full" >
                                <i class="mdi mdi-close text-15 align-middle text-white leading-relaxed"></i>
                            </a>
                        </div>
                        <div class="p-4">
                            <h6 class="mb-3">Layout</h6>
                            <div class="flex gap-4">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout" id="layout-vertical" value="vertical">
                                    <label class="align-middle" for="layout-vertical">Vertical</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                                    <label class="align-middle" for="layout-horizontal">Horizontal</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>
                            <div class="flex gap-4">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout-mode" id="layout-mode-light" value="light">
                                    <label class="form-check-label" for="layout-mode-light">Light</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                            <div class="flex gap-4">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout-width" id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                                    <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>
                            <div class="flex gap-4">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout-position" id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                                    <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout-position" id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                                    <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>
                            <div class="flex gap-4">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                                    <label class="form-check-label" for="topbar-color-light">Light</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                            <div class="space-y-1">
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" checked type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                                </div>
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                                </div>
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>
                            <div class="space-y-1">
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" checked type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                                </div>
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                                </div>
                                <div class="form-check sidebar-setting">
                                    <input class="focus:ring-0" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                                </div>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Direction</h6>
                            <div class="space-y-1">
                                <div>
                                    <input class="focus:ring-0" checked type="radio" name="layout-direction" id="layout-direction-ltr" value="ltr">
                                    <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                                </div>
                                <div>
                                    <input class="focus:ring-0" type="radio" name="layout-direction" id="layout-direction-rtl" value="rtl">
                                    <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu rtl:right-0 fixed ltr:left-0 bottom-0 top-16 h-screen border-r bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700 z-10">

            <div data-simplebar class="h-full">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">

                        <li class="menu-heading text-xs font-medium text-gray-500 cursor-default inline-flex items-center px-4 py-3.5" data-key="t-menu">
                            <input type="checkbox"  id="switch7" switch="info" onclick="ShowSwal()" checked />
                            <label for="switch7" data-on-label="C" data-off-label="W" class="mx-1"></label>
                            <b class="text-15 text-gray-700 dark:text-gray-100 ">{{ trans('employer::employer.switchToWorkerAccount') }}</b>
                            </b>
                        </li>



                        <li>
                            <a href="{{route('show.employer.panel')}}" class="pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard"> {{trans('employer::employer.panel')}} </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" aria-expanded="false" class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="grid"></i>
                                <span data-key="t-apps"> {{trans('employer::employer.tasks')}}</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('employer.show.create.task.page')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.createTask')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.task.in.pending.status')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.taskInPendingToAcceptAdmin')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.task.in.active.status')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.taskInActive')}}</a>
                                </li>

                                <li>
                                    <a href="{{route('employer.show.task.in.complete.status')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.taskInComplete')}}</a>
                                </li>

                                <li>
                                    <a href="{{route('employer.show.task.in.rejected.status')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.taskInCanceled')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.not.payed.tasks')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.NotPayedTasks')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.not.published.tasks')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.NotPublishedTasks')}}</a>
                                </li>

                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" aria-expanded="false"  class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="users"></i>
                                <span data-key="t-auth">{{trans('employer::employer.Financial Affairs')}}</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('employer.show.my.discount.code')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.DiscountCodes')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.my.wages.and.costs')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.WagesAndCosts')}}</a>
                                </li>
                                 <li>
                                    <a href="{{route('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.TransferEmployerWalletBalanceToWorker')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.my.wallet.history')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.walletHistory')}}</a>
                                </li>

                            </ul>
                        </li>

                         <li>
                            <a href="javascript: void(0);" aria-expanded="false" class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="briefcase"></i><span data-key="t-pages">{{trans('employer::employer.ManagementSection')}}</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('employer.show.switching.account.history')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.switchingAccountHistory')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.show.my.privilege.history')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.PrivilegesHistory')}}</a>
                                </li>
                                 <li>
                                    <a href="{{route('employer.show.rule.of.privileges')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.RuleOfPrivileges')}}</a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="menu-heading px-4 py-3 text-xs font-medium text-gray-500 cursor-default" data-key="t-elements">Elements</li> --}}

                        <li>
                            <a href="javascript: void(0);" aria-expanded="false"  class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i class="bx bx-help-circle"></i>
                                <span data-key="t-compo">{{trans('employer::employer.SupportSection')}}</span>
                            </a>
                            <ul>
                                <?php
                                    $currencies = \Modules\Currency\Entities\Currency::withoutTrashed()->get();
                                    ?>
                                <li>
                                    <a href="{{route('employer.show.my.tickets')}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{trans('employer::employer.myTickets')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false"  class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i class="bx bx-money"></i>
                                <span data-key="t-compo">{{trans('employer::employer.Currencies')}}</span>
                            </a>
                            <ul>
                                @if(app()->getLocale() == "ar")
                                    @foreach($currencies as $currency)
                                    <li>
                                        <a href="{{route('employer.change.app.currency',$currency->en_name)}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{$currency->ar_name}}</a>
                                    </li>
                                    @endforeach
                                @else
                                @foreach($currencies as $currency)
                                <li>
                                    <a href="{{route('employer.change.app.currency',$currency->en_name)}}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">{{$currency->ar_name}}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>


                    </ul>

                    {{-- <div class="sidebar-alert text-center mx-5 my-12">
                        <div class="card-body bg-primary rounded bg-violet-50/50 dark:bg-zinc-700/60">
                            <img src="assets/images/giftbox.png" alt="" class="block mx-auto">
                            <div class="mt-4">
                                <h5 class="text-violet-500 mb-3 font-medium">Unlimited Access</h5>
                                <p class="text-slate-600 text-13 dark:text-gray-50">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                                <a href="#!" class="btn bg-violet-500 text-white border-transparent mt-6">Upgrade Now</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <div class="main-content">
                <div class="page-content dark:bg-zinc-700 min-h-screen">
                    <div class="container-fluid px-[0.625rem]">
                    <div class="grid grid-cols-1 mb-5">
                        <div class="flex items-center justify-between">
                            {{-- <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Starter Page</h4> --}}
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                    <li class="inline-flex items-center">
                                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                            {{trans('employer::employer.'.$sub_breadcrumb)}}
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <a href="#" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-500 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white"></a>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    {{-- content --}}
                    @yield('content')

                    <!-- Footer Start -->
                    <footer class="footer absolute bottom-0 right-0 left-0 border-t border-gray-50 py-5 px-5 bg-white dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-200">
                        <div class="grid grid-cols-2">
                            <div class="grow">
                                &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>ArabWorkers
                            </div>
                            {{-- <div class="hidden md:inline-block text-end">Design & Develop by <a href="" class="text-violet-500 underline">Themesbrand</a></div> --}}

                        </div>
                    </footer>
                    <!-- end Footer -->
                </div>
            </div>
        </div>



            <div class="fixed ltr:right-5 rtl:left-5 bottom-10 flex flex-col gap-3 z-40 animate-bounce">
                <!-- light-dark mode button -->
                <a href="javascript: void(0);" id="ltr-rtl" class="px-3.5 py-4 z-40 text-14 transition-all duration-300 ease-linear text-white bg-violet-500 hover:bg-violet-600 rounded-full font-medium" onclick="changeMode(event)">
                    <span class="ltr:hidden">LTR</span>
                    <span  class="rtl:hidden">RTL</span>
                </a>
            </div>


        <script src="{{asset('assets/Dashboard/assets/libs/@popperjs/core/umd/popper.min.js')}} "></script>
        <script src="{{asset('assets/Dashboard/assets/libs/feather-icons/feather.min.js')}} "></script>
        <script src="{{asset('assets/Dashboard/assets/libs/metismenujs/metismenujs.min.js')}} "></script>
        <script src="{{asset('assets/Dashboard/assets/libs/simplebar/simplebar.min.js')}} "></script>
        <script src="{{asset('assets/Dashboard/assets/libs/feather-icons/feather.min.js')}} "></script>
        {{-- <script src="{{asset('assets/Dashboard/assets/js/pages/form-advanced.init.js')}}"></script> --}}
        <script src="{{asset('assets/Dashboard/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
        <script src="{{asset('assets/Dashboard/assets/js/app.js')}}"></script>

        <!-- choices js -->

        <!-- init js -->


        <script src="{{asset('assets/js/plugins/datatables-ar.js')}}"></script>
        <script>
            if (document.getElementById('datatable-list')) {
                const dataTableSearch = new simpleDatatables.DataTable("#datatable-list", {
                    searchable: true,
                    fixedHeight: false,
                    perPage: 10
                });

            }
            ;
        </script>
        <script>

            function ShowSwal() {
                document.getElementById('CustomSwal').classList.remove('hidden')
            }

            function hideSwal() {
                document.getElementById('CustomSwal').classList.add('hidden');
                $("input[type=checkbox]").prop("checked", false);
            }
        </script>
        <div class="hidden fixed inset-0 flex items-center justify-center z-50" id="CustomSwal">
            <div class="relative max-w-md w-full bg-white p-4 rounded-lg shadow-md" role="dialog" aria-modal="true">
                <div class="text-center text-2xl text-primary">{{ trans('employer::employer.switchAccountToWorkerTitle') }}</div>
                <div class="text-center py-4">{{ trans('employer::employer.switchAccountToWorkerText') }}</div>
                <div class="flex justify-center space-x-4 p-4">
                    <a
                        href="{{ route('employer.switch.account.to.worker') }}"
                        onclick="event.preventDefault(); document.getElementById('switch-account-form').submit();"
                        class="btn bg-success text-black p-2 rounded-lg">{{ trans('employer::employer.switchBtn') }}</a>
                    <button
                        class="btn bg-dark text-black p-2 rounded-lg"
                        onclick="hideSwal()">{{ trans('employer::employer.cancelBtn') }}</button>
                </div>
                <form id="switch-account-form" action="{{ route('employer.switch.account.to.worker') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweetalert::alert')
</body>
</html>
