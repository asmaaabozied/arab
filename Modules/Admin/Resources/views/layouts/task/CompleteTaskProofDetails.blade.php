@extends('dashboard::layouts.admin.master')
@section('content')

    <link href="{{asset('assets/css/admin/assets/css/image-view-box.css')}}" rel="stylesheet">

    <div class="row flex-md-row flex-md-row flex-column-reverse">
        <div class="col-xl-7 mt-4 mt-md-0 mt-lg-0">
            <div class="card">
                <div class="row">
                    <div class="card-body ar-text-right ">
                        <h1 class="text-gradient text-primary "><span
                                class="text-lg ms-n1"> {{trans('employer::task.taskProofScreenShot')}} </span></h1>
                        @if($task->proof_request_screenShot !=Null)
                            <h6 class="mb-0 font-weight-bolder"> {{$task->proof_request_screenShot}} </h6>
                        @else
                            <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('employer::task.The employer did not ask any screenShot')}} </h6>
                        @endif

                    </div>
                    <div class="col-12 mx-auto">
                        <h1 class="text-gradient text-center text-primary ">
                            <span class="text-lg  mx-2 ">{{trans('employer::task.proof_screenshot')}}</span>
                        </h1>

                        <div id="carouselExampleIndicators" class="carousel slide m-2" data-bs-ride="carousel">
                            <div class="carousel-inner bg-gradient-secondary  border-radius-2xl">
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
                                            {{trans('employer::task.taskEmployerProfStatus')}} </p>
                                        <h5 class="text-white font-weight-bolder weather-line mb-0">
                                            @if($proof->isEmployerAcceptProof == "NotSeenYet")
                                                {{trans('employer::task.proof_'.$proof->isEmployerAcceptProof)}}
                                            @else
                                                {{trans('employer::task.proof_'.$proof->isEmployerAcceptProof)}} {{$proof->updated_at->diffForHumans()}}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <img class="w-50 " style="border-radius: 18px"
                                         src="{{asset('assets/img/default/proof-'.$proof->isEmployerAcceptProof.'.gif')}}"
                                         alt="Status Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="card {{"prof_".$proof->isAdminAcceptProof}}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8 my-auto">
                                    <div class="numbers">
                                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                                            {{trans('employer::task.taskAdminProfStatus')}} </p>
                                        <h5 class="text-white font-weight-bolder weather-line mb-0">
                                            @if($proof->isAdminAcceptProof == "NotSeenYet")
                                                {{trans('employer::task.proof_'.$proof->isAdminAcceptProof)}}
                                            @else
                                                {{trans('employer::task.proof_'.$proof->isAdminAcceptProof)}} {{$proof->updated_at->diffForHumans()}}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <img class="w-50 " style="border-radius: 18px"
                                         src="{{asset('assets/img/default/proof-'.$proof->isAdminAcceptProof.'.gif')}}"
                                         alt="Status Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-body ar-text-right ">
                            <h1 class="text-gradient text-primary "><span
                                    class="text-lg ms-n1"> {{trans('employer::task.taskProofQuestion')}} </span></h1>
                            @if($task->proof_request_ques !=Null)
                                <h6 class="mb-0 font-weight-bolder"> {{$task->proof_request_ques}} </h6>
                            @else
                                <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('employer::task.The employer did not ask any questions')}} </h6>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-md-4 mt-4 ">
                    <div class="card">
                        <div class="card-body ar-text-right ">
                            <h1 class="text-gradient text-info "><span
                                    class="text-lg ms-n1"> {{trans('employer::task.taskProofAnswer')}} </span></h1>
                            @if($proof->answer_text !=Null)
                                <h6 class="mb-0 font-weight-bolder"> {{$proof->answer_text}} </h6>
                            @else
                                <h6 class="mb-0 text-danger font-weight-bolder"> {{trans('employer::task.The worker did not answer any question')}} </h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row mt-4">
            <div class="button-row ">
                <a href="{{route('admin.show.complete.tasks.proofs',[$task->id,$task->task_number])}}"
                   class="btn bg-gradient-secondary btn-lg w-100 mb-0">{{trans('employer::task.back')}}</a>
            </div>
        </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="row">
        <div id="screenShotModel" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="screenShotImage">
            <div id="caption"></div>
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

    <script>
        $(document).on('click', '#rejectBtn', function () {
            var rejectForm = document.getElementById('rejectForm');
            var rejectBtn = document.getElementById('rejectBtn');
            var CancelReject = document.getElementById('CancelReject');
            rejectForm.classList.remove('d-none');
            rejectBtn.classList.add('d-none');
            CancelReject.classList.remove('d-none');
        });

        $(document).on('click', '#CancelReject', function () {
            var rejectForm = document.getElementById('rejectForm');
            var rejectBtn = document.getElementById('rejectBtn');
            var CancelReject = document.getElementById('CancelReject');
            CancelReject.classList.add('d-none');
            rejectForm.classList.add('d-none');
            rejectForm.classList.add('d-none');
            rejectBtn.classList.remove('d-none');
        });

    </script>
@stop
