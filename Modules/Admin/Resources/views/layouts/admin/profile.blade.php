@extends('dashboard::layouts.admin.master')
@section('content')
<div class="page-header min-height-300 border-radius-xl mt-4 "
     style="background-image:url({{asset('assets/img/curved-images/curved0.jpg')}}) ; background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>

</div>
<div class="card card-body shadow-blur mx-4 mt-n6 overflow-hidden">
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{Session::get('error')}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{Session::get('success')}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if($errors->has('password'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('password') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if($errors->has('name'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('name') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if($errors->has('mobile'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('mobile') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="{{asset('assets/img/default/default-avatar.svg')}}" alt="profile_image"
                     class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    test <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">Joined_at: test</span>
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    Count Of Discount Code <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">sdsadas</span> Code / Count of Use Your Codes: <span class="mb-0 font-weight-bold text-sm" style="color:#0099ff ">aasdsa</span> Once
                </p>
            </div>
        </div>

    </div>

    <div class="row gx-12">
        <form method="Post" action="#" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group col-12">
                    <label for="example-search-input" class="form-control-label">name</label>

                    <input class="form-control" placeholder="name" name="name" type="text" value="test"
                           id="example-search-input">
                </div>
                <div class="form-group col-12">
                    <label for="example-url-input" class="form-control-label">mobile</label>

                    <input class="form-control" type="text" placeholder="mobile" name="mobile" value="test"
                           id="example-url-input">
                </div>
                <div class="form-group col-12">
                    <label for="example-password-input" class="form-control-label">password <span class="text-primary">If you want to change your password, fill in this field</span></label>
                    <input class="form-control" placeholder="password" type="password" name="password" value="" id="example-password-input">
                </div>
                <div class="form-group col-12">
                    <label for="example-password-input" class="form-control-label">Confirm Password</label>
                    <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" value="" id="example-password-input">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
