@extends('dashboard::layouts.auth.main')
@section('content')
    <div class=" row  bg-white p-5">
        <div class="col-12 mb-3">
            <h1 class="purple-text text-center sign_in font_JF">{{trans('dashboard::auth.Pleas Select Auth Type')}} </h1>
        </div>
        <div class="inner-div-login col-lg-6 col-md-6 col-12 mt-lg-4">
            <form action="{{route('set.auth.google.type',['employer',$google_id])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="text-primary text-center sign_in font_JF">{{trans('dashboard::auth.Employer')}}</h1>
                    </div>

                </div>
                <div class="employer-auth-type-border">
                    <div class="input-group pt-3 justify-content-center">
                        <img src="{{asset('assets/img/default/employer-avatar.svg')}}" alt="" width="250">
                    </div>
                    <div class="col-md-12 ">
                        <h5 class="text-primary text-center sign_in font_JF">
                            {{trans('dashboard::auth.employerAuthTypeDescription')}}
                        </h5>
                    </div>

                </div>

                <div class="form-group center_btn mt-4 ">
                    <button type="submit" class="btn btn-outline p-3 bg-primary w-100 text-white">{{trans('dashboard::auth.authByEmployerType')}}</button>
                </div>

            </form>

        </div>
        <div class="inner-div-login col-lg-6 col-md-6 col-12 mt-lg-4">
            <form action="{{route('set.auth.google.type',['worker',$google_id])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 ">
                        <h1 class="text-success text-center sign_in font_JF">{{trans('dashboard::auth.Worker')}}</h1>
                    </div>
                </div>
                <div class="worker-auth-type-border">
                    <div class="input-group pt-3 justify-content-center">
                        <img src="{{asset('assets/img/default/worker-avatar.svg')}}" alt="" width="250">
                    </div>
                    <div class="col-md-12 ">
                        <h5 class="text-success text-center sign_in font_JF"> {{trans('dashboard::auth.workerAuthTypeDescription')}}</h5>
                    </div>
                </div>
                <div class="form-group center_btn mt-4 ">
                    <button type="submit" class="btn btn-outline p-3 bg-success w-100 text-white">{{trans('dashboard::auth.authByWorkerType')}}</button>
                </div>

            </form>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function onPageLoad() {
            const Toast = Swal.mixin({
                toast: true,
                @if(app()->getLocale() == "ar")
                position: 'top-start',
                @else
                position: 'top-end',
                @endif
                showConfirmButton: false,
                timer: 6000,
                width:600,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            $(document).ready(function () {
                Toast.fire({
                    icon: 'success',
                    title: '{{trans('dashboard::auth.You have successfully signed up using your Google account, one step remains, which is to choose the type of membership you want to subscribe to on the ArabWorkers platform')}}',
                });
            });

        }
        window.onload = onPageLoad;
    </script>
@endsection
