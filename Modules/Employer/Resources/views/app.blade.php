@include('home::layouts.header')
<!--profile-->
<section class="container-fluid">
    <div class="row">
        <!--start sidebar-->
        <div class="d-flex flex-row justify-content-between sidebar-collapse ">
            <h4 class="Title">  الارباح       </h4>
            <button class="openbtn start sidebarmenu" onclick="openNav()">  <i class="material-icons">menu</i>   </button>
        </div>
        <nav id="sidebar" class="sidebar-small small-items">
            <div class="logo">

                <img src="{{asset('frontend/assets/img/8168615_slack_work_chat_apps_icon.png')}}" class="img-fluid">
            </div>
            <div class="sidebar-header">

                <h4 class="mb-5 ">   الارباح   </h4>

            </div>
            <ul class="list-unstyled components">

                <li class="homepage">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">home_filled</i>

                        الصفحة الرئيسية  </a>
                </li>

                <ul class="list-unstyled components sidebar-data list-unstyled">
                    <li >
                        <a href="#">
                            <i class="material-icons">home_filled</i>
                            لوحة التحكم  </a>

                    </li>
                    <li >
                        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">home_filled</i>

                            المهام </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu2">
                            <li >

                                <a href="#"  class="submenu"> <i class="material-icons">radio_button_off</i> انشاء مهمة </a>
                            </li>
                            <li>

                                <a href="Tasksunderinvestigation.html" class="submenu"><i class="material-icons">radio_button_off</i>المهام قيد التحقيق </a>
                            </li>
                            <li>
                                <a href="#" class="submenu"> <i class="material-icons">radio_button_off</i> المهام النشطة </a>
                            </li>
                            <li>

                                <a href="#" class="submenu"><i class="material-icons">radio_button_off</i>  المهام المتكملة  </a>
                            </li>
                            <li>

                                <a href="#" class="submenu"><i class="material-icons">radio_button_off</i>  المهام المرفوضة  </a>
                            </li>
                            <li>
                                <a href="#" class="submenu"> <i class="material-icons">radio_button_off</i> المهام الغير مدفوعة   </a>
                            </li>
                            <li>
                                <a href="#" class="submenu"> <i class="material-icons">radio_button_off</i>المهام الغير منشورة    </a>
                            </li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">home_filled</i>

                            الشئون المالية  </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu3">
                            <li class="active">

                                <a href="Profits.html"  class="submenu"> <i class="material-icons">radio_button_off</i>  الارباح  </a>
                            </li>
                            <li>

                                <a href="#" class="submenu"><i class="material-icons">radio_button_off</i>  نقل رصيد المحفظة  </a>
                            </li>
                            <li>
                                <a href="Wallethistory.html" class="submenu"> <i class="material-icons">radio_button_off</i>   سجل المحفظة الالكترونية  </a>
                            </li>
                            <li>

                                <a href="Walletbalance.html" class="submenu"><i class="material-icons">radio_button_off</i>   رصيد المحفظة   </a>
                            </li>


                        </ul>
                    </li>


                    <li>
                        <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">home_filled</i>

                            الشئون الادارية   </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu4">
                            <li >

                                <a href="#"  class="submenu"> <i class="material-icons">radio_button_off</i>  سجل تبديل الحساب   </a>
                            </li>
                            <li>

                                <a href="#" class="submenu"><i class="material-icons">radio_button_off</i>    سجل الامتيازات   </a>
                            </li>
                            <li>
                                <a href="#" class="submenu"> <i class="material-icons">radio_button_off</i>     قواعد الامتيازات   </a>
                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="material-icons">home_filled</i>
                            قسم الدعم </a>
                    </li>
                </ul>
                <div class="home">
                    <li>
                        <a>   <i class="material-icons">monetization_on</i> التسوق بالعمولة </a>
                    </li>
                    <li>
                        <a>   <i class="material-icons">contact_mail</i>  ماذا هن  </a>
                    </li>
                    <li>
                        <a>   <i class="material-icons">donut_small</i>  الدعم   </a>
                    </li>

                    <div class="language">
                        <li>
                            <a> <i class="material-icons">brightness_3</i>   السمة  </a>
                        </li>
                        <li>
                            <a><i class="material-icons">language</i>   اللغة  </a>
                        </li>
                    </div>


                </div>


            </ul>



            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="material-icons">close</i></a>

        </nav>
        <!-- Sidebar -->

@yield('content')

@include('home::layouts.footer')

@yield('script')

