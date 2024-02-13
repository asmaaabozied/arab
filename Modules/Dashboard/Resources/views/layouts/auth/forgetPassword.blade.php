@extends('dashboard::layouts.auth.main')
@section('content')
<div class=" col-12  bg-grey outer-div-login" style="padding-bottom:38%">
    <div class="inner-div-login" style="">
                <form action="" method="post">
                    @csrf
                    <div class="row" >
                        <div class="col-md-12 ">
                            <h1 class="text-primary text-center sign_in font_JF">Forget Password </h1>
                        </div>
                        <h3 class="text-center font_aljaz" >أدخل الرمز الذي تلقيته في بريدك الإلكتروني </h3>
                    </div>

                    <div class="input-group mt-4">
                        <input type="text" required name="code" class="form-control input_login borderless p-3" placeholder="الرمز" aria-describedby="helpId">
                    </div>

                      <div class="form-group center_btn mt-4 ">
                        <button class="btn btn-outline p-3"  style="width: 100%; background-color:#EF626C; color:white;">إرسال</button>
                      </div>

                </form>

    </div>
</div>
@endsection
