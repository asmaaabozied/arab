
@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')

    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
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
        <div class="col-12 mt-2">
            <div class="card bg-white">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12 my-auto">
                            <div class="numbers">
                                <p class=" text-center text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                                    {{trans('worker::task.The remaining time to complete the task')}}
                                </p>
                                <h5 id="counter"
                                    class="text-primary text-center font-weight-bolder weather-line mb-0"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="card mt-4 mx-lg-4 mx-sm-0 col-12">
            <div class="card-body p-3">
                <form method="POST"
                      id="uploadForm"
                      action="{{route('worker.task.finish.the.job',[$data->task->id,$data->task->task_number])}}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex">
                        <div class="avatar mx-2 avatar-lg">
                            <img class="" alt="Image placeholder" src="{{asset('assets/img/default/asking.png')}}">
                        </div>
                        <div class="ms-2 my-auto">
                            <h6 class="mb-0">{{trans('worker::task.question_as_worker')}}</h6>
                        </div>
                    </div>
                    @if($data->task->proof_request_ques == null)
                        <p class="mt-3 text-danger"> {{trans('worker::task.not_proof_request_ques')}} </p>
                    @else
                        <p class="mt-3"> {{$data->task->proof_request_ques}}</p>
                    @endif
                    <div class="row mt-3">
                        <div class="col-12 mt-3">
                            <label>{{trans('worker::task.ProofAnswer')}}</label>
                            <textarea data-value="{{old('answer_text')}}" name="answer_text" required
                                      class="multisteps-form__textarea form-control font-elmessiry" rows="3"
                                      placeholder="{{trans('worker::task.PleasEnterProofAnswer')}}"></textarea>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <div class="avatar mx-2 avatar-lg">
                            <img alt="Image placeholder" src="{{asset('assets/img/default/screenshot-2.png')}}">
                        </div>
                        <div class="ms-2 my-auto">
                            <h6 class="mb-0">{{trans('worker::task.screenshot_as_worker')}}</h6>
                        </div>
                    </div>
                    @if($data->task->proof_request_screenShot == null)
                        <p class="mt-3 text-danger"> {{trans('worker::task.not_proof_request_screenShot')}} </p>
                    @else
                        <p class="mt-3">{{$data->task->proof_request_screenShot }}</p>
                    @endif
                    <style>
                        .center {
                            height:100%;
                            display:flex;
                            align-items:center;
                            justify-content:center;

                        }
                        .image-form-input {
                            width:100%;
                            padding:20px;
                            background:#fff;
                            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                            3px 3px 7px rgba(94, 104, 121, 0.377);
                            border-radius: 10px;
                        }
                        .image-form-input input {
                            display:none;

                        }
                        /*.image-form-input label {*/
                        /*    !*display:block;*!*/
                        /*    !*width:100%;*!*/
                        /*    !*height:45px;*!*/
                        /*    !*!*margin-left: 25%;*!*!*/
                        /*    !*line-height:50px;*!*/
                        /*    !*text-align:center;*!*/
                        /*    !*background:#1172c2;*!*/

                        /*    !*color:#fff;*!*/
                        /*    !*font-size:15px;*!*/
                        /*    !*font-family:"Open Sans",sans-serif;*!*/
                        /*    !*text-transform:Uppercase;*!*/
                        /*    !*font-weight:600;*!*/
                        /*    !*border-radius:5px;*!*/
                        /*    !*cursor:pointer;*!*/
                        /*}*/

                        .image-form-input img {
                            width:100%;
                            display:none;

                            margin-bottom:30px;
                        }

                    </style>
                    <div class="row mt-3">
                        <div class="col-12 mt-3">
                            <label>{{trans('worker::task.task_screenshot_proof')}}</label>
{{--                            <div--}}
{{--                                action="/file-upload"--}}
{{--                                class="form-control dropzone dz-clickable"  id="productImg">--}}
{{--                                <div class="dz-default dz-message">--}}
{{--                                    <button class="dz-button"--}}
{{--                                            type="button">{{trans('worker::task.Drop files here to upload')}}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="file" class="" name="screenshot">--}}
                         <br>
                            <div class="center">
                                <div class="image-form-input">
                                    <div class="preview">
                                        <img id="file-ip-1-preview">
                                    </div>
                                    <label class="btn btn-dark btn-lg w-100" for="file-ip-1">{{trans('worker::task.Upload Image')}}</label>
                                  <br>
                                    <input type="file" id="file-ip-1" name="screenshot" accept="image/jpeg, image/jpg, image/png" onchange="showPreview(event);">
                                    <button class="btn btn-danger btn-lg w-100 d-none my-1 " id="remove" onclick="removeImage()" >{{trans('worker::task.Remove Image')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function showPreview(event){
                            if(event.target.files.length > 0){
                                var src = URL.createObjectURL(event.target.files[0]);
                                var preview = document.getElementById("file-ip-1-preview");
                                preview.src = src;
                                preview.style.display = "block";
                                document.getElementById("remove").classList.remove('d-none');
                                document.getElementById("remove").classList.add('d-block');
                            }
                        }
                        function removeImage(){
                            var preview = document.getElementById("file-ip-1-preview");
                            preview.src = "";
                            document.getElementById("remove").classList.remove('d-block');
                            document.getElementById("remove").classList.add('d-none');
                        }
                    </script>
                    <hr class="horizontal dark">
                    <div class="row mt-3">
                        <div class="col-12 mt-3">
                            <label>{{trans('worker::task.ProofDescription')}}</label>
                            <textarea data-value="{{old('description')}}" name="description" required
                                      class="multisteps-form__textarea form-control font-elmessiry" rows="2"
                                      placeholder="{{trans('worker::task.PleasEnterProofDescription')}}"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row mt-4">
                            <div class="button-row  mt-4">
                                <button type="submit"
                                        class="btn btn-primary btn-lg w-100">{{trans('worker::task.finish_task_job')}}</button>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="button-row ">
                                <a href="{{route('worker.tasks.in.active')}}"
                                   class="btn btn-secondary btn-lg w-100   mb-2">{{trans('worker::task.back')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/plugins/dropzone.min.js')}}"></script>



    <script>
        <?php
        $task_end_date = \Carbon\Carbon::parse($data->task->task_end_date)->format('F d, Y H:i:s');
        $dateTime = strtotime($task_end_date);
        $getDateTime = date("F d, Y H:i:s", $dateTime);
        ?>
        var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="counter"11
            document.getElementById("counter").innerHTML =
                days + "{{trans('worker::task.days_remaining')}}" + hours + "{{trans('worker::task.hours_remaining')}}" + minutes + "{{trans('worker::task.minutes_remaining')}}" + seconds + "{{trans('worker::task.seconds_remaining')}}";
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                var now = new Date().getTime();
                // Find the distance between now an the count down date
                var distance = now - countDownDate;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="counter"11
                document.getElementById("counter").innerHTML =
                    "{{trans('worker::task.The time available to finish the task has expired since:')}}" + days + " {{trans('worker::task.days_remaining')}} " + hours + " {{trans('worker::task.hours_remaining')}} " + minutes + " {{trans('worker::task.minutes_remaining')}} " + seconds + " {{trans('worker::task.seconds_remaining')}} ";
            }
        }, 1000);
    </script>
@stop
