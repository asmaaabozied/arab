@extends('home::layouts.master')
@section('title')
    @lang('site.Pages')
@endsection
@section('content')


    <div class="container ">
        <div class="rown mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card  privacy">
                    <img src="{{asset('frontend/assets/img/privacy-policy-concept-illustration_114360-7698.avif')}}"
                         class="img-fluid Question-img">
                    <h4 class="Title"> {{$page->name ?? ''}} </h4>
                    <div class="col-lg-12 col-sm-12 mt-5">

                        <p>

                            {{$page->description ?? ''}}
                        </p>

                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>
@endsection














