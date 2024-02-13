@extends('dashboard::layouts.admin.master')
@section('content')
    <link id="pagestyle" href="{{asset('assets/css/admin/assets/css/avatar-uploade.css')}}" rel="stylesheet"/>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <form class="p-2" action="{{route('admin.create.new.currency')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="personal-image ar-text-right">
                            <label class="label">
                                <input name="icon" type="file" accept="image/*"
                                       onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                <figure class="personal-figure">

                                    <img class="radius" id="output" src="{{asset('assets/img/currency/d-currency.png')}}" width="120"
                                         height="120">
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
                        @if($errors->has('rate'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('rate') }}</span>
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
                        @if($errors->has('en_name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('employer::task.Error!')}}</strong> {{ $errors->first('en_name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{trans('admin::admin.INFO!')}}</strong> {{trans('admin::admin.Make sure the currency symbol is in the list of supported currency symbols before adding it to the currency list')}} <a class="text-dark" href="{{route('admin.supported.currency.codes.index')}}">{{trans('admin::admin.List of supported currencies')}}</a></span>
                        </div>
                    </div>
                    <div class="row gx-4">
                        <div class="col-2"></div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="example-search-input"
                                       class="form-control-label">{{trans('admin::admin.CurrencyEnName')}}</label>

                                <input class="form-control" placeholder="{{trans('admin::admin.CurrencyEnNameExample')}}"
                                       value="{{old('en_name')}}" name="en_name" type="text"
                                       id="example-search-input" required>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="example-search-input"
                                       class="form-control-label">{{trans('admin::admin.CurrencyArName')}}</label>

                                <input class="form-control" placeholder="{{trans('admin::admin.CurrencyArNameExample')}}"
                                       value="{{old('ar_name')}}" name="ar_name" type="text"
                                       id="example-search-input" required>
                            </div>

                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row gx-4">
                        <div class="col-2"></div>
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label for="example-search-input"
                                       class="form-control-label">{{trans('admin::admin.CurrencyRateAgainstDollar')}}</label>

                                <input class="form-control" placeholder="{{trans('admin::admin.CurrencyRateAgainstDollar')}}"
                                       value="{{old('rate')}}" name="rate" type="number"
                                       step="0.01"
                                       min="0.01"
                                       id="example-search-input" required>
                            </div>

                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="text-end">
                        <button type="submit"
                                class="btn bg-gradient-primary w-auto m-4 ">{{trans('admin::admin.CreateNewCurrency')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
