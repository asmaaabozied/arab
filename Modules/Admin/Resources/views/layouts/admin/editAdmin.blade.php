@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form action="{{route('admin.update.edited.admin',$data->id)}}" method="Post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2" style="margin-left: 20px;margin-right: 20px">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="avatar" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">
                                    @if(isset($data->avatar))
                                        <img class="radius" id="output" src="{{Storage::url($data->avatar)}}"
                                             width="120" height="120">
                                    @endif
                                    @if(!$data->avatar)
                                        <img class="radius" id="output" src="{{$default_avatar??''}}" width="120"
                                             height="120">
                                    @endif
                                    <figcaption class="personal-figcaption" style="text-align: center">
                                        <img
                                            src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                    </figcaption>
                                </figure>
                            </label>
                        </div>
                        @if($errors->has('password'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Error!</strong> {{ $errors->first('password') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('password_confirmation'))

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
                        @if($errors->has('role_id'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Error!</strong> {{ $errors->first('role_id') }}</span>
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
                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input" class="form-control-label">Name</label>

                                    <input class="form-control" value="{{$data->name}}" name="name" type="text"
                                           id="example-search-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input" class="form-control-label">Email</label>

                                    <input class="form-control" type="email" name="email" value="{{$data->email}}"
                                           id="example-email-input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select name="role_id" class="form-control" id="choices-button" required>
                                        <option class="bg-primary"
                                                value="{{$data->role_id}}">{{$data->role->name}}</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">STATUS</label>
                                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        @if($data->status == 'accepted')
                                            <option class="bg-primary" value="accepted" selected>ACCEPTED</option>
                                            <option value="rejected">REJECTED</option>
                                            <option value="pending">PENDING</option>
                                        @endif
                                        @if($data->status == 'rejected')
                                            <option value="accepted">ACCEPTED</option>
                                            <option class="bg-primary" value="rejected" selected>REJECTED</option>
                                            <option value="pending">PENDING</option>
                                        @endif
                                        @if($data->status == 'pending')
                                            <option value="accepted">ACCEPTED</option>
                                            <option value="rejected">REJECTED</option>
                                            <option class="bg-primary" value="pending" selected>PENDING</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="form-control-label">New Password <span
                                            class="text-primary" style="font-size: 9px">If you want to change your password, fill in this field</span></label>
                                    <input class="form-control" type="password" name="password" value=""
                                           id="example-password-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input" class="form-control-label">Confirm
                                        Password</label>
                                    <input class="form-control" name="password_confirmation" type="password" value=""
                                           id="example-password-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn bg-gradient-primary w-auto m-4">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

@stop
