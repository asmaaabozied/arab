@extends('home::layouts.master')
@section('title')
    support
@endsection
@section('content')



    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 col-sm-12 contactus">
                <div class="card ">
                    <img src="{{asset('frontend/assets/img/support.jpg')}}" class="img-fluid Question-img">
                    <div class=" col-md-12 col-sm-12 col-lg-12">
                        <div class="">
                            <h4 class="Title mb-3 mt-3"> كيف يمككني مساعدتك اليوم ؟ </h4>
                            <form class="col-md-12 col-sm-12 col-lg-12 searchform  ">
                                <input type="search" placeholder=" &#xe8b6; ابحث عن الموضوع او السؤال "
                                       class="form-control">
                            </form>
                            <div>
                                <h5 class="articalTitle">مقالات شائعة </h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <ul class="artical-public">
                                            <li> 1. اضافة خدمة متميزة</li>
                                            <li> 1. نموذج خدمة التصميم</li>
                                        </ul>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <ul class="artical-public">
                                            <li> 1. إنشاء حساب</li>
                                            <li> 1. إدارة الطلب كبائع
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <ul class="artical-public">
                                            <li> 1. سحب الأرباح</li>
                                            <li> 1. إضافة نماذج أعمال
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <ul class="artical-public">
                                            <li> 1. نموذخ خدمة تصميم</li>
                                            <li> 1. نموذخ خدمة تصميم</li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 mt-2 ">
                                        <div class="contactus-bg">
                                            <div class="d-flex flex-row justify-content-between artical-data ">
                                                <h5 class="articalTitle"> مشتري الخدمات </h5>
                                                <span> <a href="services.html">12 مقال  </a></span>
                                            </div>
                                            <div>
                                                <ul class="artical-public">
                                                    <li> البحث عن خدمات</li>
                                                    <li> نصائح لأختبار الخدمات</li>
                                                    <li>التواصل مع البائع قبل شراء الخدمة</li>
                                                    <li>شراء الخدمة</li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 mt-2">
                                        <div class="contactus-bg">
                                            <div class="d-flex flex-row justify-content-between artical-data ">
                                                <h5 class="articalTitle"> البائعين </h5>
                                                <span> <a href="services.html">12 مقال  </a></span>
                                            </div>
                                            <div>
                                                <ul class="artical-public">
                                                    <li> البحث عن خدمات</li>
                                                    <li> نصائح لأختبار الخدمات</li>
                                                    <li>التواصل مع البائع قبل شراء الخدمة</li>
                                                    <li>شراء الخدمة</li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>



@endsection














