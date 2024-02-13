@extends('dashboard::layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.store.new.discountCode')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        @if($errors->has('code'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('code') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('type'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('type') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('max_uses'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('max_uses') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('discount_amount'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('discount_amount') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('starts_at'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('starts_at') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('expires_at'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('expires_at') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('description'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('description') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="row gx-4">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.DiscountCodeType')}}</label>
                                    <select name="type"
                                            class="  form-control "
                                            required>
                                        <option value="">{{trans('admin::admin.PleasSelectTypeOfDiscountCode')}}</option>
                                        <option value="MainCosts">MainCosts</option>
                                        <option value="AdditionalCosts">AdditionalCosts</option>
                                        <option value="TotalCosts">TotalCosts</option>
                                        <option value="PayCosts">PayCosts</option>


                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-search-input"
                                           class="form-control-label">{{trans('admin::admin.discountCode')}}</label>

                                    <input class="form-control" placeholder="{{trans('admin::admin.discountCode')}}"
                                           value="{{old('code')}}" name="code" type="text"
                                           id="example-search-input" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.discount_amount')}}</label>
                                    <input class="form-control" min="0.01" step="0.01"
                                           placeholder="{{trans('admin::admin.discount_amount')}}" type="number"
                                           name="discount_amount"
                                           value="{{old('discount_amount')}}" id="example-email-input" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.max_uses')}}</label>
                                    <input class="form-control" min="1" step="1"
                                           placeholder="{{trans('admin::admin.max_uses')}}" type="number"
                                           name="max_uses"
                                           value="{{old('max_uses')}}" id="example-email-input" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.starts_at')}}</label>
                                    <input class="form-control" min="1" step="1"
                                           placeholder="{{trans('admin::admin.starts_at')}}" type="datetime-local"
                                           name="starts_at"
                                           value="{{old('starts_at')}}" id="example-email-input" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.expires_at')}}</label>
                                    <input class="form-control" min="1" step="1"
                                           placeholder="{{trans('admin::admin.expires_at')}}" type="datetime-local"
                                           name="expires_at"
                                           value="{{old('expires_at')}}" id="example-email-input" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="example-email-input"
                                           class="form-control-label">{{trans('admin::admin.DiscountCodeDescription')}}</label>
                                    <input class="form-control" min="1" step="1"
                                           placeholder="{{trans('admin::admin.DiscountCodeDescription')}}" type="text"
                                           name="description"
                                           value="{{old('description')}}" id="example-email-input" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" d-lg-flex d-md-flex justify-content-between">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto">{{trans('admin::admin.create_new_discountCodes')}}</button>
                        <a href="{{route('admin.discountCodes.index')}}"
                           class="btn bg-gradient-secondary w-auto">{{trans('admin::admin.back')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
