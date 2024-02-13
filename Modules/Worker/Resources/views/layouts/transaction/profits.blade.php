@extends('worker::layouts.worker.app')

@section('title')
    {{trans('employer::employer.Profits')}}
@endsection
@section('content')

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Ellipse 8 (2).png')}}" class="img-fluid">
                                <h2>
                                    {{ trans('employer::employer.accounttype') }}

                                </h2>
                                <button class="btn btn-style ">{{auth()->user()->status ?? ''}}</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/coins.png')}}" class="img-fluid">
                                <h2>  {{trans('worker::worker.pendingProfits')}} </h2>
                                <button class="btn USD ">
                                    {{auth()->user()->current_currency}} <br>
                                    {{ number_format(convertCurrency(array_sum($pending_profits), auth()->user()->current_currency),2) }}
                                    <span class="text-xxs">

                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Fram 483.png')}}" class="img-fluid">
                                <h2>  {{trans('worker::worker.acceptedProfits')}}  </h2>
                                <button class="btn USD "> {{auth()->user()->current_currency}} <br> {{ number_format(convertCurrency(array_sum($accepted_profits), auth()->user()->current_currency),2) }} </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 mt-5">
                        <div class="profits">
                            <div class="sub-profits sub-profits-details">
                                <img src="{{asset('frontend/assets/img/Wallet.png')}}" class="img-fluid">
                                <h2> {{trans('worker::worker.walletBalance')}}  </h2>
                                <button class="btn USD">
                                    {{auth()->user()->current_currency}} <br>
                                    {{ number_format(convertCurrency(auth()->user()->wallet_balance, auth()->user()->current_currency),2) }}


                                   </button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="d-flex flex-row justify-content-between Task-data">
                        <h4 class="Title mt-4 col-md-9 col-sm-9 mb-2">   @lang('site.details') </h4>

                    </div>





                    @php $categories=\Modules\Category\Entities\Category::get(); @endphp
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                                <div class="d-flex flex-row justify-content-between Tasks-details ">
                                    <div class="d-flex flex-column sub-task">
                                        <li>
                                            @if (app()->getLocale() == 'ar')
                                                {{$category->ar_title ?? ''}}
                                            @else
                                                {{$category->title ?? ''}}
                                            @endif

                                        </li>
                                        <li>0.55 $</li>

                                    </div>
                                    <div class="d-flex flex-column sub-task ">
                                        <li>
                                            <img
                                                src="{{ Storage::url($category->image) }}"

                                                onerror="this.src='{{asset('frontend/assets/img/317746_facebook_social media_social_icon.png')}}'"

                                                class="img-fluid">
                                        </li>


                                        <li class="date">

                                            {{ date('d-m-Y', strtotime($category->created_at))}}
                                        </li>

                                    </div>

                                </div>

                            </div>
                            <br>
                        @endforeach
                    @endif


                </div>

                <div>

                </div>




            </div>
        </div>


    </div>



@endsection
