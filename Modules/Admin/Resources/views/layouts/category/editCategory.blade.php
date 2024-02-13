@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.update.category',$data->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="image" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">
                                    @if($data->image !=null)
                                        <img class="radius" id="output" src="{{Storage::url($data->image)}}" width="120"
                                             height="120">
                                    @else
                                        <img class="radius" id="output" src="{{asset($default_image)}}" width="120"
                                             height="120">
                                    @endif

                                    <figcaption class="personal-figcaption" style="text-align: center">
                                        <img
                                            src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                    </figcaption>
                                </figure>
                            </label>
                        </div>
                        @if($errors->has('image'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('image') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('category_en_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('category_en_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('category_ar_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('category_ar_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.category_en_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.category_en_name')}}"
                                           value="{{$data->title}}" name="category_en_name" type="text"
                                           id="example-search-input" required>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.category_ar_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.category_ar_name')}}"
                                           type="text" name="category_ar_name"
                                           value="{{$data->ar_title}}" id="example-email-input" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.update_category')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
