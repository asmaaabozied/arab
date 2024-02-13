@extends('dashboard::layouts.admin.master')
@section('content')
{{--    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>--}}

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="d-flex px-2 py-2">
                    <div>
                        @if(isset($data->country->flag))
                            <img src="{{Storage::url($data->country->flag)}}"
                                 class="avatar avatar-lg me-3 mx-2" alt="avatar">
                        @else
                            <img src="{{asset('assets/img/flag/flag.svg')}}"
                                 class="avatar avatar-lg me-3 mx-2" alt="user1">
                        @endif

                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-lg">{{$data->country->name}}</h6>
                        <p class="text-md text-primary mb-0">{{$data->country->ar_name}}</p>
                    </div>
                </div>
                <form class="p-2" action="{{route('admin.update.city.of.country',$data->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        @if($errors->has('name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('ar_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('ar_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            @if($errors->has('min_city_cost'))

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('min_city_cost') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.city_en_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.city_en_name')}}"
                                           value="{{$data->name}}" name="name" type="text"
                                           id="example-search-input">
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.city_ar_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.city_ar_name')}}"
                                           type="text" name="ar_name"
                                           value="{{$data->ar_name}}" id="example-email-input">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.min_city_cost')}}</label>
                                    <input class="form-control" min="0.01" step="0.01"
                                           placeholder="{{trans('admin::admin.min_city_cost')}}" type="number"
                                           name="min_city_cost"
                                           value="{{$data->min_city_cost}}" id="example-email-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" d-lg-flex d-md-flex justify-content-between">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto">{{trans('admin::admin.update_city')}}</button>
                        <a href="{{route('admin.show.cities.of.country',$data->country_id)}}" class="btn bg-gradient-secondary w-auto">{{trans('admin::admin.back')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
