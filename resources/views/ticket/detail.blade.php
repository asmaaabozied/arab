@extends('dashboard::layouts.employer.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
                <form method="" action="" >

                    <div class="form-group">
                      <label for="">قسم الدعم</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="قسم المهام">
                      <small id="helpId" class="form-text text-primary">في هذا القسم يمكنك التواصل مع فريق الدعم بكل ما يخص المشاكل المتعلقة بالمهام وإنشاؤها والية تنفيذها وعرضها او حتي لطلب إضافة منصة إخري غير موجودة في المنصات الحالية وباقي الموارد المتعلقة بإنشاء المعام وتنفيذها </small>
                    </div>

                    <div class="form-group">
                        <label for="">عنوان التذكرة</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="يرجي كتابة موضوع او عنوان التذكرة">
                    </div>

                    <div class="form-group">
                      <label for="">متن التذكرة</label>
                      <textarea class="form-control" name="" id="" placeholder="يرجي كتابة وصف دقيق لنص التذكرة مع وصف كامل للمشكلة التي تواجهها او للطلب الذي ترغب في تقديمه " rows="3"></textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="">
                            <label for="profile_img">Attach Img</label>
                            <img src="" alt="">
                             <input type="file" class="" name="avatar" style="display: none;" accept="image/*" name="profile_picture" id="profile_img">
                        </div>
                    </div>
                    <button type="submit" class="btn fw-bold" style="color:white; background-color:#4199FF; width:100%">إنشاء تذكرة</button>

                </form>
        </div>
    </div>
</div>

@stop
