<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <title>@lang('site.login') </title>


    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=I@lang('site.Arab Workers')BM+Plex+Sans+Arabic:wght@300;400;600&family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@300;400;600;700&family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
    <link  href="{{asset('frontend/bootstrap/css/bootstrap.rtl.min.css')}}"  rel="stylesheet">
    <link id="rtl" href="{{asset('frontend/css/rtl.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('frontend/Plugin/icon.css')}}"
          rel="stylesheet">

    <link href="{{asset('frontend/Plugin/css2.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('frontend/css/MediaQuery.css')}}" rel="stylesheet" type="text/css">
</head>
<body >

<section class="container">
    <div class="row">

        <div class="col col-lg-6 col-sm-12 col-xs-12 login-back">
            <div class="Sublogin-back">
                <img src="{{asset('frontend/assets/img/Screenshot 2024-01-01 163209.webp')}}" class="img-fluid login-img">
                <h1 class="Title  text-center text-white mt-5">{{trans('site.Arab Workers')}}</h1>
                <div class="sub-title">
                    @lang('site.Direct promotion without')
                    <br>
                    @lang('site.Marketing companies')
                </div>

            </div>

        </div>


        <div class="col-lg-6 dol-sm-12 col-xs-12 login-item">
            <div id="err" style="color: red">
            </div>
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{Session::get('error')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span
                        class="alert-text"><strong>Success!</strong> {{Session::get('success')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            @if($errors->has('email'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('email') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            @if($errors->has('auth_type'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('auth_type') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            @if($errors->has('password'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('password') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            <h5 class="Title mb-4 text-center">{{trans('site.login')}} </h5>
            <form action="{{route('signing.in.to.panel')}}" method="POST" id="logIn_form">
                @csrf
                <div class="mb-2">
                    <label class="mb-3">{{trans('dashboard::auth.Email Or Administrator Number')}}</label>
                    <input type="text" class="form-control mb-2" name="email" placeholder="{{trans('dashboard::auth.Email Or Administrator Number')}}">
                </div>
                <div class="mb-2">
                    <label class="mb-3">  @lang('site.password')  </label>
                    <input type="password" class="form-control mb-2" placeholder="{{trans('site.password')}}" name="password">
                </div>
                <div class="mb-2">
                    <label class="mb-3">  {{trans('dashboard::auth.account_type')}} </label>
                    <select class="form-select" aria-label="Default select example" name="auth_type"  required>
                        <option value="">{{trans('dashboard::auth.account_type')}}</option>
                        <option value="employer">{{trans('dashboard::auth.employer')}}</option>
                        <option value="worker">{{trans('dashboard::auth.worker')}}</option>
                    </select>
{{--                    <a href="{{ route('show.forget.pass.form')}}">{{trans('dashboard::auth.are_you_forget_password')}}</a>--}}
                </div>
                <button  class="btn start" style="width:100%" type="submit">
                    @lang('site.login')
                </button>
                <button  class="btn btn-style btn-style2" style="width:100% ;margin-right: 0;">
                    <a href="{{route('show.sign.up.form')}}"> {{trans('dashboard::auth.GoToRegisterForm')}} </a>
                </button>
            </form>
            <div class="d-flex flex-row ">
                <div class="line"></div>
                <div class=" text-inline" style="display:inline-block;" style="margin-top:-3% ;white-space: nowrap;">{{trans('site.Or register using')}}</div>
                <div class="line"></div>
            </div>
            <div class="googlre-register">
                <a href="{{route('auth.using.google')}}"  class="btn btn-style btn-style2" style="width:100% ;margin-right: 0; margin-bottom:2%">
                    <div class="d-flex flex-row">
                        <img src="{{asset('frontend/assets/img/2993685_brand_brands_google_logo_logos_icon.png')}}" class="img-fluid social">
                        <span>{{trans('dashboard::auth.SignIn Using Google Account')}}</span>
                    </div>
                </a>
                </a>
                <a   href="{{route('auth.using.facebook')}}"  class="btn btn-style btn-style2" style="width:100% ;margin-right: 0; margin-bottom:2%">
                    <div class="d-flex flex-row">
                        <img src="{{asset('frontend/assets/img/5296499_fb_facebook_facebook logo_icon.png')}}" class="img-fluid social">
                        <span>@lang('site.Register via Facebook')</span>
                    </div>
                </a>
                <a   href="{{route('auth.using.apple')}}"  class="btn btn-style btn-style2" style="width:100% ;margin-right: 0; margin-bottom:2%">

                    <div class="d-flex flex-row">
                        <img src="{{asset('frontend/assets/img/104447_apple_logo_icon.png')}}" class="img-fluid social">
                        <span>@lang('site.Register via Apple')</span>
                    </div>
                </a>
                </a>
            </div>




        </div>
    </div>
</section>

<script src="{{asset('frontend/js/jquery-3.2.1.slim.min.js')}}" ></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.js')}}" ></script>
<script src="{{asset('frontend/Plugin/progresscircle.js')}}"></script>
<script src="{{asset('frontend/js/index.js')}}"></script>
</body>

</html>
