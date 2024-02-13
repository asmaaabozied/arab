

    <div class="col-lg-12 col-sm-12 contactus">
        <div class="card ">

            <div class=" col-md-12 col-sm-12 col-lg-12">
                <div class="">
                    <div class=" mb-3 services mt-3" style="direction: ltr; text-align: left;">
                        <a _msttexthash="100646" _msthash="19">Support </a> <i class="material-icons"
                                                                               _msttexthash="421083" _msthash="20">keyboard_arrow_left</i>
                        <a _msttexthash="203255" _msthash="21">Service Buyer </a> <i class="material-icons"
                                                                                     _msttexthash="421083"
                                                                                     _msthash="22">keyboard_arrow_left</i>
                        <a _msttexthash="353938" _msthash="23"> Search for services </a> <i class="material-icons"
                                                                                            _msttexthash="421083"
                                                                                            _msthash="24">keyboard_arrow_left</i>


                    </div>

                    @foreach($blogs as $blog)
                    <div class="px-5 searchservices">
                        <h4 class="articalTitle" _msttexthash="353938" _msthash="26"
                            style="direction: ltr; text-align: left;">{{$blog->name ?? ''}} </h4>
                        <img src="{{asset('frontend/assets/img/services.jpg')}}" class="img-fluid">
                        <div class="mt-4">
                            <p _msttexthash="67241928" _msthash="27" style="direction: ltr; text-align: left;">

                                {{$blog->description ?? ''}}

                            </p>
                        </div>
                    </div>
                        <br>
                        <hr>
                    @endforeach

                </div>

            </div>


        </div>
    </div>












