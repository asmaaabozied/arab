@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.update.privilege',$data->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        @if($errors->has('countOfPrivileges'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('countOfPrivileges') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.privilege_en_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.privilege_en_name')}}"
                                           value="{{$data->title}}" name="privilege_en_name" type="text"
                                           id="example-search-input" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.privilege_ar_name')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.privilege_ar_name')}}"
                                           value="{{trans('privilege::privilege.'.$data->title)}}" name="privilege_ar_name" type="text"
                                           id="example-search-input" disabled>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.privilege_for_account')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.privilege_for_account')}}"
                                           value="@if($data->for == "employer"){{trans('admin::admin.employer')}} @elseif($data->for == "worker"){{trans('admin::admin.worker')}}@else{{trans('admin::admin.WorkerAndEmployer')}}@endif" name="countOfPrivileges" type="text"
                                            disabled
                                           id="example-search-input" >
                                </div>
                                <div class="form-group">
                                    @if($data->type == "plus")
                                    <label for="example-search-input"  class="text-success form-control-label">

                                          {{trans('admin::admin.countOfPrivilegesMustBeAdded')}}
                                    </label>
                                    @else
                                        <label for="example-search-input"  class="text-danger form-control-label">

                                            {{trans('admin::admin.countOfPrivilegesMustBeMinuted')}}
                                        </label>


                                    @endif

                                    <input class="form-control" placeholder="{{trans('admin::admin.countOfPrivileges')}}"
                                           value="{{$data->privileges}}" name="countOfPrivileges" type="number"
                                           min="1"
                                           id="example-search-input" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.update_privilege')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
