@extends('dashboard::layouts.auth.main')
@section('content')
    <div class="row">
        <div class="col-12 ">

            <div class="form_container  bg-white ">
                <div class="heading text-center">
                    <h1 class="form-heading">{{trans('dashboard::auth.Sign in')}}</h1>
                </div>
                <div class="col-12 center-align mb-2">
                    <a class="btn bg-primary d-flex justify-content-between flex-row-reverse " href="{{route('auth.using.google')}}" style="text-transform:none">
                        <div class="">
                            <img width="50px" style="margin-top:0px; margin-right:0px"
                                 alt="Google sign-in"
                                 src="{{asset('assets/img/Google5.png')}}"/>
                        </div>
                        <span class="mt-2 font-20 text-white">{{trans('dashboard::auth.SignIn Using Google Account')}}</span>

                    </a>
                </div>

                <!-- In the callback, you would hide the gSignInWrapper element on a successful sign in -->
                  <div id="gSignInWrapper" class="center_btn mt-3 mb-3">
                      <div id="customBtn" class="customGPlusSignIn">
                          <span class=""></span>
                    </div>
                </div>
                <div id="name"></div>
                <div class="login_form form-default">
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
                    @if($errors->has('captcha'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{trans('dashboard::auth.Error!')}}</strong> {{ $errors->first('captcha') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    @endif
                    <form class="row g-4" action="{{route('signing.in.to.panel')}}" method="POST" id="logIn_form">
                        @csrf
                        <div class="col-md-12 relative">
                            <select class="form-select" aria-label="Default select example" name="auth_type"  required>
                                <option value="">{{trans('dashboard::auth.account_type')}}</option>
                                <option value="employer">{{trans('dashboard::auth.employer')}}</option>
                                <option value="worker">{{trans('dashboard::auth.worker')}}</option>
                            </select>
                            <img src="{{asset('assets/img/default/type.png')}}" class="input_img" width="20">

                        </div>

                        <div class="col-md-12 relative">
                            <input type="email" class="form-control input-lg inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.Email Or Administrator Number')}}" name="email" required value="{{old('email')}}">
                            <img src="{{asset('assets/img/mail.png')}}" class="input_img" width="20">
                        </div>
                        <div class="col-md-12 relative">
                            <input type="password" id="lpassword" class="form-control input-lg inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.password')}}" name="password" required>
                            <img src="{{asset('assets/img/pass.png')}}" class="input_img" id="myInput"
                                 width="16">
                            <div id="lpassword-close-eye">
                                <i type="button" class="fas fa-eye-slash" id="togglePassword"
                                   onclick="changePasswordType()"></i>
                            </div>
                            <div id="lpassword-open-eye">
                                <i type="button" class="fas fa-eye" id="togglePassword"
                                   onclick="changePasswordType()"></i>
                            </div>
                        </div>


                        <div class="col-md-12 relative">
                            <input type="text" id="captcha" class="form-control input-lg inputPlaceholder"
                                   placeholder="{{trans('dashboard::auth.captcha_code')}}" name="captcha" required>
                            <img src="{{asset('assets/img/default/captcha.png')}}" class="input_captcha" width="20">
                            <div>
                                <i type="button" class="fas fa-rotate" id="toggleCapatch"
                                   onclick="refreshCaptch()"></i>
                            </div>
                        </div>
                        <div> <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;</div>

                        <a class="text-red anchor-hover-color"  href="{{ route('show.forget.pass.form')}}">{{trans('dashboard::auth.are_you_forget_password')}}</a>

                        <div class="col-md-12">
                            <button type="submit" class="btn w-100 theme_green font-28 pt-2 pb-2">{{trans('dashboard::auth.Signing in')}}
                            </button>
                            <p class="black-text text-center mt-4   font-20 mb-0">{{trans('dashboard::auth.not_have_account')}} <a
                                    href="{{route('show.sign.up.form')}}"
                                    class="blu-text"> {{trans('dashboard::auth.GoToRegisterForm')}}</a></p>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <script type="text/javascript">
        function refreshCaptch(){
            $.ajax({
                type: 'get',
                url: '{{ route('refreshCaptcha') }}',
                success: function (data) {
                    $('.captcha-image').html(data.captcha);
                }
            });
        }
    </script>

    <script>

        $('#lpassword-open-eye').hide();

        function changePasswordType() {
            let input_type = $('#lpassword').attr('type');

            if (input_type == 'password') {
                $('#lpassword').prop('type', 'text');
                $('#lpassword-open-eye').show();
                $('#lpassword-close-eye').hide();
            } else {
                $('#lpassword').prop('type', 'password');
                $('#lpassword-open-eye').hide();
                $('#lpassword-close-eye').show();
            }
        }

    </script>

@endsection
