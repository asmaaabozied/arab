@extends('home::layouts.master')
@section('title')
    @lang('site.contact')
@endsection

@section('content')



    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 col-sm-12 contactus">
                <div class="card ">
                    <img src="{{asset('frontend/assets/img/Contact-us-amico.webp')}}" class="img-fluid Question-img">
                    <div  class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="Title">  @lang('site.contact')   </h4>
                            <p>
                                @lang('site.Welcome to the Arab Works Help Center. Please leave your message and we will get back to you within the next few hours.')


                                </p>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <form class="contactUsForm">

                                <div class="form-group register_errorsS" >


                                </div>
                                <div class="form-group">
                                    <label >@lang('site.name') </label>
                                    <input type="text" class="form-control name"  aria-describedby="emailHelp" placeholder="{{trans('site.name')}}" name="name">

                                </div>
                                <div class="form-group">
                                    <label >@lang('site.phone')  </label>
                                    <input type="text" class="form-control phone"  placeholder="{{trans('site.phone')}}" name="phone">
                                </div>
                                <div class="form-group">
                                    <label > @lang('site.message')  </label>
                                    <textarea type="text" class="form-control message" cols="60" rows="5 " placeholder="{{trans('site.message')}}" name="message">
                                        </textarea>
                                </div>

                                <button type="submit" class="btn start mt-4 formregisters">@lang('site.send') </button>
                            </form>

                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>





@endsection
@section('script')

<script>


    jQuery('.formregisters').click(function (e) {
        // console.log("daaaa");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        jQuery.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

            url: "{{ route('addContacts') }}",
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                name: jQuery('.name').val(),
                message: jQuery('.message').val(),
                phone: jQuery('.phone').val(),


            },
            success: function (result) {
                console.log(result);

                if (result.content == 'success')


                    swal({
                        title: "Success!",
                        text: "The message has been successfully sent!",
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
                $('.register_errorsS').html(errorsList);


            }
        });
    });

</script>
@endsection















