<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title')

    </title>


    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="{{asset('frontend/Plugin/icon.css')}}"
          rel="stylesheet">

    <link href="{{asset('frontend/Plugin/css2.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/Plugin/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <link id="bootstrap" href="{{asset('frontend/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/Plugin/Bootstrap/datatables/dataTables.bootstrap4.css')}}">


    <link id="rtl" href="{{asset('frontend/css/rtl.css')}}" rel="stylesheet" type="text/css">

    @if(app()->getLocale()=='en')
        <link href="{{asset('frontend/bootstrap-5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('frontend/css/ltr.css')}}" rel="stylesheet" type="text/css">

    @else
        <link href="{{asset('frontend/bootstrap-5.0.2/dist/css/bootstrap.rtl.min.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{asset('frontend/css/rtl.css')}}" rel="stylesheet" type="text/css">

    @endif
    <link id="light" href="{{asset('frontend/css/light.css')}}" rel="stylesheet" type="text/css">


    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('frontend/Plugin/progresscircle.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="{{asset('frontend/css/MediaQuery.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/Plugin/custom-drag-drop-file-upload/fileUpload/fileUpload.css')}}">

    <style>


        #CustomSwal {
            flex-shrink: 10;
            width: 40;
            max-width: 50%;
            padding-left: calc(var(--bs-gutter-x) * -.5);
            padding-right: calc(var(--bs-gutter-x) * 15);
            margin-top: var(--bs-gutter-y);
        }


    </style>


    @yield('style')
</head>

<body>
<nav class="navbar navbar-expand-lg navbar fixed-top container-fluid">
    <div>
        {{--            <a class="navbar-brand" href="#"> @lang('site.Arab Workers') </a>--}}
        <img src="{{asset('frontend/assets/img/11 free 1 (2).png')}}" class="img-fluid logo-img">
    </div>
    <button class="navbar-toggler nav-small " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons">menu</i>

    </button>
    <div class="collapse navbar-collapse nav-small-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto col-lg-4">
            <li class="nav-item nav-first">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}"> @lang('site.home') </a>
            </li>


            <li class="nav-item nav-first">
                <a class="nav-link">التسويق بالعمولة </a>
            </li>
            <li class="nav-item nav-first">
                <a class="nav-link" href="{{route('pages','about')}}">  @lang('site.about') </a>
            </li>
            <li class="nav-item nav-first">
                <a class="nav-link" href="{{url('ar/support')}}"> @lang('site.support') </a>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto order-0 col-lg-4">
            <li class="nav-item earch-input col-lg-8 ">

                <form class="nav-search">
                    <div class="input-group  search-mobile  ml-2">
                        <input type="search" class="form-control  form-control-sm" aria-label="Search"
                               aria-describedby="search-addon"/>
                        <span class=" border-0 search" id="search-addon">
                            <i class="material-icons">search</i>
                            @lang('site.search')
                        </span>
                    </div>
                </form>

            </li>

            <li class="nav-item dropdown profile col-lg-5">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex flex-row justify-content-between ">
                        <div class="d-flex flex-column ">
                            <span> @if(auth()->user()) {{auth()->user()->name}} @else Nada  @endif</span>
                            <div class="d-flex flex-row">
                                <img src="{{asset('frontend/assets//img/fluent_wallet-20-filled.png')}}"
                                     class="img-fluid" style="width:auto">
                                <span class="dollar"> @if(auth()->user()) {{auth()->user()->wallet_balance ?? 0}} @else
                                        10.00  @endif $</span>
                            </div>

                        </div>
                        <img src="{{asset('frontend/assets/img/Ellipse 8 (3).png')}}" class="img-fluid">
                    </div>
                </a>


                <ul class="dropdown-menu">
                    @if(auth()->user())
                        @if(Auth::guard('employer')->check())
                            <li><a class="dropdown-item"
                                   href="{{route('employer.show.edit.my.profile.form')}}">{{trans('employer::employer.personalInformationDetails')}} </a>
                            </li>

                        @elseif(Auth::guard('worker')->check())

                            <li><a class="dropdown-item"
                                   href="{{route('worker.show.edit.my.profile.form')}}">{{trans('employer::employer.personalInformationDetails')}} </a>
                            </li>

                        @endif

                    @else

                        <li><a class="dropdown-item" href="{{route('home')}}">{{trans('site.home')}} </a></li>
                    @endif

                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto left-item">

            <li class="nav-item lang ">
                <a class=" nav-link lang-border d-flex flex-row justify-content-between languagess" id="languagess">

                    <span>language </span>
                    <img src="{{asset('frontend/assets/img/Vector (3).png')}}" class="img-fluid"> </a>
            </li>
            <li class="nav-item dark ">
                <button class=" nav-link lang-border d-flex flex-row justify-content-between">

                    <span>Dark</span>
                    <img src="{{asset('frontend/assets/img/Vector (4).png')}}" class="img-fluid">

                </button>
            </li>

        </ul>


        {{--        <ul class="navbar-nav ml-auto left-item col-lg-2">--}}

        {{--            <li class="nav-item lang">--}}
        {{--                <button class=" nav-link lang-border"  id="languagess"><span>language </span><i--}}
        {{--                        class="material-icons languagess"></i></button>--}}
        {{--            </li>--}}
        {{--            <li class="nav-item dark">--}}
        {{--                <button class=" nav-link lang-border" style="margin-top:8%"> Dark <i class="fa fa-moon"></i></button>--}}
        {{--            </li>--}}

        {{--        </ul>--}}

        </ul>
    </div>
    <li class="mobile-message nav-item   d-flex flex-row">
        <img src="{{asset('frontend/assets/img/4043263_avatar_muslim_paranja_woman_icon.png')}}" class="img-fluid">
        <h6 class="Title mb-4  login-title2"> اهلا بك ياندي
            <img src="{{asset('frontend/assets/img/8322719_in_love_emoji_emoticon_feeling_icon.png')}}"
                 class="img-fluid"> !!</h6>
    </li>
    <li class="search-input-small ">

        <form class="nav-search">
            <div class="input-group  search-mobile  ml-2">
                <input type="search" class="form-control  form-control-sm" aria-label="Search"
                       aria-describedby="search-addon"/>
                <span class=" border-0 search" id="search-addon">
                            <i class="material-icons">search</i>
                            @lang('site.search')
                        </span>
            </div>
        </form>

    </li>
</nav>

