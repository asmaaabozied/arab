<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <title>@lang('site.Arab Workers')</title>


    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@300;400;600&family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@300;400;600;700&family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
    <link  href="{{asset('frontend/bootstrap/css/bootstrap.rtl.min.css')}}"  rel="stylesheet">

    <link href="{{asset('frontend/Plugin/progresscircle.css')}}" rel="stylesheet">

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
            <h5 class="Title mb-4 text-center"> انشاء حساب  </h5>

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


                @if($errors->has('name'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('name') }}</span>
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
                @if($errors->has('registration_type'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('registration_type') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                @endif

                @if($errors->has('country'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('country') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                @endif
                @if($errors->has('city'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('city') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">
                        </button>
                    </div>
                @endif
                @if($errors->has('phone'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('phone') }}</span>
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
            <form method="POST" action="{{route('signing.to.arab.workers')}}">
                @csrf
                <div class="col-md-12 row mb-2">
                    <div class="col-md-6 col-xs-6">
                        <label> {{trans('dashboard::auth.full_name')}} </label>
                        <input type="text" class="form-control" placeholder="{{trans('dashboard::auth.full_name')}}" name="name" required id="name">
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label> {{trans('dashboard::auth.email')}}  </label>
                        <input type="email" class="form-control" placeholder="{{trans('dashboard::auth.email')}}" name="email" required id="email">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-6 col-xs-6 mb-2">
                        <label> {{trans('dashboard::auth.account_type')}}   </label>
                        <select class="form-select" aria-label="Default select example" name="registration_type"
                                required>
                            <option value="">{{trans('dashboard::auth.account_type')}}</option>
                            <option value="employer">{{trans('dashboard::auth.employer')}}</option>
                            <option value="worker">{{trans('dashboard::auth.worker')}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>@lang('site.address') </label>


                        <select class="form-select" aria-label="Default select example" name="country" required
                                id="country-dropdown">
                            <option class="text-primary">{{trans('dashboard::auth.select_country')}}</option>
                            @if(count($countries) > 0)
                                @if(app()->getLocale() == "ar")
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->ar_name}}</option>
                                    @endforeach
                                @else
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                @endif
                            @else
                                <option>{{trans('dashboard::auth.NoCountryFound')}}</option>

                            @endif
                        </select>
                    </div>

                    <div class="d-none" id="country-validation">
                        <span class='text-danger d-block' id="country-show"></span>
                    </div>

                    <div class="col-md-3">
                        <label>@lang('site.city') </label>

                        <select class="form-select" aria-label="Default select example" name="city" required
                                id="city-dropdown">
                            <option value="">{{trans('dashboard::auth.select_city')}}</option>
                        </select>
                    </div>
                </div>

                <div class="d-none" id="country-validation">
                    <span class='text-danger d-block' id="country-show"></span>
                </div>

                <div class="d-none" id="country-validation">
                    <span class='text-danger d-block' id="country-show"></span>
                </div>

                <div class="col-md-12 row p-3">
                    <label>   {{trans('dashboard::auth.phone')}}  </label>
                    <input type="text" class="form-control" placeholder="{{trans('dashboard::auth.phone')}}" value="" name="phone"
                           id="CallingCode" required>

                </div>
                <div class="col-md-12 row">
                    <div class="col-md-6 ">
                        <label>{{trans('dashboard::auth.password')}} </label>
                        <input type="password" class="form-control" placeholder="{{trans('dashboard::auth.password')}}" name="password" required
                               id="password">

                    </div>
                    <div class="col-md-6 ">
                        <label>{{trans('dashboard::auth.confirm_password')}}</label>
                        <input type="password" class="form-control" placeholder="{{trans('dashboard::auth.confirm_password')}}"
                               name="password_confirmation" required id="confirm-password">

                    </div>
                </div>
                <div class="mt-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="condition1" name="condition1" required>
                        <label class="form-check-label" for="flexRadioDefault1" style="margin-top:0">
                            {{trans('dashboard::auth.confirm_condition')}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  id="condition2" name="condition2" >
                        <label class="form-check-label" for="flexRadioDefault2" style="margin-top:0">
                            {{trans('dashboard::auth.news_letter')}}
                        </label>
                    </div>
                </div>
                <button  class="btn start" style="width:100% ;margin-right: 0;">
                    {{ trans('dashboard::auth.Signing up') }}
                </button>
            </form>


        </div>
    </div>
</section>
<script src="{{asset('frontend/js/jquery-3.2.1.slim.min.js')}}" ></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.js')}}" ></script>

<script src="{{asset('frontend/js/index.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--fetch city by country-->
<script>
    $(document).ready(function () {
        $('#country-dropdown').on('change', function () {
            var idCountry = this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url: "{{route('fetch.cities.when.sign.up')}}",
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
<script>

    function reg_form_validation() {
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm-password').val();
        let country = $('#country-select').val();
        let user_type = $('#user-type-select').val();
        let number_of_error = 0;

        if (name == "") {
            $('#name-validation').removeClass('d-none');
            document.getElementById('name-validation').display = 'block';
            document.getElementById("name-show").innerHTML = "لا يمكن ترك حقل الاسم فارغًا";
            number_of_error += 1;
        } else {
            $('#name-validation').addClass('d-none');
        }
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email == "") {
            $('#email-validation').removeClass('d-none');
            document.getElementById('email-validation').display = 'block';
            document.getElementById("email-show").innerHTML = "لا يمكن ترك حقل البريد الإلكتروني فارغًا";
            number_of_error += 1;
        } else {
            $('#email-validation').addClass('d-none');
        }
        if (email) {
            if (!email.match(validRegex)) {
                $('#email-validation').removeClass('d-none');
                document.getElementById('email-validation').display = 'block';
                document.getElementById("email-show").innerHTML = "تنسيق بريد إلكتروني غير صالح";
                number_of_error += 1;
            } else {
                $('#email-validation').addClass('d-none');
            }
        }


        // Password Validation
        if (password == "") {
            $('#password-validation').removeClass('d-none');
            document.getElementById('password-validation').display = 'block';
            document.getElementById("pass-show").innerHTML = "لا يمكن ترك حقل كلمة المرور فارغًا";
            number_of_error += 1;
        } else {
            document.getElementById("pass-show").innerHTML = "";
            $('#password-validation').addClass('d-none');
            if (password.length < 8) {
                $('#password-validation').removeClass('d-none');
                document.getElementById('password-validation').display = 'block';
                document.getElementById("min-length").innerHTML = "يجب ألا يقل طول كلمة المرور عن 8 أحرف";
                number_of_error += 1;
            } else {
                document.getElementById("min-length").innerHTML = "";
                $('#password-validation').addClass('d-none');
            }
        }

        if (confirm_password == "") {
            $('#cpassword-validation').removeClass('d-none');
            document.getElementById('cpassword-validation').display = 'block';
            document.getElementById("cpass-show").innerHTML = "لا يمكن ترك حقل تأكيد كلمة المرور فارغًا";
            number_of_error += 1;
        } else {
            $('#cpassword-validation').addClass('d-none');
            document.getElementById("cpass-show").innerHTML = "";

        }
        // password and confirm password match check
        if (password != '' && confirm_password != "" && password.length >= 8) {
            if (password != confirm_password) {
                $('#password-validation').removeClass('d-none');
                document.getElementById('password-validation').display = 'block';
                document.getElementById("match-pass").innerHTML = "كلمة المرور وتأكيد كلمة المرور غير متطابقين";
                number_of_error += 1;
            } else {
                document.getElementById("match-pass").innerHTML = "";
                $('#password-validation').addClass('d-none');

            }
        }

        // country validation
        if (country == '') {
            $('#country-validation').removeClass('d-none');
            document.getElementById('country-validation').display = 'block';
            document.getElementById("country-show").innerHTML = "لا يمكن ترك حقل البلد فارغًا";
            number_of_error += 1;
        } else {
            $('#country-validation').addClass('d-none');
        }

        // User Type validation
        if (user_type == '') {
            $('#userType-validation').removeClass('d-none');
            document.getElementById('userType-validation').display = 'block';
            document.getElementById("userType-show").innerHTML = "لا يمكن أن يكون حقل نوع المستخدم فارغًا";
            number_of_error += 1;
        } else {
            $('#userType-validation').addClass('d-none');
        }

        //Condition 1 validation
        if (document.getElementById('condition1').checked == false) {
            $('#condition1-validation').removeClass('d-none');
            document.getElementById('condition1-validation').display = 'block';
            document.getElementById("condition1-show").innerHTML = "الرجاء قبول الشروط والأحكام";
            number_of_error += 1;
        } else {
            $('#condition1-validation').addClass('d-none');
        }

        // submit form
        if (number_of_error == 0) {
            preloader_on();
            document.getElementById("reg_form").submit();
        }
    }

    $('#password-open-eye').hide();
    $('#confirm-open-eye').hide();

    function myFunction() {
        let input_type = $('#password').attr('type');
        if (input_type == 'password') {
            $('#password').prop('type', 'text');
            $('#password-open-eye').show();
            $('#password-close-eye').hide();
        } else {
            $('#password').prop('type', 'password');
            $('#password-open-eye').hide();
            $('#password-close-eye').show();
        }
    }

    function myFunction1() {
        let input_type = $('#confirm-password').attr('type');
        if (input_type == 'password') {
            $('#confirm-password').prop('type', 'text');
            $('#confirm-open-eye').show();
            $('#confirm-close-eye').hide();
        } else {
            $('#confirm-password').prop('type', 'password');
            $('#confirm-open-eye').hide();
            $('#confirm-close-eye').show();
        }
    }


</script>



</body>
</html>
