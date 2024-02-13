@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.update.addon',$data->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="icon" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">
                                    @if($data->icon !=null)
                                        <img class="radius" id="output" src="{{Storage::url($data->icon)}}" width="120"
                                             height="120">
                                    @else
                                        <img class="radius" id="output" src="{{asset($default_icon)}}" width="120"
                                             height="120">
                                    @endif

                                    <figcaption class="personal-figcaption" style="text-align: center">
                                        <img
                                            src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                    </figcaption>
                                </figure>
                            </label>
                        </div>
                        @if($errors->has('icon'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('icon') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('fees'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('fees') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    </div>
                        <div class="row gx-4">
                            <div class="col-2"></div>
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.addonFees')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.addonFees')}}"
                                           value="{{$data->fees}}" name="fees" type="text"
                                           id="example-search-input" required>
                                </div>

                            </div>
                            <div class="col-2"></div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.update_addon')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
