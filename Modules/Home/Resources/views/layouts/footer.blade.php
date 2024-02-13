{{--<footer class="container-fluid">--}}
{{--    <div class="row footer p-5">--}}
{{--        <div class="col-lg-3 col-sm-6 col-xs-6">--}}
{{--            <h1 class="Title mb-2 "> @lang('site.contact') </h1>--}}

{{--            <div class="d-flex flex-row  social ">--}}
{{--                <img src="{{asset('frontend/assets/img/107175_circle_facebook_icon.png')}}" class="img-fluid m-2">--}}
{{--                <img src="{{asset('frontend/assets/img/294709_circle_twitter_icon.png')}}" class="img-fluid m-2">--}}
{{--                <img src="{{asset('frontend/assets/img/1399541_linkedin_material design_icon.png')}}"--}}
{{--                     class="img-fluid m-2">--}}
{{--                <img src="{{asset('frontend/assets/img/2308143_logo_videos_watch_website_youtube_icon.png')}}"--}}
{{--                     class="img-fluid m-2">--}}

{{--            </div>--}}
{{--            <div class="mt-5">--}}
{{--                <h5 class="Title">@lang('site.Subscribe to the newsletter') </h5>--}}
{{--                <input type="email" class="form-control emailss" placeholder="{{trans('site.email')}}">--}}
{{--                <div class="register_errorsSSs"></div>--}}

{{--                <button class="btn btn-style2  btn-style sendemailaddress"--}}
{{--                        style="width:auto; margin-right:0 ;background-color:#463a7c ;color:white ;">  @lang('site.subscribe now')</button>--}}

{{--                </form>--}}

{{--            </div>--}}
{{--            <div class="d-flex flex-row visa-image  ">--}}
{{--                <a><img src="{{asset('frontend/assets/img/visa.png')}}" class="img-fluid m-2"></a>--}}
{{--                <a> <img src="{{asset('frontend/assets/img/mastercard.png')}}" class="img-fluid m-2"></a>--}}
{{--                <a> <img src="{{asset('frontend/assets/img/paypal.png')}}" class="img-fluid m-2"></a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col col-lg-3 col-sm-6 col-xs-6">--}}
{{--            <ul class="footer-item">--}}
{{--                <li><a href="{{route('home')}}"> @lang('site.home') </a></li>--}}
{{--                <li><a href="{{route('worker.browse.task')}}"> {{trans('worker::task.browsetasks')}} </a></li>--}}


{{--                <li><a href="addTasks.html"> انشاء مهمة </a></li>--}}
{{--                <li><a> التسوق بالعمولة </a></li>--}}
{{--            </ul>--}}

{{--        </div>--}}
{{--        <div class="col col-lg-3 col-sm-6 col-xs-6">--}}
{{--            <ul class="footer-item">--}}
{{--                <li><a href="/Home"> عمولة عرب وركرز </a></li>--}}
{{--                <li><a href="{{url('/ar/blog')}}"> @lang('site.Lessons and articles') </a></li>--}}
{{--                <li><a href="{{route('questions')}}"> @lang('site.faqs')  </a></li>--}}
{{--                <li><a href="{{route('contact')}}"> @lang('site.contact')  </a></li>--}}

{{--            </ul>--}}

{{--        </div>--}}
{{--        <div class="col col-lg-3 col-sm-6 col-xs-6">--}}
{{--            <ul class="footer-item">--}}
{{--                <li><a href="{{route('pages','about')}}">   @lang('site.about')</a></li>--}}
{{--                <li><a href="{{route('pages','term')}}">   @lang('site.Usage policy')  </a></li>--}}
{{--                <li><a href="{{route('pages','privacy')}}"> @lang('site.policies')  </a></li>--}}

{{--            </ul>--}}

{{--        </div>--}}
{{--        <div class="bottom-footer">--}}
{{--            <p>عرب وركرز - منصة عربية رسمية مسجلة في وزارة الإستثمار المصرية - جميع الحقوق محفوظة. © 2020 - 2023</p>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</footer>--}}



<footer class="container-fluid">
    <div class="row footer mt-5 col-md-12 col-lg-12">
        <div class="col col-lg-3 col-md-3 col-sm-4 col-xs-4 mt-5">
            <ul class="footer-item">
                <li>
                    <img src="{{asset('frontend/assets/img/11 free 1 (3).png')}}" class="img-fluid" style="margin-right:-8%">

                </li>
                <li>
                    <div class="d-flex flex-row  social ">
                        <img src="{{asset('frontend/assets/img/LinkedIn (1).png')}}" class="img-fluid m-2">
                        <img src="{{asset('frontend/assets/img/X (1).png')}}" class="img-fluid m-2">
                        <img src="{{asset('frontend/assets/img/Facebook.png')}}" class="img-fluid m-2">
                        <img src="{{asset('frontend/assets/img/YouTube.png')}}" class="img-fluid m-2">

                    </div>
                </li>
            </ul>

        </div>
        <div class="col col-lg-2 col-md-2 col-sm-4 col-xs-4 mt-5">
            <ul class="footer-item">
                <h5>@lang('site.Arab Workers')</h5>
                <li><a href="{{route('home')}}"> @lang('site.home') </a></li>
                <li><a href="{{route('worker.browse.task')}}"> {{trans('worker::task.browsetasks')}} </a></li>

                <li> <a  href="{{route('employer.show.create.task.page')}}"> {{trans('employer::task.CreateTaskButton')}} </a> </li>
{{--                <li><a > التسوق بالعمولة  </a></li>--}}
                <li><a href="{{route('contact')}}"> @lang('site.contact')  </a></li>
                <li><a href="{{url('/ar/blog')}}"> @lang('site.Lessons and articles') </a></li>


            </ul>

        </div>
        <div class="col col-lg-2 col-md-2 col-sm-4 col-xs-4 mt-5">
            <ul class="footer-item">
                <h5> @lang('site.Arab Workers') </h5>
{{--                <li><a routerLink="/Home"> عمولة عرب وركرز </a>  </li>--}}
{{--                <li> <a routerLink="/Home"> دروس ومقالات </a> </li>--}}
{{--                <li><a href="AskedQuestions.html">الاسئلة الشائعة  </a></li>--}}
{{--                <li> <a href="TermsofUse.html">  شروط الاستخدام  </a></li>--}}
{{--                <li> <a href="privacy.html"> سياسة الخصوصية </a>  </li>--}}

                <li><a href="{{route('pages','about')}}">   @lang('site.about')</a></li>
                <li><a href="{{route('pages','term')}}">   @lang('site.Usage policy')  </a></li>
                <li><a href="{{route('pages','privacy')}}"> @lang('site.policies')  </a></li>

                <li><a href="{{route('questions')}}"> @lang('site.faqs')  </a></li>


            </ul>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5">



            <div >
                <h5 class="Title">@lang('site.Subscribe to the newsletter') </h5>
                <form>
                    <input type="email" class="form-control search-email emailss" placeholder="{{trans('site.email')}} ">
                    <div class="register_errorsSSs"></div>
                    <button   class="btn btn-style2  btn-style share2 sendemailaddress" >@lang('site.subscribe now') </button>

                </form>


            </div>


        </div>
        <div class="bottom-footer col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="d-flex flex-row visa-image justify-content-center  ">
                <a ><img src="{{asset('frontend/assets/img/Mask group.png')}}" class="img-fluid m-2"></a>
                <a> <img src="{{asset('frontend/assets/img/Frame 624.png')}}" class="img-fluid m-2"></a>
                <a >  <img src="{{asset('frontend/assets/img/Frame 625.png')}}" class="img-fluid m-2"></a>
            </div>
            <p>عرب وركرز - منصة عربية رسمية مسجلة في وزارة الإستثمار المصرية - جميع الحقوق محفوظة. © 2020 - 2023</p>
        </div>

    </div>

</footer>
<script src="{{asset('frontend/js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('frontend/Plugin/progresscircle.js')}}"></script>
<script src="{{asset('frontend/js/index.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="{{asset('frontend/Plugin/Bootstrap/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('frontend/Plugin/Bootstrap/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('frontend/lugin/custom-drag-drop-file-upload/fileUpload/fileUpload.js')}}"></script>

<script src="{{asset('frontend/js/index.js')}}"></script>
@yield('scripts')

<script>

    $(function () {

        $('.btn-link[aria-expanded="true"]').closest('.accordion-item').addClass('active');
        $('.collapse').on('show.bs.collapse', function () {
            $(this).closest('.accordion-item').addClass('active');
        });

        $('.collapse').on('hidden.bs.collapse', function () {
            $(this).closest('.accordion-item').removeClass('active');
        });


    });


    $(document).ready(function () {

        $('.dark').click(function () {
            var darkmode = "{{asset('frontend/css/dark.css')}}";
            var lightmode = "{{asset('frontend/css/light.css')}}";

            if ($('#light').attr('href') == darkmode) {


                $('#light').attr("href", lightmode);

            } else if ($('#light').attr("href") == lightmode) {
                $('#light').attr("href", darkmode);


            }
        })



    });
</script>


<script>


    $(document).ready(function () {

        @if(app()->getLocale()=='ar')
        $('.languagess').html('<a href="{{ LaravelLocalization::getLocalizedURL('en') }}"> <span>english </span><i class="material-icons">language</i>  </a>');
        @elseif(app()->getLocale()=='en')
        $('.languagess').html('<a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">  <i class="material-icons">language</i> <span>العربيه</span>  </a>');
        @endif

    });
    $(document).ready(function () {

        @if(app()->getLocale()=='ar')
        $('#languagess').html('<a href="{{ LaravelLocalization::getLocalizedURL('en') }}"> <span class="ml-3">english </span><i class="material-icons">language</i>  </a>');
        @elseif(app()->getLocale()=='en')
        $('#languagess').html('<a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">  <i class="material-icons">language</i> <span class="ml-3">العربيه </span> </a>');
        @endif

    });

    jQuery('.sendemailaddress').click(function (e) {
        // console.log("daaaa");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        jQuery.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

            url: "{{ route('sendemail') }}",
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                email: jQuery('.emailss').val(),


            },
            success: function (result) {
                console.log(result);

                if (result.content == 'success')


                    swal({
                        title: "Success!",
                        text: "The email has been successfully sent!",
                        type: "success",
                        confirmButtonText: "OK"
                    });

                setTimeout(function () {
                    Swal.close()
                }, 2000)

                window.location.href = '{{route('home')}}';

            },
            error: function (result) {
                // console.log(result.responseJSON);
                var errors = result.responseJSON;
                var errorsList = "";
                $.each(errors, function (_, value) {
                    $.each(value, function (_, fieldErrors) {
                        fieldErrors.forEach(function (error) {
                            errorsList += "<li style='color:#e81f1f'>" + error + "</li>";
                        })
                    });
                });
                $('.register_errorsSSs').html(errorsList);


            }
        });
    });

</script>

</body>

</html>
