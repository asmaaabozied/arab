@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="page-header min-height-300 border-radius-xl mt-4 " style="background-image:url({{asset('assets/img/curved-images/curved0.jpg')}}) ; background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>

    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <form method="Post" action="{{route('admin.update.profile',$id)}}"

              enctype="multipart/form-data">
            @csrf
            <div class="row gx-4">

                <div class="col-auto">
                    <!-- start old avatar preview -->
                {{--                                        <div class="avatar avatar-xl position-relative">--}}
                {{--                                            <img src="" alt="profile_image" class="w-100 border-radius-lg shadow-sm">--}}
                {{--                                        </div>--}}
                <!-- end old avatar preview -->

                    <div class="personal-image">
                        <label class="label">
                            <input name="avatar" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <figure class="personal-figure">
                                @if(isset($avatar))
                                    <img class="radius" id="output"  src="{{Storage::url($avatar)}}" width="120" height="120">
                                @endif
                                @if(!$avatar)
                                    <img class="radius" id="output" src="{{$default_avatar??''}}" width="120" height="120">
                                @endif
                                {{--                                    <img class="radius" id="output" src="{{$default_avatar??''}}" width="120" height="120">--}}
                                <figcaption class="personal-figcaption">
                                    <img src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                </figcaption>
                            </figure>
                        </label>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$name}} <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">Last login at: {{$last_login_at}}</span>
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">

                            {{$role_name}} / {{$administrative_number}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row gx-4" >
                @if($errors->has('password'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('password') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('name'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('name') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('email'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('email') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('mobile'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('mobile') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('status'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('status') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('avatar'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('avatar') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('new_password'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('new_password') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->has('password_confirmation'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('password_confirmation') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="example-search-input" class="form-control-label">Name</label>

                        <input class="form-control" name="name" type="text" value="{{$name}}" id="example-search-input">
                    </div>
                    <div class="form-group">
                        <label for="example-email-input" class="form-control-label">Email</label>

                        <input class="form-control" type="email" name="email" value="{{$email}}" id="example-email-input">
                    </div>
                    <div class="form-group">
                        <label for="example-url-input" class="form-control-label">Mobile</label>

                        <input class="form-control" type="text" name="mobile" value="{{$mobile}}" id="example-url-input">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">STATUS</label>

                        <select  name="status" class="form-control"  id="exampleFormControlSelect1">
                            @if($status == "ACCEPTED")
                                <option selected>ACCEPTED</option>
                                <option>REJECTED</option>
                                <option>PENDING</option>
                            @endif
                            @if($status == "PENDING")
                                <option>REJECTED</option>
                                <option>ACCEPTED</option>
                                <option selected >PENDING</option>
                            @endif
                            @if($status == "REJECTED")
                                <option >ACCEPTED</option>
                                <option selected >REJECTED</option>
                                <option>PENDING</option>
                            @endif
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">STATUS</label>

                        <p><select class="form-control" name="choices-button" id="choices-button" placeholder="Departure">
                                <option value="Choice 1" selected="">Brazil</option>
                                <option value="Choice 2">Bucharest</option>
                                <option value="Choice 3">London</option>
                                <option value="Choice 4">USA</option>
                            </select></p>

                    </div>
                    <div class="form-group">
                        <label for="example-password-input" class="form-control-label">Password</label>
                        <input class="form-control" type="password" name="password" value="" id="example-password-input">
                    </div>
                    <div class="form-group">
                        <label for="example-password-input" class="form-control-label">New Password <span class="text-primary" style="font-size: 9px">If you want to change your password, fill in this field</span></label>
                        <input class="form-control" type="password" name="new_password" value="" id="example-password-input">
                    </div>
                    <div class="form-group">
                        <label for="example-password-input" class="form-control-label">Confirm Password</label>
                        <input class="form-control" name="password_confirmation" type="password" value="" id="example-password-input">
                    </div>
                </div>
                {{--                    <button type="submit" class="btn bg-gradient-primary">Update</button>--}}

            </div>
            <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Update</button>
        </form>


    </div>
@stop
