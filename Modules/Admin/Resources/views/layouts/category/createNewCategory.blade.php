@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.store.new.category')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="image" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">

                                    <img class="radius" id="output" src="{{$default_image??''}}" width="120"
                                         height="120">
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
                        @if($errors->has('CategoryActions'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('CategoryActions') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->has('CategoryActions.*.action_en_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('CategoryActions.*.action_en_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('CategoryActions.*.action_ar_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('CategoryActions.*.action_ar_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('CategoryActions.*.action_price'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('CategoryActions.*.action_price') }}</span>
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
                                           value="{{old('category_en_name')}}" name="category_en_name" type="text"
                                           id="example-search-input" required>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.category_ar_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.category_ar_name')}}"
                                           type="text" name="category_ar_name"
                                           value="{{old('category_ar_name')}}" id="example-email-input" required>
                                </div>
                            </div>
                            <fieldset class="mt-4">
                                <h4 class=" text-info text-sm  mb-2"> {{trans('admin::admin.Pleas Insert The Actions For This Category')}} </h4>
                                <div class="repeater-default">
                                    <div data-repeater-list="CategoryActions">
                                        <div data-repeater-item="">
                                            <div class="mession-list form-group row d-flex ">
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label for="example-search-input"
                                                               class="form-control-label">{{trans('admin::admin.action_en_name')}}</label>

                                                        <input class="form-control"
                                                               placeholder="{{trans('admin::admin.action_en_name')}}"
                                                               value="{{old('action_en_name')}}"
                                                               name="CategoryActions[0][action_en_name]" type="text"
                                                               id="example-search-input" required>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label for="example-email-input"
                                                               class="form-control-label">{{trans('admin::admin.action_ar_name')}}</label>

                                                        <input class="form-control"
                                                               placeholder="{{trans('admin::admin.action_ar_name')}}"
                                                               type="text" name="CategoryActions[0][action_ar_name]"
                                                               value="{{old('action_ar_name')}}"
                                                               id="example-email-input" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <label for="example-email-input"
                                                               class="form-control-label">{{trans('admin::admin.action_price')}}</label>
                                                        <input class="form-control" min="0.01" step="0.01"
                                                               placeholder="{{trans('admin::admin.action_price')}}"
                                                               type="number"
                                                               name="CategoryActions[0][action_price]"
                                                               value="{{old('action_price')}}"
                                                               id="example-email-input" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2" style="margin-top: 30px">
                                                   <span data-repeater-delete="" data-price="0"
                                                   class="delete-country btn btn-danger btn-md">
                                                    <i class="fas fa-trash  opacity-10"
                                                    aria-hidden="true"></i>
                                                      </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row mt-4">
                                        <div class="col-sm-12">
                                          <span data-repeater-create=""
                                                class="btn btn-success btn-md">
                                             <i class="fas fa-plus  opacity-10" aria-hidden="true"></i>
                                              {{trans('admin::admin.add new Action')}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.create_new_category')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/plugins/repeater/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/repeater/jquery.form-repeater.js')}}"></script>
@stop
