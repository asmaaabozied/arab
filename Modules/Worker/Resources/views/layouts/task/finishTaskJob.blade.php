
@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <form method="POST"
              id="uploadForm"
              action="{{route('worker.task.finish.the.job',[$data->task->id,$data->task->task_number])}}"
              enctype="multipart/form-data">
            @csrf
        <div class="row dashboard">
            <div class="">

                <div class="row">
                    <div class="row col-md-9 col-sm-12 col-xs-10 view-task">
                        <div class="col-md-3 col-sm-6 mt-5">
                            <div class="profits view-task-card">
                                <div class="sub-profits registery">
                                    <div></div>
                                    <img src="{{asset('frontend/assets/img/Ellipse 8 (2).png')}}" class="img-fluid">
                                    <h2>   @lang('site.Category') </h2>
                                    <button class="btn USD "> @lang('site.Improve search results')</button>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 mt-5">
                            <div class="profits view-task-card">
                                <div class="sub-profits registery ">
                                    <img src="{{asset('frontend/assets/img/3d-casual-life-map 1 (2).png')}}" class="img-fluid">
                                    <h2>  @lang('site.Workers country')  </h2>
                                    <button class="btn USD ">@lang('site.All country')</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 mt-5">
                            <div class="profits view-task-card">
                                <div class="sub-profits registery">
                                    <img src="{{asset('frontend/assets/img/Frame 483 (3).png')}}" class="img-fluid">
                                    <h2>   @lang('site.Profit')  </h2>
                                    <button class="btn USD ">{{$data->task->task_cost ?? 0}}</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 mt-5">
                            <div class="profits view-task-card">
                                <div class="sub-profits registery">
                                    <img src="{{asset('frontend/assets/img/Creative team-bro 1 (1).png')}}" class="img-fluid">
                                    <h2>   @lang('site.number')  </h2>
                                    <button class="btn USD ">{{$data->task->total_worker_limit ?? 0}}</button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <div class="card2 dashboard">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 p-4 steps">
                        <h2>@lang('site.Steps')  </h2>
                        <ul>
                            <li>@lang('site.Search on Google for the word Arabs and focus')</li>
                            <li>@lang('site.Open the website')</li>
                            <li>@lang('site.Click on Lessons and Articles')</li>
                            <li>@lang('site.Open the first lesson')</li>
                            <li>@lang('site.Click like and add a positive comment')</li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 full-img">


                    </div>
                </div>

            </div>
            <div class="card2 dashboard">
                <div class="row details-items">
                    <div class="col-md-5 col-sm-12 col-xs-12 p-4 steps">
                        <h2> @lang('site.details')   </h2>
                        <ul >
                            <div class="row col-md-12">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <li class=" "><span>@lang('site.Category')


                                    </li>
                                    <li class=""><span>@lang('site.Last updated')


                                    </li>
                                    <li class=""><span> @lang('site.Profit')


                                    </li>
                                    <li class=""><span>@lang('site.Accomplished workers')

                                    </li>
                                </div>
                                <div class="col-md-6 no-style-item col-sm-6 col-xs-6">
                                    <li>@lang('site.Paid to click')</li>
                                    <li>{{\Carbon\Carbon::parse($data->task->task_end_date)->format('y-m-d')}}</li>
                                    <li>{{$data->task->task_cost ?? 0}}</li>
                                    <li>{{$data->task->approved_workers ?? 0}}</li>
                                </div>
                            </div>
                        </ul>
                    </div>

                </div>

            </div>
            <div class="card2 dashboard">

                <div class="row">
                    <div class="col-12">
                        @if($errors->has('proof_request_ques'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('proof_request_ques') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                </button>
                            </div>
                        @endif
                        @if($errors->has('proof_request_screenShot'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('proof_request_screenShot') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 steps  opioion">
                        <h4 >@lang('site.Have you finished work?')</h4>
                        <p>@lang('site.I submit some works for proof')</p>
                        <div id="fileUpload" class="file-container">
                            <label for="fileUpload-1" class="file-upload">
                                <div>
                                    <i class="material-icons-outlined">cloud_upload</i>
                                    <p>Drag &amp; Drop Files Here</p>
                                    <span>OR</span>
                                    <div>Browse Files</div>
                                </div>
                                <input type="file" id="fileUpload-1" name="screenshot" >
                            </label>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 steps opioion">
                        <p>{{trans('worker::task.ProofAnswer')}}</p>

                     <p>   {{trans('site.Do you avoid humiliating your subordinates in your workplace or anywhere else?')}}                        </p>
                        <div class="form-outline">
                            <textarea placeholder="{{trans('worker::task.PleasEnterProofAnswer')}}" class="form-control" id="textAreaExample1" rows="9" name="answer_text" required></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex flex-row justify-content-center">
                <button class="btn achieve" type="submit">@lang('site.done')  </button>
                <a  href="{{route('worker.browse.task')}}" class="btn tasks-button ">@lang('site.Browse other tasks')</a>
            </div>

        </div>
        </form>
    </div>




@stop

@section('scripts')

    <script src="{{asset('frontend/Plugin/custom-drag-drop-file-upload/fileUpload/fileUpload.js')}}"></script>
@stop
