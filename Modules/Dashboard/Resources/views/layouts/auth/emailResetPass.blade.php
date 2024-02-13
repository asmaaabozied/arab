@extends('dashboard::layouts.auth.main')
@section('content')
    <div class="row">
        <div class="col-12 ">

            <div class="form_container  bg-white ">
                <div class="heading text-center">
                    <h1 class="form-heading">{{trans('dashboard::auth.reset Mail Your password')}}</h1>

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


                    @if($errors->has('email'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('email') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    @endif


                    <form id="reg_form" class="row g-4" method="POST" action="{{route('mail-forget-password')}}">
                        @csrf


                        <div class="col-md-12 relative">
                            <input type="email" class="form-control inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.email')}}" name="email" required id="email">
                            <img src="{{asset('assets/img/mail.png')}}" class="input_img" width="20">
                        </div>

                        <div class="d-none" id="email-validation">
                            <span class='text-danger d-block' id="email-show"></span>
                        </div>


                        <div class="col-md-12">
                            <button type="submit"  class="btn w-100 theme_green font-28 pt-2 pb-2 mt-4 mb-3"
                                    >{{ trans('dashboard::auth.confirm') }}</button>
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

@endsection
<script>
    function togglePasswordVisibility() {
      var input = document.querySelector('.password_input');
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
        }

</script>
