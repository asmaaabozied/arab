@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.update.country',$data->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="flag" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">
                                    @if($data->flag !=null)
                                        <img class="radius" id="output" src="{{Storage::url($data->flag)}}" width="120"
                                             height="120">
                                    @else
                                        <img class="radius" id="output" src="{{asset($default_flag)}}" width="120"
                                             height="120">
                                    @endif

                                    <figcaption class="personal-figcaption" style="text-align: center">
                                        <img
                                            src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                    </figcaption>
                                </figure>
                            </label>
                        </div>
                        @if($errors->has('flag'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('flag') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('country_en_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('country_en_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('country_ar_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('country_ar_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('calling_code'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('calling_code') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('is_arabic'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('is_arabic') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.country_en_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.country_en_name')}}"
                                           value="{{$data->name}}" name="country_en_name" type="text"
                                           id="example-search-input">
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.country_ar_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.country_ar_name')}}"
                                           type="text" name="country_ar_name"
                                           value="{{$data->ar_name}}" id="example-email-input">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.calling_code')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.calling_code_ex')}}"
                                           type="text" name="calling_code"
                                           value="{{$data->calling_code}}" id="example-email-input">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.arabic_country?')}}</label>
                                    <div class="d-flex justify-content-around py-1 action-border-radius">
                                        <div class="form-check form-switch my-auto mx-2">
                                            @if($data->is_arabic == "true")
                                            <input
                                                class="form-check-input features" name="is_arabic"
                                                type="checkbox" id="" checked>
                                            @else
                                                <input
                                                    class="form-check-input features" name="is_arabic"
                                                    type="checkbox" id="">
                                            @endif
                                        </div>
                                        <div class=" mx-auto action-border-radius-details">
                                            <div class="h-100"><h5 class="mb-0">{{trans('admin::admin.is_arabic_country')}}</h5></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" d-lg-flex d-md-flex justify-content-between">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto">{{trans('admin::admin.update_country')}}</button>
                        <a href="{{route('admin.countries.index')}}" class="btn bg-gradient-secondary w-auto  ">{{trans('admin::admin.back')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
