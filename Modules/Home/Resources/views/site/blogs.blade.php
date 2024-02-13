@extends('home::layouts.master')
@section('title')
    @lang('site.Popular articles')
@endsection
@section('content')


    <div class="container ">
        <div class="row search-places" id="search-places">
            <div class="col-lg-12 col-sm-12 contactus">
                <div class="card ">
                    <img src="{{asset('frontend/assets/img/blog.jpg')}}" class="img-fluid Question-img">
                    <div class=" col-md-12 col-sm-12 col-lg-12">
                        <div class=" d-flex flex-row justify-content-between mt-4">
                            <h2 class="Title mb-4">@lang('site.The best way to know the world') </h2>
                            <form class=" searchform  ">
                                <input type="search" placeholder=" &#xe8b6; ابحث عن الموضوع او السؤال " class="form-control search-blog">
                            </form>
                        </div>
                        <div class="row">
                            <h6 class="articalTitle"> @lang('site.Popular articles') .. </h6>
                            @foreach($blog as $b)
                            <div class="col-lg-6 col-md-6 col-sm-12 blog-header">
                                <img src="{{asset('frontend/assets/img/services.jpg')}}" class="img-fluid">
                                <div class="cap-blog">
                                    <h6 class="Title">{{$b->name ?? ''}} </h6>
                                    <span>{{$b->date ?? ''}}</span>


                                </div>

                            </div>
                            @endforeach
                        </div>

                        <div class="px-5 searchservices">
                            <h6 class="articalTitle">  @lang('site.Popular articles') .. </h6>
                            <div class="row">
                                @foreach($blogs as $bb)
                                <div class=" col-lg-6 col-md-6 c0l-sm-12 col-xs-12 ">
                                    <div class="blog-data ">
                                        <div class="mt-1 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <h6 class="Title">{{$bb->name ?? ''}}</h6>

                                            <div class="d-flex flex-row justify-content-between ">
                                                <span>{{$bb->date ?? ''}}</span>
                                                <a hrf="#"> <span>@lang('site.know more')</span></a>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <img src="{{asset('frontend/assets/img/services.jpg')}}" class="img-fluid mt-1 ">
                                        </div>


                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>





            </div>
        </div>

    </div>
    </div>




@endsection

@section('script')


<script type="text/javascript">
    $('.search-blog').on('keyup', function () {
        var query = $(this).val();
        $.ajax({
            url: "{{ route('searchBlog') }}",
            type: "GET",
            data: {'query': query},
            success: function (data) {
                // if (data !== '0') {
                $("#search-places").empty();
                $("#search-places").html(data);

                // } else {
                //
                //     console.log("notfound")
                //     $("#favouriteplaces").show();
                // }
                console.log("response", data);
            }
        })
    });

</script>

@endsection











