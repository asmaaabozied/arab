<footer class="container-fluid">
    <div class="row footer mt-5 col-md-12 col-lg-12">

        <div class="bottom-footer col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="d-flex flex-row visa-image justify-content-center  ">
                <a><img src="{{asset('frontend/assets/img/Mask group.png')}}" class="img-fluid m-2"></a>
                <a> <img src="{{asset('frontend/assets/img/Frame 624.png')}}" class="img-fluid m-2"></a>
                <a>  <img src="{{asset('frontend/assets/img/Frame 625.png')}}" class="img-fluid m-2"></a>
            </div>
            <p _msttexthash="7897175" _msthash="130" style="direction: ltr;">ArabWorks - An official Arabic platform registered in the Egyptian Ministry of Investment - All rights reserved. © 2020 - 2023</p>
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
