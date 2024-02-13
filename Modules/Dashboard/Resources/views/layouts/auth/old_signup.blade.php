@extends('dashboard::layouts.auth.main')
@section('content')
    <div class="row">
        <div class="col-12 ">

            <div class="form_container  bg-white ">
                <div class="heading text-center">
                    <h1 class="form-heading">{{trans('dashboard::auth.SignUpToArabWorker')}}</h1>
                    <div class="col-12 center-align mb-2">
                        <a class="btn bg-primary d-flex justify-content-between flex-row-reverse " href="{{route('auth.using.google')}}"
                           style="text-transform:none">
                            <div class="">
                                <img width="50px" style="margin-top:0px; margin-right:0px"
                                     alt="Google sign-in"
                                     src="{{asset('assets/img/Google5.png')}}"/>
                            </div>
                            <span
                                class="mt-2 font-20 text-white">{{trans('dashboard::auth.SignUp Using Google Account')}}</span>

                        </a>
                    </div>
                </div>
                <div class="login_form form-default">
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
                    <form id="reg_form" class="row g-4" method="POST" action="{{route('signing.to.arab.workers')}}">
                        @csrf
                        <div class="col-md-12 relative">
                            <select class="form-select" aria-label="Default select example" name="registration_type"
                                    required>
                                <option value="">{{trans('dashboard::auth.account_type')}}</option>
                                <option value="employer">{{trans('dashboard::auth.employer')}}</option>
                                <option value="worker">{{trans('dashboard::auth.worker')}}</option>
                            </select>
                            <img src="{{asset('assets/img/default/type.png')}}" class="input_img" width="20">

                        </div>

                        <div class="col-md-12 relative">
                            <input type="text" class="form-control inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.full_name')}}" name="name" required id="name">
                            <img src="{{asset('assets/img/user.png')}}" class="input_img" width="20">
                        </div>

                        <div class="d-none" id="name-validation">
                            <span class='text-danger d-block' id="name-show"></span>
                        </div>


                        <div class="col-md-12 relative">
                            <input type="email" class="form-control inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.email')}}" name="email" required id="email">
                            <img src="{{asset('assets/img/mail.png')}}" class="input_img" width="20">
                        </div>

                        <div class="d-none" id="email-validation">
                            <span class='text-danger d-block' id="email-show"></span>
                        </div>

                        <div class="col-md-12 relative">
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
                            <img src="{{asset('assets/img/default/map.png')}}" class="input_img" width="20">

                        </div>



                        <div class="col-md-12 relative">
                            <select class="form-select" aria-label="Default select example" name="city" required
                                    id="city-dropdown">
                                <option value="">{{trans('dashboard::auth.select_city')}}</option>
                            </select>
                            <img src="{{asset('assets/img/default/home.png')}}" class="input_img" width="20">

                        </div>
                        <div class="d-none" id="country-validation">
                            <span class='text-danger d-block' id="country-show"></span>
                        </div>

                        <div class="d-none" id="country-validation">
                            <span class='text-danger d-block' id="country-show"></span>
                        </div>


                        <div class="col-md-12 relative">
                            <input type="text" class="form-control inputPlaceholder"
                                   >
                            <img src="{{asset('assets/img/default/phone.png')}}" class="input_img" width="20">
                        </div>


                        <div class="col-md-12 relative">
                            <input type="Password" class="form-control inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.password')}}" name="password" required
                                   id="password">
                            <img src="{{asset('assets/img/pass.png')}}" class="input_img" id="myInput" width="16">
                            <div id="password-close-eye">
                                <i type="button" placeholder="{{trans('dashboard::auth.phone')}}" value="" name="phone"
                                   id="CallingCode" requiredclass="fas fa-eye-slash" id="togglePassword"
                                   onclick="myFunction()"></i>
                            </div>
                            <div id="password-open-eye">
                                <i type="button" class="fas fa-eye" id="togglePassword" onclick="myFunction()"></i>
                            </div>
                        </div>

                        <div class="d-none" id="password-validation">
                            <span class='text-danger d-block' id="match-pass"></span>
                            <span class='text-danger d-block' id="min-length"></span>
                            <span class='text-danger d-block' id="pass-show"></span>
                        </div>


                        <div class="col-md-12 relative">
                            <input type="password" class="form-control inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.confirm_password')}}"
                                   name="password_confirmation" required id="confirm-password">
                            <img src="{{asset('assets/img/pass.png')}}" class="input_img" id="myInput1" width="16">
                            <div id="confirm-close-eye">
                                <i type="button" class="fas fa-eye-slash" id="togglePassword"
                                   onclick="myFunction1()"></i>
                            </div>
                            <div id="confirm-open-eye">
                                <i type="button" class="fas fa-eye" id="togglePassword" onclick="myFunction1()"></i>
                            </div>
                        </div>

                        <div class="d-none" id="cpassword-validation">
                            <span class='text-danger d-block' id="cpass-show"></span>
                        </div>


                        <div class="col-md-12">
                            <div class="check_boxx">
                                <div class="form-check">
                                    <input class="form-check-input the-check-box" type="checkbox" value=""
                                           id="condition1" name="condition1" required>
                                    <label class="form-check-label"
                                           for="condition1">{{trans('dashboard::auth.confirm_condition')}}</label>
                                </div>

                                <div class="d-none" id="condition1-validation">
                                    <span class='text-danger d-block' id="condition1-show"></span>
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input the-check-box" type="checkbox" value=""
                                           id="condition2" name="condition2">
                                    <label class="form-check-label"
                                           for="condition2">{{trans('dashboard::auth.news_letter')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit"  class="btn w-100 theme_green font-28 pt-2 pb-2 mt-4 mb-3"
                                    ></button>
                        </div>
                        <div class="col-md-12">
                            <p class="black-text font-20 text-center mt-3 mb-3">{{trans('dashboard::auth.do_you_have_account')}}
                                <a href="{{route('show.login.form')}}"{{ trans('dashboard::auth.Signing up') }}
                                   class="blu-text">{{ trans('dashboard::auth.login') }}</a></p>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
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

        function () {
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
                number_of_error += 1;reg_form_validation
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
@endsection
