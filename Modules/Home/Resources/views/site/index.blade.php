@extends('home::layouts.master')
@section('title')
    @lang('site.Arab Workers')
@endsection
@section('content')
    <div class="container ">
        <div class="row">

            <div class="col-lg-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="data-Title">
                    <h1  class="Title mb-3 one-title">@lang('site.Arab Workers')</h1>
                    <div class="subTitle mb-2">
                        @lang('site.We share with you a unique and inspiring journey')
                        <br>
                        @lang('site.Here creativity meets innovation')
                    </div>
                    <button class="btn start">@lang('site.start')</button>
                </div>

            </div>


            <div class="col-lg-6 col-lg-6 col-sm-12 col-xs-12">
                <img src="{{asset('frontend/assets/img/Space Black iPhone 14 Pro Mockup (3) 1 (3).png')}}" class="img-fluid">

            </div>


        </div>
        <div class="row">

            <h4 class="Title mb-5">@lang('site.Information about us')</h4>
            <p class="small-data mb-5">

                @lang('site.Arab Workers is a pioneer')
            </p>


        </div>
        <div class="row">
            <h4 class="Title text-center mb-5"> @lang('site.Arab digital workers') </h4>
            <div class="col-lg-8">
                <div class="col-lg-12 row">
                    <div class="col-lg-8 ">
                        <div class="image">
                            <img src="{{asset('frontend/assets/img/olp.jpg')}}" class="img-fluid">
                            <div class="caption">

                                <span>@lang('site.Communication networks')</span>
                            </div>


                        </div>


                    </div>
                    <div class="col-lg-4">

                        <div class="image">
                            <img src="{{asset('frontend/assets/img/wireless-split-keyboard.png')}}" class="img-fluid">
                            <div class="caption">

                                <span> @lang('site.google')   </span>
                            </div>
                        </div>
                        <div class="image">
                            <img
                                src="{{asset('frontend/assets/img/trh_democracy_on_trial_artwork1_wide-ec1ae0d269f2788c32a56427ea20084ceca33b9c-s800-c15.jpg')}}"
                                class="img-fluid mt-3">
                            <div class="caption">

                                <span> @lang('site.Opinion poll')    </span>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-lg-12">
                    <div class="image">
                        <img src="{{asset('frontend/assets/img/37511984-4348-b__2302.jpg')}}" class="img-fluid mt-2">
                        <div class="caption">

                            <span>  @lang('site.More')    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 last-image">

                {{--                    <img src="{{asset('frontend/assets/img/Banner-Background-01013-new.jpg')}}" class="img-fluid">--}}
                <div class="caption" style="padding: 10%;">

                <span> @lang('site.Intelligence')
                    <br>
                    <br>
                    @lang('site.Artificial')
                     </span>
                </div>

            </div>

        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-xs-12 mt-5 mb-5 ">
                <img src="{{asset('frontend/assets/img/people.png')}}" class="img-fluid"
                >
            </div>
            <div class="col-lg-6 col-xs-12 mt-5 mb-5">
                <h1 class="Title">@lang('site.Distinctive solutions to complete and promote your business online')</h1>

                <div class="worker">
                    <span for="html">@lang('site.Let people work for you')</span>
                    <i class="material-icons">radio_button_checked</i>
                </div>
                <div class="worker">
                    <span for="html"> @lang('site.Electronic workers from selected countries') </span>
                    <i class="material-icons">radio_button_checked</i>
                </div>
                 
                <div class="worker">
                    <span for="html">@lang('site.You determine what each worker will earn')     </span>
                    <i class="material-icons">radio_button_checked</i>
                </div>
                 
                <div class="worker">
                    <span for="html">   @lang('site.Requiring workers to provide proof')  </span>
                    <i class="material-icons">radio_button_checked</i>
                </div>
                 
                 
                 
                <div>
                    <button class="btn start ">@lang('site.Request your worker now')</button>
                </div>


            </div>

        </div>

        <div class="row  frequency">
            <h1 class="Title">مجتمع عرب وركرز </h1>
            <div class="col-lg-12 col-sm-12 row mt-5">

            </div>
            <div class="row mt-5 ">

                <!---<div class="col-lg-4 col-sm-6 col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small">عامل مشترك</div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6 col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small"> مهام تم انجازها  </div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6 col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small"> صاحب عمل  </div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6  col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small"> ارباح العمال  </div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6  col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small"> خدمات في معرض الاعمال </div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6 col-xs-6">
                     <div class="circle-big">
                         <div class="text">
                             3.150<div class="small"> بطاقات دعم فني تم حلها  </div>
                         </div>
                         <svg>
                             <circle class="bg" cx="57" cy="57" r="52"></circle>
                             <circle class="progress" cx="57" cy="57" r="52"></circle>
                         </svg>
                     </div>-->
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cicle1.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>عامل إلكتروني نشط</h4>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cicle2.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>  مهام تم انجازها</h4>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cice3.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>  صاحب عمل </h4>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cice3.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>    ارباح اعمال </h4>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cicle4.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>   خدمات في معرض الأعمال </h4>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6 col-xs-6">
                    <div class="cicle1">
                        <img src="{{asset('frontend/assets/img/cicle5.png')}}" class="img-fluid">
                        <div class="cap">
                            <h2>3.150</h2>
                            <h4>   بطاقات دعم فني تم حلها </h4>

                        </div>
                    </div>

                </div>
            </div>





        </div>
{{--        <div class="row">--}}
{{--            <h1 class="Title">@lang('site.Arab Workers community') </h1>--}}
{{--            <div class="col-lg-12 col-sm-12 row mt-5">--}}

{{--            </div>--}}
{{--            <div class="row mt-5 ">--}}

{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small">@lang('site.common factor')</div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small">@lang('site.Tasks completed')  </div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small">    @lang('site.employer')  </div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small"> @lang('site.Workers profits')  </div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small"> @lang('site.Services at the business exhibition') </div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-xs-6">--}}
{{--                    <div class="circle-big">--}}
{{--                        <div class="text">--}}
{{--                            3.150--}}
{{--                            <div class="small"> @lang('site.Technical support tickets have been resolved')  </div>--}}
{{--                        </div>--}}
{{--                        <svg>--}}
{{--                            <circle class="bg" cx="57" cy="57" r="52"></circle>--}}
{{--                            <circle class="progress" cx="57" cy="57" r="52"></circle>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}

{{--        </div>--}}




        <section class="row p-5 m-lg-auto ">

            <div class="col-lg-6 col-lg-5 col-sm-12  col-xs-12 mt-5 me-auto">
                <h5 class="Title">  @lang('site.Are you looking for digital workers to complete your work?') </h5>
                <div class="card card-color ">
                    <div class="img-related">
                        <img class="card-img-top small-image" src="{{asset('frontend/assets/img/Rdata.png')}}" alt="Card image cap" class="small-image mt-5" >
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="material-icons">radio_button_checked</i>
                            <span> @lang('site.Post your mission to promote your project')
                                <br>
                                @lang('site.Pay only when you are satisfied')</span>

                        </div>
                        <div class="card-title">
                            <i class="material-icons">radio_button_checked</i>
                            <span> @lang('site.Real and safe promotion') 100 % </span>

                        </div>
                        <div class="card-title">
                            <i class="material-icons">radio_button_checked</i>
                            <span> @lang('site.You determine what each worker will earn')  </span>

                        </div>
                        <div class="card-title">
                            <i class="material-icons">radio_button_checked</i>
                            <span> @lang('site.Additional distinctive options for large tasks') </span>

                        </div>

                    </div>
                    <button class="btn btn-style">
                        @lang('site.Request your worker now')
                    </button>

                </div>
            </div>
            <div class="col-lg-5 col-lg-6 col-sm-12 col-xs-12 mt-5 me-auto">
                <h5 class="Title"> @lang('site.Are you looking for tasks to work on?')  </h5>
                <div class="card card-color2">
                    <div class="img-related">
                        <img class="card-img-top small-image"
                             src="{{asset('frontend/assets/img/wallet-3254551-2725154.png')}}" alt="Card image cap"
                             class="small-image mt-5">

                    </div>
                    <div class="card-body">
                        <div class="card-title2 d-flex flex-row ">
                            <i class="material-icons">radio_button_checked</i>
                            <span> @lang('site.Find tasks you want to accomplish')
                                <br>
                              @lang('site.According to your interest')  </span>

                        </div>
                        <div class="card-title2 d-flex flex-row ">
                            <i class="material-icons">radio_button_checked</i>
                            <span>@lang('site.Spend your time and make money') </span>

                        </div>
                        <div class="card-title2 d-flex flex-row ">
                            <i class="material-icons">radio_button_checked</i>
                            <span>   @lang('site.Complete simple proof tasks to earn money')   </span>

                        </div>
                        <div class="card-title2 d-flex flex-row ">
                            <i class="material-icons">radio_button_checked</i>
                            <span>@lang('site.Invite your friends and earn more') </span>

                        </div>

                    </div>
                    <button class="btn btn-style btn-style2">@lang('site.Complete the first task')
                    </button>

                </div>

            </div>


        </section>
        <section class="row Artical">
            <h1 class="Title">  @lang('site.Lessons and articles') </h1>
            @foreach($blogs as $blog)
                <div class="col-lg-6 col-xs-12 mt-3">
                    <div class="card ">
                        <img class="card-img-top img-fluid" src="{{asset('frontend/assets/img/person.jpg')}}"
                             alt="Card image cap">
                        <div class="card-body ">
                            <h5 class="card-name">
                                {{$blog->name ?? ''}}
                            </h5>
                            <p class="card-text">
                                {{$blog->description ?? ''}}

                            </p>
                            <button class="btn btn-style2  btn-style"
                                    style="width:30% ; margin-right:0">@lang('site.know more')</button>
                        </div>
                    </div>

                </div>

            @endforeach

        </section>
        <section class="row  mt-5 ">
            <h1 class="Title">   @lang('site.faqs')  </h1>
            <div class="col-lg-6 col-xs-12 d-flex flex-row justify-content-between m-auto ">
                <div class="col-lg-6 col-xs-6 ">
                    <div class="circle ">
                        <span>@lang('site.employer')</span>

                    </div>

                </div>
                <div class="col-lg-6 col-xs-6 ">
                    <div class="empty-circle ">
                        <span>@lang('site.employer')</span>

                    </div>

                </div>

            </div>
            <div class="col-lg-6 col-xs-12">
                <img src="{{asset('frontend/assets/img/mm.jpg')}}" class="img-fluid">

            </div>
            <div class="col-lg-9 col-xs-12 mt-5">
                @foreach($questions as $question)
                    <div class="flex-row d-flex justify-content-between data-people mt-3">
                        <span>{{$question->question ?? ''}} </span>


                    </div>

                @endforeach


            </div>

        </section>
    </div>
@endsection














