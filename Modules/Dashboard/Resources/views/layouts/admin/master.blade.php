<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="author" content="ArabWorkers | Mohammad Gamel">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
        {{trans('admin::admin.'.$page_name)??"must be add page_name"}}
    </title>
    {{--    <link href='https://fonts.googleapis.com/css?family=El Messiri' rel='stylesheet'>--}}
    <link href="{{asset('assets/css/admin/assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/admin/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
{{--    <link href="{{asset('assetsassets/css/admin//css/avatar-uploade.css')}}" rel="stylesheet"/>--}}
<!-- Font Awesome Icons -->
    <link href="{{asset('assets/css/admin/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/soft-ui-dashboard.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/css/admin/assets/css/soft-ui-dashboard-rtl.css')}}" type="text/css"/>


</head>
<body class="g-sidenav-show client-ar-dir-rtl  bg-gray-100">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  noprint"
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://arabworkers.com/" target="_blank">
            <img src="{{asset('favicon.ico')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{trans('admin::admin.ArabWorkers | Admin Panel')}}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-180 h-auto" id="sidenav-collapse-main"
         style="overflow: hidden">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('admin.show.dashboard') ? 'active' : ''}}"
                   href="{{route('admin.show.dashboard')}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>
                                shop </title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                   fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="shop-" transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  id="Path" opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                                                  id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.panel')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                    {{request()->routeIs('show.admins.index') ? 'active' : ''}}
                    {{request()->routeIs('admin.show.edit.profile.form') ? 'active' : ''}}
                    {{request()->routeIs('admin.create.new.admin') ? 'active' : ''}}
                    {{request()->routeIs('admin.show.edit.form.admin') ? 'active' : ''}}
                    "
                   href="{{route('show.admins.index')}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 46 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>
                                customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                   fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                  d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                  id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                  d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                  id="Path"></path>
                                            <path class="color-foreground"
                                                  d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                  id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.Admins')}}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link
                {{request()->routeIs('admin.show.workers') ? 'active' : ''}}
                {{request()->routeIs('admin.show.worker.profile') ? 'active' : ''}}
                {{request()->routeIs('admin.show.worker.proof.details') ? 'active' : ''}}
                {{request()->routeIs('admin.show.worker.transactions') ? 'active' : ''}}

                    "
                   href="{{route('admin.show.workers')}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 46 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>
                                customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                   fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                  d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                  id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                  d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                  id="Path"></path>
                                            <path class="color-foreground"
                                                  d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                  id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.workers')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{request()->routeIs('admin.show.employers') ? 'active' : ''}}
                {{request()->routeIs('admin.show.employer.profile') ? 'active' : ''}}
                {{request()->routeIs('admin.show.employer.task.details') ? 'active' : ''}}
                {{request()->routeIs('admin.show.employer.transaction') ? 'active' : ''}}

                    "
                   href="{{route('admin.show.employers')}}">

                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 46 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>
                                customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                   fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                  d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                  id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                  d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                  id="Path"></path>
                                            <path class="color-foreground"
                                                  d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                  id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.employers')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#Task" class="nav-link
                 {{request()->routeIs('admin.tasks.index') ? 'active' : ''}}
                {{request()->routeIs('admin.show.task.details') ? 'active' : ''}}

                {{request()->routeIs('admin.show.task.in.pending.status') ? 'active' : ''}}
                {{request()->routeIs('admin.show.pending.tasks.details') ? 'active' : ''}}

                {{request()->routeIs('admin.show.task.in.active.status') ? 'active' : ''}}
                {{request()->routeIs('admin.show.active.tasks.details') ? 'active' : ''}}
                {{request()->routeIs('admin.show.active.tasks.proofs') ? 'active' : ''}}
                {{request()->routeIs('admin.show.active.tasks.proof.details') ? 'active' : ''}}

                {{request()->routeIs('admin.show.task.in.complete.status') ? 'active' : ''}}
                {{request()->routeIs('admin.show.task.in.rejected.status') ? 'active' : ''}}
                {{request()->routeIs('admin.show.rejected.tasks.details') ? 'active' : ''}}

                    " aria-controls="Task" role="button"
                   aria-expanded="
                    {{request()->routeIs('admin.tasks.index') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.task.details') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.tasks.page') ? 'true' : ''}}

                   {{request()->routeIs('admin.show.task.in.pending.status') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.pending.tasks.details') ? 'true' : ''}}

                   {{request()->routeIs('admin.show.task.in.active.status') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.active.tasks.details') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.active.tasks.proofs') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.active.tasks.proof.details') ? 'true' : ''}}

                   {{request()->routeIs('admin.show.task.in.complete.status') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.task.in.rejected.status') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.rejected.tasks.details') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.tasks')}}</span>
                </a>
                <div class="collapse
                    {{request()->routeIs('admin.tasks.index') ? 'show' : ''}}
                {{request()->routeIs('admin.show.task.details') ? 'show' : ''}}
                {{request()->routeIs('admin.show.tasks.page') ? 'show' : ''}}

                {{request()->routeIs('admin.show.task.in.pending.status') ? 'show' : ''}}
                {{request()->routeIs('admin.show.pending.tasks.details') ? 'show' : ''}}

                {{request()->routeIs('admin.show.task.in.active.status') ? 'show' : ''}}
                {{request()->routeIs('admin.show.active.tasks.details') ? 'show' : ''}}
                {{request()->routeIs('admin.show.active.tasks.proofs') ? 'show' : ''}}
                {{request()->routeIs('admin.show.active.tasks.proof.details') ? 'show' : ''}}

                {{request()->routeIs('admin.show.task.in.complete.status') ? 'show' : ''}}
                {{request()->routeIs('admin.show.task.in.rejected.status') ? 'show' : ''}}
                {{request()->routeIs('admin.show.rejected.tasks.details') ? 'show' : ''}}
                    active
                    " id="Task" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link
                                   {{request()->routeIs('admin.tasks.index') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.task.details') ? 'active' : ''}}
                                "
                               href="{{route('admin.tasks.index')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.AllTasks')}} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                                 {{request()->routeIs('admin.show.task.in.pending.status') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.pending.tasks.details') ? 'active' : ''}}
                                "
                               href="{{route('admin.show.task.in.pending.status')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.taskInPendingToAcceptAdmin')}} </span>
                            </a>
                        </li>
                        <li class="nav-item

                        {{request()->routeIs('admin.show.task.in.active.status') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.active.tasks.details') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.active.tasks.proofs') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.active.tasks.proof.details') ? 'active' : ''}}
                            ">
                            <a class="nav-link " href="{{route('admin.show.task.in.active.status')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.taskInActive')}} </span>
                            </a>
                        </li>
                        <li class="nav-item
                        {{request()->routeIs('admin.show.task.in.complete.status') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.complete.tasks.details') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.complete.tasks.proofs') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.complete.tasks.proof.details') ? 'active' : ''}}


                            ">
                            <a class="nav-link " href="{{route('admin.show.task.in.complete.status')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.taskInComplete')}} </span>
                            </a>
                        </li>
                        <li class="nav-item
                        {{request()->routeIs('admin.show.task.in.rejected.status') ? 'active' : ''}}
                        {{request()->routeIs('admin.show.rejected.tasks.details') ? 'active' : ''}}
                            ">
                            <a class="nav-link " href="{{route('admin.show.task.in.rejected.status')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.taskInCanceled')}} </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#OperationsManagement" class="nav-link
                 {{request()->routeIs('admin.categories.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.create.new.category') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.category.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.action.of.category') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.create.action.in.category.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.action.of.category.form') ? 'active' : ''}}


                 {{request()->routeIs('admin.addons.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.addon.form') ? 'active' : ''}}



                 {{request()->routeIs('admin.discountCodes.index') ? 'active' : ''}}




                    " aria-controls="OperationsManagement" role="button"
                   aria-expanded="
                  {{request()->routeIs('admin.categories.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.create.new.category') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.edit.category.form') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.action.of.category') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.create.action.in.category.form') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.edit.action.of.category.form') ? 'true' : ''}}


                  {{request()->routeIs('admin.addons.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.edit.addon.form') ? 'true' : ''}}


                  {{request()->routeIs('admin.discountCodes.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.create.new.discountCode') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.edit.discountCode.form') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.Operations Management')}}</span>
                </a>
                <div class="collapse
                  {{request()->routeIs('admin.categories.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.create.new.category') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.edit.category.form') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.action.of.category') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.create.action.in.category.form') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.edit.action.of.category.form') ? 'show' : ''}}


                  {{request()->routeIs('admin.addons.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.edit.addon.form') ? 'show' : ''}}



                  {{request()->routeIs('admin.discountCodes.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.create.new.discountCode') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.edit.discountCode.form') ? 'show' : ''}}


                    active
                    " id="OperationsManagement" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.categories.index') ? 'active' : ''}}
                              {{request()->routeIs('admin.create.new.category') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.edit.category.form') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.action.of.category') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.create.action.in.category.form') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.edit.action.of.category.form') ? 'active' : ''}}
                                "
                               href="{{route('admin.categories.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.Categories')}} </span>

                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                          {{request()->routeIs('admin.addons.index') ? 'active' : ''}}
                          {{request()->routeIs('admin.show.edit.addon.form') ? 'active' : ''}}
                                "
                               href="{{route('admin.addons.index')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.AdditionalFeatures')}} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                          {{request()->routeIs('admin.discountCodes.index') ? 'active' : ''}}
                          {{request()->routeIs('admin.create.new.discountCode') ? 'active' : ''}}
                          {{request()->routeIs('admin.show.edit.discountCode.form') ? 'active' : ''}}
                                "
                               href="{{route('admin.discountCodes.index')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.DiscountCodes')}} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#Privileges" class="nav-link
                 {{request()->routeIs('admin.privileges.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.privilege.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.employer.privileges.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.employer.privileges.history') ? 'active' : ''}}

                {{request()->routeIs('admin.show.worker.privileges.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.worker.privileges.history') ? 'active' : ''}}
                    " aria-controls="Privileges" role="button"
                   aria-expanded="
                  {{request()->routeIs('admin.privileges.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.edit.privilege.form') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.employer.privileges.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.employer.privileges.history') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.worker.privileges.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.worker.privileges.history') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.PrivilegesManagement')}}</span>
                </a>
                <div class="collapse
                  {{request()->routeIs('admin.privileges.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.edit.privilege.form') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.employer.privileges.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.employer.privileges.history') ? 'show' : ''}}
                {{request()->routeIs('admin.show.worker.privileges.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.worker.privileges.history') ? 'show' : ''}}

                    active
                    " id="Privileges" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.privileges.index') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.edit.privilege.form') ? 'active' : ''}}
                                "
                               href="{{route('admin.privileges.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.ThePrivileges')}} </span>

                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.show.employer.privileges.index') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.employer.privileges.history') ? 'active' : ''}}
                                "
                               href="{{route('admin.show.employer.privileges.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.EmployerPrivileges')}} </span>

                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.show.worker.privileges.index') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.worker.privileges.history') ? 'active' : ''}}
                                "
                               href="{{route('admin.show.worker.privileges.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.WorkerPrivileges')}} </span>

                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#region" class="nav-link
                 {{request()->routeIs('admin.countries.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.create.new.country') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.cities.of.country') ? 'active' : ''}}
                 {{request()->routeIs('admin.store.new.country') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.country.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.update.country') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.edit.city.of.country.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.update.city.of.country') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.create.city.in.country.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.store.new.city.in.country') ? 'active' : ''}}



                {{request()->routeIs('admin.cities.index') ? 'active' : ''}}
                    " aria-controls="region" role="button"
                   aria-expanded="
                  {{request()->routeIs('admin.countries.index') ? 'true' : ''}}
                   {{request()->routeIs('admin.create.new.country') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.cities.of.country') ? 'true' : ''}}
                   {{request()->routeIs('admin.store.new.country') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.edit.country.form') ? 'true' : ''}}
                   {{request()->routeIs('admin.update.country') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.edit.city.of.country.form') ? 'true' : ''}}
                   {{request()->routeIs('admin.update.city.of.country') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.create.city.in.country.form') ? 'true' : ''}}
                   {{request()->routeIs('admin.store.new.city.in.country') ? 'true' : ''}}


                   {{request()->routeIs('admin.cities.index') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.city.details') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.create.city.form') ? 'true' : ''}}
                   {{request()->routeIs('admin.store.new.city') ? 'true' : ''}}
                   {{request()->routeIs('admin.show.edit.city.form') ? 'true' : ''}}
                   {{request()->routeIs('admin.update.city') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.Region')}}</span>
                </a>
                <div class="collapse
                  {{request()->routeIs('admin.countries.index') ? 'show' : ''}}
                {{request()->routeIs('admin.create.new.country') ? 'show' : ''}}
                {{request()->routeIs('admin.show.cities.of.country') ? 'show' : ''}}
                {{request()->routeIs('admin.store.new.country') ? 'show' : ''}}
                {{request()->routeIs('admin.show.edit.country.form') ? 'show' : ''}}
                {{request()->routeIs('admin.update.country') ? 'show' : ''}}
                {{request()->routeIs('admin.show.edit.city.of.country.form') ? 'show' : ''}}
                {{request()->routeIs('admin.update.city.of.country') ? 'show' : ''}}
                {{request()->routeIs('admin.show.create.city.in.country.form') ? 'show' : ''}}
                {{request()->routeIs('admin.store.new.city.in.country') ? 'show' : ''}}

                {{request()->routeIs('admin.cities.index') ? 'show' : ''}}
                {{request()->routeIs('admin.show.city.details') ? 'show' : ''}}
                {{request()->routeIs('admin.show.create.city.form') ? 'show' : ''}}
                {{request()->routeIs('admin.store.new.city') ? 'show' : ''}}
                {{request()->routeIs('admin.show.edit.city.form') ? 'show' : ''}}
                {{request()->routeIs('admin.update.city') ? 'show' : ''}}

                    active
                    " id="region" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.countries.index') ? 'active' : ''}}
                            {{request()->routeIs('admin.create.new.country') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.cities.of.country') ? 'active' : ''}}
                            {{request()->routeIs('admin.store.new.country') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.edit.country.form') ? 'active' : ''}}
                            {{request()->routeIs('admin.update.country') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.edit.city.of.country.form') ? 'active' : ''}}
                            {{request()->routeIs('admin.update.city.of.country') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.create.city.in.country.form') ? 'active' : ''}}
                            {{request()->routeIs('admin.store.new.city.in.country') ? 'active' : ''}}
                                "
                               href="{{route('admin.countries.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.Countries')}} </span>

                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                          {{request()->routeIs('admin.cities.index') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.city.details') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.create.city.form') ? 'active' : ''}}
                            {{request()->routeIs('admin.store.new.city') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.edit.city.form') ? 'active' : ''}}
                            {{request()->routeIs('admin.update.city') ? 'active' : ''}}
                                "
                               href="{{route('admin.cities.index')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.Cities')}} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#Financial" class="nav-link
                 {{request()->routeIs('admin.supported.currency.codes.index') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.create.new.currency.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.update.currency.form') ? 'active' : ''}}
                 {{request()->routeIs('admin.currency.index') ? 'active' : ''}}
                    " aria-controls="Financial" role="button"
                   aria-expanded="
                  {{request()->routeIs('admin.supported.currency.codes.index') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.create.new.currency.form') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.update.currency.form') ? 'true' : ''}}
                  {{request()->routeIs('admin.currency.index') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.financial affairs')}}</span>
                </a>
                <div class="collapse
                  {{request()->routeIs('admin.supported.currency.codes.index') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.create.new.currency.form') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.update.currency.form') ? 'show' : ''}}
                  {{request()->routeIs('admin.currency.index') ? 'show' : ''}}
                    active
                    " id="Financial" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.show.create.new.currency.form') ? 'active' : ''}}
                              {{request()->routeIs('admin.show.update.currency.form') ? 'active' : ''}}
                              {{request()->routeIs('admin.currency.index') ? 'active' : ''}}
                                "
                               href="{{route('admin.currency.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.Currencies')}} </span>

                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                              {{request()->routeIs('admin.supported.currency.codes.index') ? 'active' : ''}}
                                "
                               href="{{route('admin.supported.currency.codes.index')}}">
                                <span class="sidenav-normal"> {{trans('admin::admin.SupportedCurrenciesCodes')}} </span>

                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#AdminSupport" class="nav-link
                 {{request()->routeIs('admin.show.employer.tickets') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.employer.ticket.details') ? 'active' : ''}}

                {{request()->routeIs('admin.show.worker.tickets') ? 'active' : ''}}
                 {{request()->routeIs('admin.show.worker.ticket.details') ? 'active' : ''}}
                    " aria-controls="AdminSupport" role="button"
                   aria-expanded="
                  {{request()->routeIs('admin.show.employer.tickets') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.employer.ticket.details') ? 'true' : ''}}

                   {{request()->routeIs('admin.show.worker.tickets') ? 'true' : ''}}
                  {{request()->routeIs('admin.show.worker.ticket.details') ? 'true' : ''}}
                       ">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background"
                                                  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                  opacity="0.598981585"></path>
                                            <path class="color-background"
                                                  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.SupportSection')}}</span>
                </a>
                <div class="collapse
                  {{request()->routeIs('admin.show.employer.tickets') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.employer.ticket.details') ? 'show' : ''}}

                {{request()->routeIs('admin.show.worker.tickets') ? 'show' : ''}}
                  {{request()->routeIs('admin.show.worker.ticket.details') ? 'show' : ''}}


                    active
                    " id="AdminSupport" style="">
                    <ul class="nav ms-4 ps-3">

                        <li class="nav-item ">
                            <a class="nav-link
                          {{request()->routeIs('admin.show.employer.tickets') ? 'active' : ''}}
                          {{request()->routeIs('admin.show.employer.ticket.details') ? 'active' : ''}}
                                "
                               href="{{route('admin.show.employer.tickets')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.EmployerTickets')}} </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link
                                     {{request()->routeIs('admin.show.worker.tickets') ? 'active' : ''}}
                            {{request()->routeIs('admin.show.worker.ticket.details') ? 'active' : ''}}
                                "
                               href="{{route('admin.show.worker.tickets')}}">
                                <span
                                    class="sidenav-normal"> {{trans('admin::admin.WorkerTickets')}} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link
                    {{request()->routeIs('admin.show.setting.attributes') ? 'active' : ''}}"
                   href="{{route('admin.show.setting.attributes')}}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 46 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>
                                customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                   fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                  d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                  id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                  d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                  id="Path"></path>
                                            <path class="color-foreground"
                                                  d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                  id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">{{trans('admin::admin.settings')}}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">

    </div>
</aside>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl noprint " id="navbarBlur"
         navbar-scroll="true">
        <div class="container-fluid py-1 px-3 breadcrumb-rtl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-dark" href="javascript:;">{{trans('admin::admin.panel')}}</a>
                    </li>

                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        {{trans('admin::admin.'.$main_breadcrumb)??'must be add $main_breadcrumb'}}
                    </li>

                </ol>
                <h6 class="font-weight-bolder mb-0">
                    {{trans('admin::admin.'.$sub_breadcrumb)??'must be add $sub_breadcrumb'}}
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class="navbar-nav  justify-content-end">

                    <li class="nav-item d-flex align-items-center">

                        <a style="cursor:pointer" class="nav-link text-body font-weight-bold px-0"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">{{trans('admin::admin.Logout')}}</span>
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Continar -->
    <div class="container-fluid py-4">
        @yield('content')
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12 text-center mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted">
                            <a href="https://arabworkers.com/" class="font-weight-bold" target="_blank">
                                {{trans('admin::admin.company_name')}}
                            </a> {{trans('admin::admin.company_description')}}
                            {{trans('admin::admin.allRightsAreSave')}}
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@include('sweetalert::alert')
<!-- End Continar -->

</main>
<!--   Core JS Files   -->
<script src="{{asset('assets/css/admin/assets/js/fontawesome.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('assets/css/admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/choices.min.js')}}"></script>
<script async defer src="{{asset('assets/css/admin/assets/js/buttons.js')}}"></script>
<script src="{{url('assets/js/soft-ui-dashboard.min.js')}}"></script>

<script src="{{asset('assets/css/admin/assets/js/plugins/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/photoswipe-ui-default.min.js')}}"></script>

@if(app()->getLocale() == "en")
    <script src="{{asset('assets/css/admin/assets/js/plugins/datatables-en.js')}}"></script>
@else
    <script src="{{asset('assets/css/admin/assets/js/plugins/datatables-ar.js')}}"></script>

@endif
<script>
    if (document.getElementById('datatable-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 10
        });

        document.querySelectorAll(".export").forEach(function (el) {
            el.addEventListener("click", function (e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "soft-ui-" + type,
                };

                if (type === "csv") {
                    data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    }
    ;
</script>
<script src="{{asset('assets/css/admin/assets/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/plugins/jkanban/jkanban.js')}}"></script>
<script src="{{asset('assets/css/admin/assets/js/beacon.min.js')}}"></script>
</body>
</html>
