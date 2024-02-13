@extends('employer::layouts.employer.app')
@section('title')
    {{trans('employer::employer.UpdateMyProfile')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">
        <div class="row dashboard">


            @if($errors->has('name'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('name') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('address'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('address') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('zip_code'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('zip_code') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('description'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('description') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('gender'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('gender') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('phone'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('phone') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif
            @if($errors->has('country'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('country') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            @if($errors->has('city'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('city') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif
            @if($errors->has('new_password'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('new_password') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif
            @if($errors->has('password_confirmation'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('employer::employer.Error!')}}</strong> {{ $errors->first('password_confirmation') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                    </button>
                </div>
            @endif

            <div class="card">
                <div class="row">
                    <div class="d-flex flex-row mb-4">
                        <img src="{{asset('frontend/assets/img/4043263_avatar_muslim_paranja_woman_icon.png')}}"
                             class="img-fluid small-img">
                        <h5 class="profile-title ">

                            {{$employer->name}}
                        </h5>
                    </div>
                    <div class="col-lg-4  col-sm-12 col-xs-12">
                        <div class="inf0-details">
                            <h6 class="Title">{{trans('employer::employer.personalInformationDetails')}}</h6>

                            <div class="d-flex flex-row justify-content-between mt-2 ">
                                <span>{{trans('admin::employer.wallet_balance')}} </span>
                                <span>  {{ number_format(convertCurrency($employer->wallet_balance, $employer->current_currency),2) }}

                                     </span>
                                <span>{{$employer->current_currency}} </span>

                            </div>
                            <div class="d-flex flex-row justify-content-between mt-2 ">
                                <span>{{trans('admin::employer.total_spends')}}  </span>
                                <span>      {{ number_format(convertCurrency($employer->total_spends, $employer->current_currency),2) }}

                                </span>
                                <span>{{$employer->current_currency}} </span>

                            </div>
                            <div class="d-flex flex-row justify-content-between mt-2">
                                <span>
                                                                                                    {{trans('employer::employer.employer_privileges')}}

                                </span>

                                <span>{{array_sum($total)}} </span>

                            </div>
                            <div class="d-flex flex-row justify-content-between mt-2">
                                <span>{{trans('admin::employer.employer_status')}}   </span>


                                @if($employer->status == "enable")
                                    <span class="font-weight-bolder  {{"text_worker_".$employer->status}} mb-0">
                                        {{trans('admin::employer.'.$employer->status)}}
                                    </span>
                                @else
                                    <span>
                                        {{trans('admin::employer.'.$employer->status)}}
                                        ({{$employer->suspend_days}} {{trans('employer::employer.suspend_days')}}
                                        )
                                    </span>
                                @endif


                                <br>
                                <br>
                                <br>
                            </div>


                        </div>


                    </div>


                    <div class=" col-lg-8 col-sm-12 cpl-xs-12 info-form">
                        <form class="row" method="POST" action="{{route('employer.update.my.profile')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.Name')}}</label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">person</i>
                                    <input type="text" name="name" value="{{$employer->name ?? ''}}"
                                           class="form-control" placeholder="{{trans('employer::employer.Name')}}">
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.phone')}}</label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">phone</i>
                                    <input type="text" class="form-control"
                                           placeholder="{{trans('employer::employer.phone')}}" name="phone"
                                           required value="{{$employer->phone ?? ''}}">
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.country')}}</label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">language</i>


                                    <select class="form-select" aria-label="Default select example"
                                            name="country" required
                                            id="country-dropdown">
                                        <option
                                            class="text-primary">{{trans('dashboard::auth.select_country')}}</option>
                                        @if(count($countries) > 0)
                                            @if(app()->getLocale() == "ar")
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{$country->id}}"
                                                        @if($country->id==$employer->country_id) selected @endif>{{$country->ar_name}}</option>
                                                @endforeach
                                            @else
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{$country->id}}"
                                                        @if($country->id==$employer->country_id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            @endif
                                        @else
                                            <option>{{trans('dashboard::auth.NoCountryFound')}}</option>

                                        @endif
                                    </select>

                                </div>

                            </div>

                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.city')}}</label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">home_filled</i>
                                    <select class="form-select" aria-label="Default select example"
                                            name="city"
                                            id="city-dropdown">
                                        <option value="{{$employer->city->id}}">{{$employer->city->name ?? ''}}</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.address')}} </label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">location_pin</i>

                                    <input type="text" class="form-control"
                                           placeholder="{{trans('employer::employer.address')}}" name="address"
                                           required value="{{$employer->address}}">

                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.zip_code')}} </label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">email</i>
                                    <input type="text" class="form-control"
                                           placeholder="{{trans('employer::employer.zip_code')}}"
                                           name="zip_code"
                                           required value="{{$employer->zip_code}}">
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label> {{trans('employer::employer.description')}}  </label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">grading</i>
                                    <input type="text" class="form-control" value="{{$employer->description ?? ''}}"
                                           name="description">
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>   @lang('site.email') </label>
                                <div class="d-flex flex-row">
                                    <i class="material-icons">request_page</i>
                                    <input type="text" class="form-control" name="email"
                                           value="{{$employer->email ?? ''}}">
                                </div>

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>{{trans('employer::employer.gender')}}</label>

                                <div class="d-flex flex-row">
                                    <i class="material-icons">hail</i>
                                    <select class="form-control" aria-label="Default select example"
                                            name="gender"
                                            required>
                                        @if($employer->gender == "male")
                                            <option selected class="bg-primary"
                                                    value="male">{{trans('employer::employer.male')}}</option>
                                            <option
                                                value="female">{{trans('employer::employer.female')}}</option>
                                        @elseif($employer->gender == "female")
                                            <option selected class="bg-primary"
                                                    value="female">{{trans('employer::employer.female')}}</option>
                                            <option value="male">{{trans('employer::employer.male')}}</option>
                                        @else
                                            <option
                                                value="female">{{trans('employer::employer.female')}}</option>
                                            <option value="male">{{trans('employer::employer.male')}}</option>
                                        @endif
                                    </select>

                                </div>

                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label>{{trans('employer::employer.New Password')}} </label>
                                        <div class="d-flex flex-row">
                                            <i class="material-icons">lock</i>
                                            <input type="password" class="form-control"
                                                   placeholder="{{trans('employer::employer.New Password')}}"
                                                   name="new_password"
                                                   id="password"></div>

                                    </div>
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label>{{trans('employer::employer.Confirm Password')}}</label>
                                        <div class="d-flex flex-row">
                                            <i class="material-icons">lock</i>
                                            <input type="password" class="form-control inputPlaceholder"
                                                   placeholder="{{trans('employer::employer.Confirm Password')}}"
                                                   name="password_confirmation" id="confirm-password"></div>

                                    </div>
                                </div>


                            </div>

                            <div>
                                <button class="btn btn-style btn-style2 profile-info" type="submit">
                                    {{trans('employer::employer.UpdateMyProfile')}}

                                </button>


                            </div>
                        </form>


                    </div>
                </div>

                <div>

                </div>


            </div>
        </div>
        {{--        <div class="row dashboard">--}}
        {{--            <div class="card">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="Task-investigation">--}}
        {{--                        <div class="col-lg-12 col-md-12 col-sm-12">--}}
        {{--                            <div class="investigation  ">--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <div>--}}
        {{--                                        <h4>الاشتراك او البحث عن الصفحة داخل اليوتيوب </h4>--}}
        {{--                                    </div>--}}

        {{--                                    <div class="invest">--}}
        {{--                                        <p>قيد التنفيذ</p>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <img src="{{asset('frontend/assets/img/4102573_applications_facebook_media_social_icon.png')}}"--}}
        {{--                                         class="img-fluid">--}}
        {{--                                    <div class="d-flex flex-column">--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">العرض المقدم </h6> &nbsp; &nbsp; &nbsp; &nbsp;--}}
        {{--                                            <span>أقدم خدمات تصميم واجهة وتجربة مستخدم للمواقع الإلكترونية، باستخدام أحدث التقنيات والأساليب. سأعمل معك لإنشاء واجهة مستخدم جذابة وسهلة الاستخدام،</span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row ">--}}
        {{--                                            <h6 class="Title "> اجرك علي هذة المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>USD  160 </span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">تاريخ إكمال المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>18 - 8 - 2023</span>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
        {{--                            <div class="investigation  ">--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <div>--}}
        {{--                                        <h4>الاشتراك او البحث عن الصفحة داخل اليوتيوب </h4>--}}
        {{--                                    </div>--}}

        {{--                                    <div class="invest">--}}
        {{--                                        <p>قيد التنفيذ</p>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <img src="assets/img/2609571_chat_media_social_telegram_icon.png"--}}
        {{--                                         class="img-fluid">--}}
        {{--                                    <div class="d-flex flex-column">--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">العرض المقدم </h6> &nbsp; &nbsp; &nbsp; &nbsp;--}}
        {{--                                            <span>أقدم خدمات تصميم واجهة وتجربة مستخدم للمواقع الإلكترونية، باستخدام أحدث التقنيات والأساليب. سأعمل معك لإنشاء واجهة مستخدم جذابة وسهلة الاستخدام،</span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row ">--}}
        {{--                                            <h6 class="Title "> اجرك علي هذة المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>USD  160 </span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">تاريخ إكمال المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>18 - 8 - 2023</span>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
        {{--                            <div class="investigation  ">--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <div>--}}
        {{--                                        <h4>الاشتراك او البحث عن الصفحة داخل اليوتيوب </h4>--}}
        {{--                                    </div>--}}

        {{--                                    <div class="invest">--}}
        {{--                                        <p>قيد التنفيذ</p>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <img src="../assets/img/8444244_spotify_music_sound_multimedia_icon.png"--}}
        {{--                                         class="img-fluid">--}}
        {{--                                    <div class="d-flex flex-column">--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">العرض المقدم </h6> &nbsp; &nbsp; &nbsp; &nbsp;--}}
        {{--                                            <span>أقدم خدمات تصميم واجهة وتجربة مستخدم للمواقع الإلكترونية، باستخدام أحدث التقنيات والأساليب. سأعمل معك لإنشاء واجهة مستخدم جذابة وسهلة الاستخدام،</span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row ">--}}
        {{--                                            <h6 class="Title "> اجرك علي هذة المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>USD  160 </span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">تاريخ إكمال المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>18 - 8 - 2023</span>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                        </div>--}}
        {{--                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
        {{--                            <div class="investigation  ">--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <div>--}}
        {{--                                        <h4>الاشتراك او البحث عن الصفحة داخل اليوتيوب </h4>--}}
        {{--                                    </div>--}}

        {{--                                    <div class="invest">--}}
        {{--                                        <p>قيد التنفيذ</p>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                                <div class="d-flex flex-row justify-content-between">--}}
        {{--                                    <img src="../assets/img/4362957_snapchat_logo_social media_icon.png"--}}
        {{--                                         class="img-fluid">--}}
        {{--                                    <div class="d-flex flex-column">--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">العرض المقدم </h6> &nbsp; &nbsp; &nbsp; &nbsp;--}}
        {{--                                            <span>أقدم خدمات تصميم واجهة وتجربة مستخدم للمواقع الإلكترونية، باستخدام أحدث التقنيات والأساليب. سأعمل معك لإنشاء واجهة مستخدم جذابة وسهلة الاستخدام،</span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row ">--}}
        {{--                                            <h6 class="Title "> اجرك علي هذة المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>USD  160 </span>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="d-flex flex-row  ">--}}
        {{--                                            <h6 class="Title ">تاريخ إكمال المهمة </h6> &nbsp; &nbsp;--}}
        {{--                                            <span>18 - 8 - 2023</span>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                        </div>--}}


        {{--                    </div>--}}

        {{--                </div>--}}

        {{--                <div>--}}

        {{--                </div>--}}


        {{--            </div>--}}
        {{--        </div>--}}


    </div>


@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{route('employer.fetch.cities.when.update.profile')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-dropdown').html('<option class="text-primary" value="">{{trans('employer::signIn.pleas select your city')}}</option>');
                        @if(app()->getLocale()=="ar")
                        $.each(result.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.ar_name + '</option>');
                        });
                        @else
                        $.each(result.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        @endif
                        document.getElementById("CallingCode").value = result['phone'].calling_code;
                    }
                });
            });
        });

    </script>


@endsection
