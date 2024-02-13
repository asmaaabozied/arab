@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')



            <link href="{{asset('assets/css/panel/image-view-box.css')}}" rel="stylesheet">
            <div class="col-lg-9 col-sm-12 ">

                <div class="row dashboard">
                    <div class="card">

    <div class="row flex-md-row flex-md-row flex-column-reverse">
        <div class="col-xl-7 mt-4 mt-md-0 mt-lg-0">
            <div class="card">
                <div class="row">
                    <div class="card-body ar-text-right ">
                        <h1 class="text-gradient text-primary "><span
                                class="text-lg ms-n1"> {{trans('worker::task.taskProofScreenShot')}} </span></h1>
                        @if($data->task->proof_request_screenShot !=Null)
                            <h6 class="mb-0 font-weight-bolder"> {{$data->task->proof_request_screenShot}} </h6>
                        @else
                            <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('worker::task.The employer did not ask any screenShot')}} </h6>
                        @endif

                    </div>
                    <div class="col-12 mx-auto">
                        <h1 class="text-gradient text-center text-primary ">
                            <span class="text-lg  mx-2 ">{{trans('worker::task.proof_screenshot')}}</span>
                        </h1>

                        <div id="carouselExampleIndicators" class="carousel slide m-2" data-bs-ride="carousel">
                            <div class="carousel-inner bg-gradient-secondary  border-radius-2xl" >
                                <div class="carousel-item active">
                                    @if($proof->screenshot != Null)
                                        <img id="proofScreenshot" alt="Task Proof Screenshot"
                                             src="{{Storage::url($proof->screenshot)}}"
                                             class="d-block w-100 p-2" style="border-radius: 30px">
                                    @else
                                        <img id="proofScreenshot" alt="Default Screenshot"
                                             src="{{asset('assets/img/default/default-Screenshot.svg')}}"
                                             class="d-block w-100 p-2" style="border-radius: 30px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card {{"prof_".$proof->isEmployerAcceptProof}}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8 my-auto">
                                    <div class="numbers">
                                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                                            {{trans('worker::task.taskEmployerProfStatus')}} </p>
                                        <h5 class="text-white font-weight-bolder weather-line mb-0">
                                            @if($proof->isEmployerAcceptProof == "NotSeenYet")
                                            {{trans('worker::task.'.$proof->isEmployerAcceptProof)}}
                                            @else
                                                {{trans('worker::task.'.$proof->isEmployerAcceptProof)}} {{$proof->updated_at->diffForHumans()}}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-start">
                                    <img class="w-50 " style="border-radius: 18px"
                                         src="{{asset('assets/img/default/proof-'.$proof->isEmployerAcceptProof.'.gif')}}"
                                         alt="Status Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-12 mt-2">--}}
{{--                    <div class="card {{"prof_".$proof->isAdminAcceptProof}}">--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-8 my-auto">--}}
{{--                                    <div class="numbers">--}}
{{--                                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">--}}
{{--                                            {{trans('worker::task.taskAdminProfStatus')}} </p>--}}
{{--                                        <h5 class="text-white font-weight-bolder weather-line mb-0">--}}
{{--                                            @if($proof->isAdminAcceptProof == "NotSeenYet")--}}
{{--                                                {{trans('worker::task.'.$proof->isAdminAcceptProof)}}--}}
{{--                                            @else--}}
{{--                                                {{trans('worker::task.'.$proof->isAdminAcceptProof)}} {{$proof->updated_at->diffForHumans()}}--}}
{{--                                            @endif--}}
{{--                                        </h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-4 text-end">--}}
{{--                                    <img class="w-50 " style="border-radius: 18px"--}}
{{--                                         src="{{asset('assets/img/default/proof-'.$proof->isAdminAcceptProof.'.gif')}}"--}}
{{--                                         alt="Status Icon">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="row mt-2">
                <div class="col-md-6 mt-md-2 mt-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> <span class="text-lg ms-n2"> {{trans('worker::task.category')}}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">
                                @if(app()->getLocale() == "ar")
                                    {{$data->task->category->ar_title}}
                                @else
                                    {{$data->task->category->title}}
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-2 mt-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span class="text-lg ms-n2"> {{trans('worker::task.Task_number')}}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">{{$data->task->task_number}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-md-2 mt-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> <span class="text-lg ms-n2"> {{trans('worker::task.task_total_cost')}}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">
                                {{ number_format(convertCurrency($data->task->task_cost, auth()->user()->current_currency),1) }}
                                <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-2 mt-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> <span class="text-lg ms-n2"> {{trans('worker::task.cost_per_worker')}}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">
                                {{ number_format(convertCurrency($data->task->cost_per_worker, auth()->user()->current_currency),1) }}
                                <span class="text-xxs">{{auth()->user()->current_currency}}</span>
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-md-2 mt-2">
                    <div class="card">
                        <div class="card-body ar-text-right ">
                            <h1 class="text-gradient text-primary "><span
                                    class="text-lg ms-n1"> {{trans('worker::task.taskProofQuestion')}} </span></h1>
                            @if($data->task->proof_request_ques !=Null)
                                <h6 class="mb-0 font-weight-bolder"> {{$data->task->proof_request_ques}} </h6>
                            @else
                                <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('worker::task.The employer did not ask any questions')}} </h6>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-md-2 mt-2 ">
                    <div class="card">
                        <div class="card-body ar-text-right ">
                            <h1 class="text-gradient text-primary "><span
                                    class="text-lg ms-n1"> {{trans('worker::task.taskProofAnswer')}} </span></h1>
                            @if($proof->answer_text !=Null)
                                <h6 class="mb-0 font-weight-bolder"> {{$proof->answer_text}} </h6>
                            @else
                                <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('worker::task.The worker did not answer any question')}} </h6>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-12 mt-md-4 mt-4">

            <div class="text-center">
                <a href="{{route('worker.tasks.in.complete')}}"
                   class="btn btn btn-secondary w-100 btn-lg  mb-0">{{trans('worker::task.back')}}</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div id="screenShotModel" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="screenShotImage">
            <div id="caption"></div>
        </div>
    </div>
                    </div>
                </div>
            </div>

    <script>
        // Get the modal
        var modal = document.getElementById("screenShotModel");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("proofScreenshot");
        var modalImg = document.getElementById("screenShotImage");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>
@stop
