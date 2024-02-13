{{--@extends('dashboard::layouts.auth.main')--}}
{{--@section('content')--}}


{{--    --}}
{{--<div class=" col-12 " style="background: var(--bg, #FBFBFB);padding-top:7%;padding-bottom:7%">--}}
{{--    <div class="text-center"  >--}}
{{--    <h1 class="err_text text-danger" style="font-size: 100px">404</h1>--}}
{{--    <h2 class="text-center pt-3">{{trans('dashboard::validation.Page Not Found')}} </h2>--}}
{{--    <p class="text_err_des">{{trans('dashboard::validation.The page you are looking for doesn’t exist')}}</p>--}}
{{--        <div class="form-group center_btn" >--}}
{{--            <button class="btn btn-success" onclick="window.history.back()"  style="background: var(--blue, #09F);border-radius: 27.5px;padding: 18px 57px;gap: 10px;">{{trans('dashboard::validation.Back to back')}}</button>--}}
{{--          </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@include('home::layouts.header')

<div class="container ">
    <div class="row mt-5">
        <div class="col-md-12 col-lg-12 col-sm-12 error404">
            <h1 class="Title">@lang('site.error') </h1>
            <div>
                <img src="{{asset('frontend/assets/img/error404.png')}}" class="img-fluid">
                <h2>{{trans('dashboard::validation.Page Not Found')}}</h2>
                <p class="text_err_des">{{trans('dashboard::validation.The page you are looking for doesn’t exist')}}</p>
                <h1 class="Title">404</h1>
            </div>
            <div class="form-group center_btn" >
                <button class="btn btn-success" onclick="window.history.back()"  style="background: var(--blue, #09F);border-radius: 27.5px;padding: 18px 57px;gap: 10px;">{{trans('dashboard::validation.Back to back')}}</button>
            </div>


        </div>


    </div>
</div>
</div>
@include('home::layouts.footer')
