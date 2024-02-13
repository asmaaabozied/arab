@extends('home::layouts.master')
@section('title')
    @lang('site.faqs')
@endsection
@section('content')


    <div class="container ">
        <div class="rown mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card  privacy">
                    <img src="{{asset('frontend/assets/img/puzzle-concept-illustration_114360-6902.avif')}}"
                         class="img-fluid Question-img">
                    <h4 class="Title"> @lang('site.faqs') </h4>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mt-5">
                            @foreach($questions as $question)
                                <div class="dropdown mt-4 question">
                                    <div class=" dropdown-toggle question-style d-flex flex-row justify-content-between"
                                         data-toggle="dropdown">
                                        <span> {{$question->question ?? ''}}  </span>
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li><p>

                                                {{$question->reply ?? ''}}
                                            </p></li>

                                    </ul>
                                </div>

                                <br>
                                <br>
                            @endforeach
                            <br>
                        </div>
                        <br>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
 <br>
                    <br>
                    <br>
                    <br>


                </div>
                <br>
            </div>
            <br>
        </div>
        <br>
    </div>
    <br>
    </div>
    <br>
@endsection














