<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="author" content="ArabWorkers | Mohammad Gamel">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
        {{trans('admin::admin.'.$page_name) ?? trans('admin::admin.page_title')}}
    </title>

    <link href='https://fonts.googleapis.com/css?family=El Messiri' rel='stylesheet'>
    <link href="{{asset('assets/css/admin/assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/admin/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <link href="{{asset('assets/css/admin/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/soft-ui-dashboard.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/css/admin/assets/css/soft-ui-dashboard-rtl.css')}}" type="text/css"/>

</head>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
                        {{trans('admin::signIn.Arab Workers: Sign in to admin dashboard')}}
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                                    <i class="fas fa-home opacity-6 text-dark me-1"></i>
                                    {{trans('admin::signIn.browseTasks')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="#">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    {{trans('admin::signIn.createTask')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="#">
                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                    {{trans('admin::signIn.blog')}}
                                </a>
                            </li>

                        </ul>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a href="#" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-secondary">{{trans('admin::signIn.BackToHome')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">{{trans('admin::signIn.signInFormLine1')}}</h3>
                                <p class="mb-0">{{trans('admin::signIn.signInFormLine2')}}</p>
                            </div>
                            <div class="card-body">
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('admin::signIn.Error!')}}</strong> {{Session::get('error')}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
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
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->has('email'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text"><strong>{{trans('admin::signIn.Error!')}}</strong> {{ $errors->first('email') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->has('password'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>{{trans('admin::signIn.Error!')}}</strong> {{ $errors->first('password') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                    @if($errors->has('captcha'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>{{trans('admin::signIn.Error!')}}</strong> {{ $errors->first('captcha') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <label>{{trans('admin::signIn.Email Or Administrator Number')}}</label>

                                <form method="POST" action="{{route('admin.signingIn')}}" >
                                    @csrf

                                    <div class="mb-3">
                                        <input name="email" value="{{old('email')}}" type="text" class="form-control"
                                               placeholder="{{trans('admin::signIn.Email Or Administrator Number')}}"
                                               aria-label="Email" aria-describedby="email-addon" required>
                                    </div>
                                    <label>{{trans('admin::signIn.password')}}</label>
                                    <div class="mb-3">
                                        <input name="password" type="password" class="form-control"
                                               placeholder="{{trans('admin::signIn.password')}}" aria-label="Password"
                                               aria-describedby="password-addon" required>
                                    </div>

                                    <label>{{trans('admin::signIn.captcha_code')}}</label>
                                    <div class="mb-3">
                                        <input id="captcha" type="text"
                                               placeholder="{{trans('admin::signIn.captcha_code')}}"
                                               class="form-control" name= "captcha" required>
                                        <div class="d-flex justify-content-evenly mt-2 ">
                                            <button type="button"
                                                    class="btn btn-success refresh-button">{{trans('admin::signIn.refresh_captcha')}}</button>
                                            <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label text-lg"
                                               for="rememberMe">{{trans('admin::signIn.Remember me')}}</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                                class="btn bg-gradient-info w-100 mt-4 mb-0">{{trans('admin::signIn.Sign in')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block me-n8">
                            <div
                                class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('/assets/css/admin/assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
{{--<footer class="footer py-5">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-8 mb-4 mx-auto text-center">--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    Company--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    About Us--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    Team--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    Products--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    Blog--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">--}}
{{--                    Pricing--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">--}}
{{--                    <span class="text-lg fab fa-dribbble"></span>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">--}}
{{--                    <span class="text-lg fab fa-twitter"></span>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">--}}
{{--                    <span class="text-lg fab fa-instagram"></span>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">--}}
{{--                    <span class="text-lg fab fa-pinterest"></span>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">--}}
{{--                    <span class="text-lg fab fa-github"></span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-8 mx-auto text-center mt-1">--}}
{{--                <p class="mb-0 text-secondary">--}}
{{--                    Copyright © <script>--}}
{{--                        document.write(new Date().getFullYear())--}}
{{--                    </script> Soft by Creative Tim.--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="{{url('assets/js/core/popper.min.js')}}"></script>
<script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="{{asset('assets/css/admin/assets/js/buttons.js')}}"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('assets/css/admin/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.refresh-button').click(function () {
            $.ajax({
                type: 'get',
                url: '{{ route('admin.refreshCaptcha') }}',
                success: function (data) {
                    $('.captcha-image').html(data.captcha);
                }
            });
        });
    });
</script>
</body>

</html>
