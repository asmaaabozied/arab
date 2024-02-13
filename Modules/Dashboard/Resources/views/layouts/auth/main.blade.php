<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <meta name="author" content="ArabWorkers | Mohammad Gamel">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
        {{trans('dashboard::auth.'.$page_name)}}
    </title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('assets/css/login/libs.css')}}">

    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('assets/css/login/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login/style.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('assets/css/login/default_en.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login/style_en.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/login/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login/custom.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

</head>

<body>

<div class="preloader preloader-1" id="preloader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-light home-nav">
    <div class="container">

        <a class="navbar-brand" href="https://arabworkers.com/"><img src="{{asset('assets/img/logo.png')}}"
                                                                     class="brand-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link link " href="#">{{trans('dashboard::auth.GoToHomePage')}}</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link link" href="#">{{trans('dashboard::auth.browseTask')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" href="#">{{trans('dashboard::auth.TermsAndConditions')}}</a>
                </li>

            </ul>
{{--            <div class="btn-group">--}}

{{--                <button onclick="window.location.href='http://127.0.0.1:8000/auth/login'" class="green-button">--}}
{{--                    <span id="logInText">حسابي</span>--}}
{{--                    <i class="fa-solid fa-user logInIcon"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>
</nav>


<main class="page_main login-main">
    <div class="container">
      @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="bg-white footer">
    <div class="container ">
        <div class="row gy-4">
            <div class="col-lg-8 col-md-12">
                <div class="row gy-4">
                    <div class="col-12">
                        <img src="{{asset('assets/img/logo_f.png')}}" class="mb-2">
                    </div>
                    <!-- 1 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="f_links ps-5 ps-md-0">

                            <div class="f_links_bottom">
                                <ul>
                                    <li><a href="https://arabworkers.com/">الرئيسية</a></li>
                                    <li><a href="http://127.0.0.1:8000/browse-tasks"> تصفح المهام</a></li>
                                    <li><a
                                            href="http://127.0.0.1:8000/create-task">إنشاء
                                            مهمة
                                        </a></li>
                                    <li>
                                        <a href="https://arabworkers.com/%d8%a7%d9%84%d8%aa%d8%b3%d9%88%d9%8a%d9%82-%d8%a8%d8%a7%d9%84%d8%b9%d9%85%d9%88%d9%84%d8%a9/">
                                            التسويق بالعمولة</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="f_links_bottom">
                            <ul>
                                <li>
                                    <a href="https://arabworkers.com/%d8%a7%d9%84%d8%a3%d8%b3%d8%a6%d9%84%d8%a9-%d8%a7%d9%84%d8%b4%d8%a7%d8%a6%d8%b9%d8%a9/">
                                        الأسئلة الشائعة</a></li>
                                <li><a href="https://arabworkers.com/%d9%85%d9%86-%d9%86%d8%ad%d9%86/"> عن عرب وركرز</a>
                                </li>
                                <li><a
                                        href="https://arabworkers.com/%d8%b9%d9%85%d9%88%d9%84%d8%a9-%d8%b9%d8%b1%d8%a8-%d9%88%d8%b1%d9%83%d8%b1%d8%b2/">
                                        عمولة عرب وركرز</a></li>
                                <li><a
                                        href="https://arabworkers.com/%d8%aa%d9%88%d8%a7%d8%b5%d9%84-%d9%85%d8%b9%d9%86%d8%a7/">تواصل
                                        معنا
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="f_links_bottom">
                            <ul>
                                <li><a href="https://arabworkers.com/blog/"> دروس ومقالات </a></li>
                                <li>
                                    <a href="https://arabworkers.com/%d8%a7%d9%84%d8%a3%d8%b3%d8%a6%d9%84%d8%a9-%d8%a7%d9%84%d8%b4%d8%a7%d8%a6%d8%b9%d8%a9/">
                                        الأسئلة الشائعة</a></li>
                                <li><a
                                        href="https://arabworkers.com/%d8%b4%d8%b1%d9%88%d8%b7-%d8%a7%d9%84%d8%a7%d8%b3%d8%aa%d8%ae%d8%af%d8%a7%d9%85/">
                                        شروط الاستخدام</a></li>
                                <li><a
                                        href="https://arabworkers.com/%d8%b3%d9%8a%d8%a7%d8%b3%d8%a9-%d8%a7%d9%84%d8%ae%d8%b5%d9%88%d8%b5%d9%8a%d8%a9/">سياسة
                                        الخصوصية
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 d-flex flex-column justify-content-center">
                <div class="f_links text-center">
                    <h4 style="font-size: 21px;" class="purple-text fw-bold">تواصل معنا</h4>
                    <div class="social_links mb-5 my-4">
                        <a style="color: #395185;" href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a style="color: #55ACEE;" href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a style="color: #FF0000;" href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a style="color: #0A66C2;" href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                    <h4 class="mb-4 purple-text fs-6 fw-bold">اشترك في النشرة البريدية</h4>
                    <div class="f-link_box ">
                        <form class="d-flex mb-2" role="search">
                            <input class="form-control footer-field" type="search" placeholder="البريد الالكتروني"
                                   aria-label="Search">
                            <button class="btn-1 footer-btn btn-radius" type="submit"><i
                                    class="fa-solid fa-arrow-left"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="copy_right">
                    <div class="pay_links text-center mb-3">
                        <img src="{{asset('assets/img/p1.png')}}" class="des-block">
                        <img src="{{asset('assets/img/p2.png')}}" class="des-block">
                        <img src="{{asset('assets/img/p3.png')}}" class="des-block">
                    </div>
                    <p class="text-center">عرب وركرز - منصة عربية مسجلة في وزارة الاستثمار المصرية - جميع الحقوق
                        محفوظة. 2020 - 2022 ©</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('assets/js/libs.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</body>

</html>
