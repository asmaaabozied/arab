@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::ticket.support section')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">
            <div class="card">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if($errors->has('section'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('section') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif  @if($errors->has('subject'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('subject') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif  @if($errors->has('description'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('description') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif  @if($errors->has('worker_attached_file'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>{{trans('worker::task.Error!')}}</strong> {{ $errors->first('worker_attached_file') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <form
                method="POST"
                action="{{route('worker.send.ticket')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-body p-3 pt-0">
                        <div class="row">
                            <div class="col-12 my-2">
                                <h6 class="mb-2 ">{{trans('worker::ticket.support section')}}</h6>
                                <select id="section-dropdown"  name="section"
                                        class="form-control "
                                        required>
                                    <option value="">{{trans('worker::ticket.pleas_select_support_section')}}</option>
                                    @if(count($sections) > 0)
                                        @if(app()->getLocale() == "ar")
                                            @foreach($sections as $section)
                                                <option value="{{$section->id}}">{{$section->ar_name}}</option>
                                            @endforeach
                                        @else
                                            @foreach($sections as $section)
                                                <option value="{{$section->id}}">{{$section->en_name}}</option>
                                            @endforeach
                                        @endif
                                    @else
                                        <option>{{trans('worker::ticket.NoSectionFound')}}</option>
                                    @endif

                                </select>
                                <div class="col-12 my-2 d-none " id="section-details-box">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row align-items-center">
                                                <div class="col-12 d-none text-center">
                                                    <img src="{{asset('assets/img/support/Administrative.png')}}" alt="" width="100">
                                                </div>
                                                <hr class="d-none">
                                                <div class="col-12 text-center">
                                                    <div class="numbers mx-3">
                                                        <h5 class="font-weight-bolder text-primary mb-0">
                                                            <span id="section-details"
                                                                  class="text-md-center"></span>
                                                        </h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-2 ">
                                <h6 class="mb-2 ">{{trans('worker::ticket.TicketSubject')}}</h6>
                                <input name="subject" value="{{old('subject')}}" required
                                       class=" form-control font-elmessiry"
                                       placeholder="{{trans('worker::ticket.PleasEnterTicketSubject')}}">

                            </div>
                            <div class="col-12 my-2">
                                <h6 class="mb-2">{{trans('worker::ticket.TicketDescription')}}</h6>
                                <textarea name="description" required
                                          class="multisteps-form__textarea form-control font-elmessiry" rows="3"
                                          placeholder="{{trans('worker::ticket.PleasEnterTicketDescription')}}">{{old('description')}}</textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <h6 class=" text-center">{{trans('worker::ticket.TicketAttachedFiles')}}</h6>
                                <style>
                                    .center {
                                        height: 100%;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;

                                    }

                                    .image-form-input {
                                        width: 100%;
                                        padding: 20px;
                                        background: #fff;
                                        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                                        3px 3px 7px rgba(94, 104, 121, 0.377);
                                        border-radius: 10px;
                                    }

                                    .image-form-input input {
                                        display: none;

                                    }
                                    .image-form-input img {
                                        width: 100%;
                                        display: none;

                                        margin-bottom: 30px;
                                    }

                                </style>
                                <div class="row ">
                                    <div class="col-12 mt-3">
                                        <div class="center">
                                            <div class="image-form-input">
                                                <div class="preview">
                                                    <img id="file-ip-1-preview">
                                                </div>
                                                <label class="btn btn-dark btn-lg w-100"
                                                       for="file-ip-1">{{trans('worker::ticket.Upload Attached File')}}</label>
                                                <input type="file" id="file-ip-1" name="worker_attached_file"
                                                       accept="image/jpeg, image/jpg, image/png"
                                                       onchange="showPreview(event);">
                                                <button class="btn btn-danger btn-lg w-100 d-none  my-2" id="remove"
                                                        onclick="removeImage()">{{trans('worker::ticket.Remove Attached File')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function showPreview(event) {
                                        if (event.target.files.length > 0) {
                                            var src = URL.createObjectURL(event.target.files[0]);
                                            var preview = document.getElementById("file-ip-1-preview");
                                            preview.src = src;
                                            preview.style.display = "block";
                                            document.getElementById("remove").classList.remove('d-none');
                                            document.getElementById("remove").classList.add('d-block');
                                        }
                                    }

                                    function removeImage() {
                                        var preview = document.getElementById("file-ip-1-preview");
                                        preview.src = "";
                                        document.getElementById("remove").classList.remove('d-block');
                                        document.getElementById("remove").classList.add('d-none');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-row ">
                    <button type="submit"
                            class="btn btn-primary btn-lg w-100   mb-2">{{trans('worker::ticket.createTicket')}}</button>
                </div>

            </form>
        </div>
    </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--fetch section details by select section-->
    <script>
        $(document).ready(function () {
            $('#section-dropdown').on('change', function () {
                var idSection = this.value;
                $("#section-details").html('');
                $.ajax({
                    url: "{{route('worker.fetch.section.details.when.create.ticket')}}",
                    type: "POST",
                    data: {
                        section_id: idSection,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        document.getElementById('section-details-box').classList.remove('d-none');
                        @if(app()->getLocale() =="ar")
                        document.getElementById("section-details").innerHTML = result.ar_description;
                        @else
                        document.getElementById("section-details").innerHTML = result.en_description;
                        @endif
                    }
                });
            });
        });
    </script>
@stop
