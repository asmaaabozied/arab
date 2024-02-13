@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('style')


    <link rel="stylesheet" href="{{asset('assets/Dashboard/assets/css/icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/Dashboard/assets/css/tailwind.css')}}"/>
    <link href="{{ asset('assets/Dashboard/assets/libs/choices.js/public/assets/styles/choices.min.css')}}"
          rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('assets/Dashboard/assets/libs/alertifyjs/build/css/alertify.min.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('assets/Dashboard/assets/libs/alertifyjs/build/css/themes/default.min.css') }}"/>

@endsection
@section('content')


    @php
        $fields = ['category_id', 'title', 'description', 'TaskWorkflow', 'TaskWorkflow.*.Workflow', 'total_worker_limit', 'task_end_date', 'TaskRegion', 'TaskRegion.*.Country', 'TaskRegion.*.City', 'proof_request_ques', 'proof_request_screenShot', 'special_access', 'only_professional', 'daily_limit'];
    @endphp


    <div class="col-lg-7 dashboard col-sm-12 ">
        <div class="col-lg-12 col-sm-12 d-flex flex-row category">
            <label> {{trans('employer::task.pleas_select_type_of_category')}} </label>
            <select class="form-select" aria-label="Default select example">
                <option selected>@lang('site.select')</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">
                        @if (app()->getLocale() == 'ar')
                            {{ $category->ar_title }}
                        @else
                            {{ $category->title }}
                        @endif</option>

                @endforeach
            </select>


        </div>
        <div class="col-lg-12 col-sm-12 mt-4">
            <div class="row">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)

                        <div class="col-lg-3 col-sm-6 addtaskdetails">
                            <div class="card select_category">
                                <img class="card-img-top "
                                     src="{{ Storage::url($category->image) }}"

                                     onerror="this.src='{{asset('frontend/assets/img/317746_facebook_social media_social_icon.png')}}'"
                                     alt="Card image cap">
                                <div class="">
                                    <h5 class="Title">
                                        @if (app()->getLocale() == 'ar')
                                            {{$category->ar_title ?? ''}}
                                        @else
                                            {{$category->title ?? ''}}
                                        @endif
                                    </h5>
                                    <p class="card-text">

                                        {!! html_entity_decode(substr($category->description, 0, 125)) !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
        <div class="col-lg-12 col-sm-12 react">

            <h5 class="Title mt-4">التفاعل المطلوب </h5>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">


                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>


                        <div class="d-flex flex-row mt-3 justify-content-between ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>

                        <div class="d-flex flex-row justify-content-between mt-3 ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row mt-3 justify-content-between ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row justify-content-between mt-3 ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row justify-content-between mt-3">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row justify-content-between mt-3 ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row justify-content-between mt-3 ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
                    <div class="card">
                        <label class="d-flex flex-row  justify-content-between ">
                            <span> علي محرك بحث
                             </span>
                            <input type="radio" name="survey" id="Radios1">
                        </label>
                        <div class="d-flex flex-row justify-content-betwee mt-3 ">
                            <p>4.5$</p>
                            <i class="material-icons">؟
                            </i>

                        </div>
                        <div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 mt-3 ">

            <div class="card mession-div">
                <div class="row ">

                    <div class="col col-lg-8 col-md-8 col-sm-12 mession addTaskMession">
                        <h5 class="Title">تفاصيل المهمة </h5>
                        <img src="../assets/img/youtubbg.jpg" class="img-fluid youtub-img">
                        <div class="form-group   mt-3 ">
                            <label for="mession" class="ccontrol-label">عنوان المهمة </label>
                            <input class="form-control " type="text" id="mession">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="mession" class="ccontrol-label">وصف المهمة </label>
                            <input class="form-control  " type="text" id="mession">
                        </div>


                        <div class="form-group   mt-3  ">
                            <fieldset>
                            <label for="mession"
                                   class="ccontrol-label "> {{ trans('employer::task.TaskCountry') }} </label>

                            <div class="repeater-default">
                                <div data-repeater-list="TaskRegion">
                                    <div id="test_repeater" data-repeater-item="">
                            <div class="row m-2 mession-list">
                                <div class=" col-lg-6 col-sm-6 mession-list">
                                    <select class="form-select country_repeater" aria-label="Default select example"
                                            name="TaskRegion[0][Country]">
                                        <option selected> {{ trans('employer::task.TaskCountry') }}</option>
                                        @if(count($countries) > 0)
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ app()->getLocale() == 'ar' ? $country->ar_name : $country->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option>{{ trans('employer::task.NoCountryFound') }}</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-6 mession-list">
                                    <select class="form-select city_repeater" aria-label="Default select example"
                                            name="TaskRegion[0][City]">
                                        <option selected> {{ trans('employer::task.TaskCity') }}</option>
                                        <option value="null">
                                            {{ trans('employer::task.pleas_select_country_to_fetch_cities') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>
                            {{--                       --}}
                            <div class="d-flex flex-row">
{{--                                <button data-repeater-create="" type="button"--}}
{{--                                        class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i--}}
{{--                                        class="fas fa-plus opacity-10" aria-hidden="true"></i>--}}
{{--                                    {{ trans('employer::task.add new countryAndCity') }}</button>--}}
                                <i class="material-icons" style="font-size:24px">add_circle_outline</i>
                                <span>   <button data-repeater-create="" type="button"> {{ trans('employer::task.add new countryAndCity') }}</button></span>
                            </div>
                            </fieldset>
{{--                            <div class="form-group  mt-3">--}}
{{--                                <label for="mession" class="ccontrol-label">مراحل المهمة </label>--}}
{{--                                <input class="form-control  " type="text" id="mession">--}}
{{--                            </div>--}}
{{--                            <div class="d-flex flex-row">--}}
{{--                                <i class="material-icons" style="font-size:24px">add_circle_outline</i>--}}
{{--                                <span>اضافة مكان اخر </span>--}}

{{--                            <fieldset>--}}
{{--                                <div class="form-group  mt-3">--}}

{{--                                <label>{{ trans('employer::task.the task workflow') }}</label>--}}
{{--                                <div class="repeater-default">--}}
{{--                                    <div data-repeater-list="TaskWorkflow">--}}
{{--                                        <div data-repeater-item="">--}}
{{--                                            <div class="flex mb-2">--}}
{{--                                                <div class="flex-1">--}}
{{--                                                    <textarea id="TaskTextWorkflow" required name="TaskWorkflow[0][Workflow]" id="TaskDescription" required--}}
{{--                                                              class="border-gray-100 block w-full mt-2 px-3 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30"--}}
{{--                                                              rows="2" placeholder="{{ trans('employer::task.workflow placeholder') }}">{{ old('TaskWorkflow[0][Workflow]') }}</textarea>--}}
{{--                                                </div>--}}

{{--                                                <div class="flex-none px-3 py-2">--}}
{{--                                                    <span data-repeater-delete="" class="btn btn-danger btn-md">--}}
{{--                                                        <i class="fas fa-trash opacity-10" aria-hidden="true"></i>--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                    <div class="form-group mb-0 flex">--}}
{{--                                        <div class="flex w-full justify-center">--}}
{{--                                            <button data-repeater-create="" type="button"--}}
{{--                                                    class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i--}}
{{--                                                    class="fas fa-plus opacity-10" aria-hidden="true"></i>--}}
{{--                                                {{ trans('employer::task.add new workflow') }}</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </fieldset>--}}
{{--                            <div class="mb-4">--}}

{{--                                <label>{{ trans('employer::task.the task workflow') }}</label>--}}
{{--                                <fieldset>--}}
{{--                                    <div class="repeater-default">--}}
{{--                                        <div data-repeater-list="TaskWorkflow">--}}
{{--                                            <div data-repeater-item="">--}}
{{--                                                <div class="flex mb-2">--}}
{{--                                                    <div class="flex-1">--}}
{{--                                                    <textarea id="TaskTextWorkflow" required name="TaskWorkflow[0][Workflow]" id="TaskDescription" required--}}
{{--                                                              class="border-gray-100 block w-full mt-2 px-3 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30"--}}
{{--                                                              rows="2" placeholder="{{ trans('employer::task.workflow placeholder') }}">{{ old('TaskWorkflow[0][Workflow]') }}</textarea>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="flex-none px-3 py-2">--}}
{{--                                                    <span data-repeater-delete="" class="btn btn-danger btn-md">--}}
{{--                                                        <i class="fas fa-trash opacity-10" aria-hidden="true"></i>--}}
{{--                                                    </span>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="flex w-full justify-center">--}}
{{--                                                        <button data-repeater-create="" type="button" class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i class="fas fa-plus opacity-10" aria-hidden="true"></i>--}}
{{--                                                            إضافة مرحلة جديدة</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </fieldset>--}}
{{--                                <button class="btn btn--primary js-repeater__add" data-repeater-create="" type="button">Add More</button>--}}

{{--                                <div class="form-group mb-0 flex">--}}
{{--                                    <div class="flex w-full justify-center">--}}
{{--                                        <button data-repeater-create="" type="button"--}}
{{--                                                class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i--}}
{{--                                                class="fas fa-plus opacity-10" aria-hidden="true"></i>--}}
{{--                                            {{ trans('employer::task.add new workflow') }}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}



{{--                            </div>--}}

{{--                            <div class="js-repeater" data-repeater-input-name="user[n]">--}}
{{--                                <div class="js-repeater__list">--}}
{{--                                    <fieldset class="js-repeater__item">--}}
{{--                                        <div>--}}
{{--                                            <label for="user[0][name]">Name</label>--}}
{{--                                            <input type="text" name="user[0][name]" id="user[0][name]">--}}
{{--                                        </div>--}}

{{--                                        <div>--}}
{{--                                            <label for="user[0][email]">Email</label>--}}
{{--                                            <input type="email" name="user[0][email]" id="user[0][email]" data-default="myemail@mail.com">--}}
{{--                                        </div>--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}

{{--                                <button class="btn btn--primary js-repeater__add" type="button">Add More</button>--}}
{{--                            </div>--}}

                            <div class="mb-4">
                                <fieldset>
                                    <label>{{trans('employer::task.the task workflow')}}</label>
                                    <div class="repeater-default">
                                        <div data-repeater-list="TaskWorkflow">
                                            <div data-repeater-item="">
                                                <div class="flex mb-2">
                                                    <div class="flex-1">
                                                        <textarea id="TaskTextWorkflow" required name="TaskWorkflow[0][Workflow]" id="TaskDescription" required class="border-gray-100 block w-full mt-2 px-3 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30" rows="2" placeholder="{{trans('employer::task.workflow placeholder')}}">{{old('TaskWorkflow[0][Workflow]')}}</textarea>
                                                    </div>

                                                    <div class="flex-none px-3 py-2">
                                                <span data-repeater-delete="" class="btn btn-danger btn-md">
                                                    <i class="fas fa-trash opacity-10" aria-hidden="true"></i>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 flex">
                                            <div class="flex w-full justify-center">
                                                <button data-repeater-create="" type="button" class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i class="fas fa-plus opacity-10" aria-hidden="true"></i> {{trans('employer::task.add new workflow')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="form-group  mt-3">
                                <label for="mession" class="ccontrol-label">عدد العمال </label>
                                <input class="form-control  " type="text" id="mession">
                            </div>
                            <div class="form-group  mt-3">
                                <label for="mession" class="ccontrol-label"> تاريخ انهاء المهمة </label>
                                <input class="form-control  " type="date" id="mession">
                            </div>
                            <h6 class="Title mt-2 ">دليل انجاز المهمة </h6>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="survey" id="Radios1" value="Yes">
                                        لقطة شاشة
                                    </label>
                                    <input type="text" class="form-control"
                                           placeholder="تفاصيل لقطة الشاشة      $ 0.00                 ">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="survey" id="Radios1" value="Yes">
                                        طرح سؤال
                                    </label>
                                    <input type="text" class="form-control">
                                </div>

                            </div>
                            <div>
                                <h4 class="Title mt-2">المميزات الاضافية </h4>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="survey" id="Radios1">
                                            <span>مهمة مثبتة في الاعلي  </span>
                                            <br>
                                            مهمة مثبتة في اعلي الصفحة
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">13.00 $</p>
                                    </div>

                                </div>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="survey" id="Radios1">
                                            <span>   عرض المهمة علي العمال    </span>
                                            <br>
                                            تقدي المهمة ان تستهدف الاشخاص المحترفين
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">1.00 $</p>
                                    </div>

                                </div>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="survey" id="Radios1">
                                            <span>الحد القص لعدد العمال  </span>
                                            <br>
                                            الحد القص لعدد العمال الذين سعملون
                                        </label>
                                    </div>
                                    <div>
                                        <input type="number" class="form-control" style="width:50%">
                                    </div>
                                    <div>
                                        <p class="m-auto">13.00 $</p>
                                    </div>

                                </div>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="survey" id="Radios1">
                                            <span>      ظهور عشوائي     </span>
                                            <br>
                                            ظهور و اختفاء المهمة عشووائيا من صفحة
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">10.00 $</p>
                                    </div>

                                </div>
                                <div class="d-flex flex-row justify-content-between mt-3">
                                    <div>
                                        <h4 class="Title">اجمالي التكلفة </h4>
                                    </div>
                                    <div>
                                        <p>250.00$</p>
                                    </div>

                                </div>
                                <div class="d-flex flex-row justify-content-around addtional-button">
                                    <div>
                                        <button class="btn btn-delete">الغاء</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-create">انشاء</button>
                                    </div>
                                </div>
                            </div>

                        </div>


                        </form>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12  youtub-bg ">
                        <div class=" row">
                            <div class="d-flex flex-row justify-content-between youtube-data">
                                <h2>YouTube</h2>
                                <img src="{{asset('frontend/assets/img/1298778_youtube_play_video_icon.png')}}"
                                     class="img-fluid">


                            </div>

                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>
    <div class="col-lg-2 col-sm-12 mt-5 ">
        <h5 class="Title">الموجز </h5>
        <div class="card  summary">
            <div>
                <div class="d-flex flex-row justify-content-between mt-4 ">
                    <h5 class="Title">Youtube </h5>
                    <img src="{{asset('frontend/assets/img/1298778_youtube_play_video_icon.png')}}" class="img-fluid">
                </div>
                <div class="d-flex flex-row justify-content-between mt-3">
                    <p>المطلوب تنفيذه </p>
                    <button class="btn ">عدد زيادة الاعجابات</button>

                </div>
                <div class="d-flex flex-row justify-content-between mt-3 ">
                    <p> المكان </p>
                    <button class="btn "> السعودية</button>

                </div>
                <div class="d-flex flex-row justify-content-between mt-3">
                    <p> عدد العمال </p>
                    <button class="btn "> 22</button>

                </div>
                <div class="d-flex flex-row justify-content-between mt-3">
                    <p>تكلفة العمال </p>
                    <button class="btn "> 4.5 $</button>

                </div>
                <div class="d-flex flex-row justify-content-between mt-3 ">
                    <p> مزايا اضافية </p>
                    <button class="btn "> مهمة مثبتة في الاعلي</button>

                </div>
                <div class="d-flex flex-row justify-content-between mt-3 ">
                    <p> اجمالي النكلفة </p>
                    <button class="btn "> 250.00 $</button>

                </div>

            </div>
            <div class="col-md-12 mt-5">
                <img src="{{asset('frontend/assets/img/Frame12.png')}}" class="img-fluid">

            </div>

        </div>

    </div>

    <?php
    $current_currency = \Modules\Currency\Entities\Currency::withoutTrashed()
        ->where('en_name', auth()->user()->current_currency)
        ->first();
    ?>

@stop
@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Repeater JavaScript -->
    <script src="{{ asset('assets/js/plugins/repeater/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/repeater/jquery.form-repeater.js') }}"></script>
    {{--//git city from country select--}}
    <script>
        $(document).ready(function () {


            $(document).on('change', '.mession-list .country_repeater', function () {
                var idCountry = this.value;
                console.log('data', idCountry)
                // var country = this;
                var country = $(this).find(":selected").text();


                $city_repeater = $(this).parents('.mession-list').find('.city_repeater')
                $city_repeater.html('');
                $.ajax({
                    url: "{{ route('employer.fetch.cities') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        var minCost = Number.MAX_VALUE;
                        @if (app()->getLocale() == 'ar')
                        $city_repeater.html('<option data-cost="0" class="bg-gray-500" value="0">' + "{{ trans('employer::task.TaskCity') }}" + '</option>');
                        $city_repeater.append(
                            '<option class="bg-gray-500" selected id="all_cities_in_this_country_' +
                            idCountry + '" value="all_cities_in_this_country[' +
                            idCountry + ']">' +
                            "{{ trans('employer::task.select_all_cities_in_this_country') }}" +
                            country + '</option>');

                        $.each(result.cities, function (key, value) {
                            if (value.min_city_cost < minCost) minCost = value
                                .min_city_cost;

                            $city_repeater.append('<option data-cost="' + value
                                .min_city_cost + '" value="' + value
                                .id + '">' + value.ar_name + '</option>');
                        });
                        // console.log(minCost);
                        $('#all_cities_in_this_country_' + idCountry + '').data('cost',
                            minCost);
                        @else
                        $city_repeater.html('<option data-cost="0" class="bg-gray-500" value="0">' +
                            "{{ trans('employer::task.TaskCity') }}" +
                            '</option>');
                        $city_repeater.append(
                            '<option class="bg-gray-500" selected id="all_cities_in_this_country_' +
                            idCountry + '"  value="all_cities_in_this_country[' +
                            idCountry + ']">' +
                            "{{ trans('employer::task.select_all_cities_in_this_country') }}" +
                            '</option>');
                        $.each(result.cities, function (key, value) {
                            if (value.min_city_cost < minCost) minCost = value
                                .min_city_cost;
                            $city_repeater.append('<option data-cost="' + value
                                .min_city_cost + '" value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        console.log(minCost);
                        $('#all_cities_in_this_country_' + idCountry + '').data('cost',
                            minCost);
                        @endif


                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.select_category').click(function (e) {
                var category_id = $(this).attr('data-category-type');
                $('#category_id').val(category_id);
                // e.preventDefault();

                $.ajax({
                    url: '{{ route("employer.fetch.category.actions", ["categoryType" => ":categoryType"]) }}'.replace(':categoryType', category_id),
                    success: function (response) {
                        if (response.length > 0) {
                            document.getElementById('ActionMenu').classList.remove('hidden');
                            $('#CategoryMenu').addClass('hidden').fadeOut(0);
                            setTimeout(function () {
                                document.getElementById('CategoryMenu').classList.add('hidden');
                                document.getElementById('selectedCategory').classList.remove('hidden');
                                // document.getElementById('backToCategoryMenuBtn').classList.remove('hidden');
                                document.getElementById('category-menu-title').innerHTML = '{{ trans('employer::task.pleas_select_category_actions') }}';
                            }, 0);
                            response.forEach(function (actions) {
                                var en_action =
                                    '<div class="col-span-12 lg:col-span-4" >' +
                                    '<div class="bg-green-50 dark:bg-zinc-600 dark:text-gray-100 rounded-md shadow-md">' +
                                    '<div class="px-3 mx-2 rtl:float-left ltr:float-right">' +
                                    '<div class="form-check"><input type="checkbox" name="' + 'CategoryAction[' + actions.id + '][toggle]' + '"' + 'data-price="' + actions.price + '"' + 'data-item="' + actions.name + '"' + ' type="checkbox" data-toggle="off" class="form-check-input features toggle rounded align-middle focus:ring-0  focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" id="formrow-customCheck"><label class="ltr:ml-2 rtl:mr-2 font-medium text-gray-700 dark:text-zinc-100" for="formrow-customCheck" >' + ((actions.name.length > 50) ? actions.name.slice(0, 50) + "..." : actions.name) + '</label>' +
                                    '<span class="text-sm">' + (actions.price * {{$current_currency->rate}}).toFixed(2) +
                                    '<span class="text-3xs">' + ' {{$current_currency->en_name}} ' + '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';


                                var ar_action = '<div class="col-span-12 lg:col-span-4" >' +
                                    '<div class="bg-green-50 dark:bg-zinc-600 dark:text-gray-100 rounded-md shadow-md">' +
                                    '<div class="px-3 mx-2 rtl:float-left ltr:float-right">' +
                                    '<div class="form-check"><input type="checkbox" name="' + 'CategoryAction[' + actions.id + '][toggle]' + '"' + 'data-price="' + actions.price + '"' + 'data-item="' + actions.ar_name + '"' + ' type="checkbox" data-toggle="off" class="form-check-input features toggle rounded align-middle focus:ring-0  focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" id="formrow-customCheck"><label class="ltr:ml-2 rtl:mr-2 font-medium text-gray-700 dark:text-zinc-100" for="formrow-customCheck" >' + ((actions.ar_name.length > 50) ? actions.ar_name.slice(0, 50) + "..." : actions.ar_name) + '</label>' +
                                    '<span class="text-sm">' + (actions.price * {{$current_currency->rate}}).toFixed(2) +
                                    '<span class="text-3xs">' + ' {{$current_currency->en_name}} ' + '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';


                                @if(app()->getLocale() =="ar")
                                document.getElementById('selectedCategoryTitle').innerHTML = response[0].category.ar_title;
                                document.getElementById('selectedCategoryDescription').innerHTML = response[0].category.description;
                                document.getElementById('selectedCategoryImage').src = "/storage/" + response[0].category.image;
                                ActionMenu.insertAdjacentHTML("afterbegin", ar_action);
                                @else
                                document.getElementById('selectedCategoryTitle').innerHTML = response[0].category.title;
                                document.getElementById('selectedCategoryDescription').innerHTML = response[0].category.description;
                                document.getElementById('selectedCategoryImage').src = "/storage/" + response[0].category.image;
                                ActionMenu.insertAdjacentHTML("afterbegin", en_action);
                                @endif

                            });

                        } else {
                            // todo make handel else error
                        }


                    },
                    error: function (response) {
                        // todo make handel else error
                    }
                });

            });
        });
    </script>

    <!-- final check if is all inputs is filled in step 2 -->
    <script>
        function checkAllInputs() {
            // const Toast = Swal.mixin({
            //     toast: true,
            //     @if (app()->getLocale() == 'ar')
            //     position: 'top-start',
            //     @else
            //     position: 'top-end',
            //     @endif
            //     showConfirmButton: false,
            //     timer: 6000,
            //     timerProgressBar: true,
            //     didOpen: (toast) => {
            //         toast.addEventListener('mouseenter', Swal.stopTimer)
            //         toast.addEventListener('mouseleave', Swal.resumeTimer)
            //     }
            // });
            $(document).ready(function () {
                var titleLenghth = document.getElementById('taskTitle').value.length;
                var DescLenghth = document.getElementById('TaskDescription').value.length;
                var WorkflowLenghth = document.getElementById('TaskTextWorkflow').value.length;
                var QuesLenghth = document.getElementById('textQuestion').value.length;
                var screenShootLenghth = document.getElementById('textScreenShot').value.length;
                if (!$('#TaskDescription').prop('disabled') &&
                    // !$('#TaskTextWorkflow').prop('disabled') &&
                    !$('#TaskTextWorkflowBox').attr('hidden') &&
                    !$('#textQuestion').prop('disabled') &&
                    !$('#textScreenShot').prop('disabled') &&
                    titleLenghth > 5 &&
                    screenShootLenghth > 5
                ) {
                    document.getElementById('secoundNextStepBtn').classList.add('js-btn-next');
                } else {
                    document.getElementById('secoundNextStepBtn').classList.remove('js-btn-next');

                    if ($('#taskTitle').prop('disabled')) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task Title field is disabled.') }}',
                        });
                    }
                    if (titleLenghth < 5) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Title length should be greater than 5.') }}',
                        });
                    }

                    if ($('#TaskDescription').prop('disabled')) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task Description field is disabled.') }}',
                        });
                    }
                    if (DescLenghth < 5) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Description length should be greater than 5.') }}',
                        });
                    }


                    if ($('#TaskTextWorkflow').prop('disabled')) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task TextWorkflow field is disabled.') }}',
                        });
                    }
                    if (WorkflowLenghth < 5) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task TextWorkflow field is disabled.') }}',
                        });

                    }

                    if ($('#textQuestion').prop('disabled')) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task Question field is disabled.') }}',
                        });
                    }
                    if (QuesLenghth < 5) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Question length should be greater than 5.') }}',
                        });
                    }

                    if ($('#textScreenShot').prop('disabled')) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The Task ScreenShot field is disabled.') }}',
                        });
                    }
                    if (screenShootLenghth < 5) {
                        Toast.fire({
                            icon: 'error',
                            title: '{{ trans('employer::task.The ScreenShot length should be greater than 5.') }}',
                        });
                    }


                }
            });


        }
    </script>

    <!-- final check if is all country and city is filled in step 3 -->
    <script>
        function CheckCountryInput() {
            const Toast = Swal.mixin({
                toast: true,
                @if (app()->getLocale() == 'ar')
                position: 'top-start',
                @else
                position: 'top-end',
                @endif
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            $(document).ready(function () {
                var firstCityValue = document.getElementById('firstCity')?.value;

                if (firstCityValue === undefined || firstCityValue === "null") {
                    Toast.fire({
                        icon: 'error',
                        title: '{{ trans('employer::task.City Value is null or undefined') }}',
                    });

                }
            });

        }
    </script>
    <!--enable and disable worker limit-->
    <script>
        document.getElementById('worker_daily_limit_toggle').onclick = function () {
            var disabled = document.getElementById("worker_daily_limit_input").disabled;
            if (disabled) {
                document.getElementById("worker_daily_limit_input").disabled = false;
                document.getElementById("limitWorkerBox").classList.remove('hidden');

            } else {
                document.getElementById("worker_daily_limit_input").disabled = true;
                document.getElementById("limitWorkerBox").classList.add('hidden');
            }
        }
    </script>

    <!-- set live validation to force select one of any action toggles -->
    <script>
        $(document).ready(function () {
            $(document).on('change', '.toggle', function () {
                if (this.checked) {
                    // Change the value of data-toggle attribute to "on"
                    this.setAttribute('data-toggle', 'on');
                } else {
                    // Change the value of data-toggle attribute to "off" if the input is not checked
                    this.setAttribute('data-toggle', 'off');
                }

                // Get all the input elements
                const inputs = document.querySelectorAll('input[data-toggle]');
                // Initialize a count variable
                let count = 0;
                // Loop through the inputs and count the ones with data-toggle = "on"
                for (let i = 0; i < inputs.length; i++) {
                    if (inputs[i].dataset.toggle === "on") {
                        count++;
                    }
                }

                if (count >= 1) {
                    // document.getElementById('firstNextStep').classList.remove('hidden');
                    // document.getElementById('firstNextStep').classList.add('js-btn-next');
                } else {
                    // document.getElementById('firstNextStep').classList.add('hidden');
                    // document.getElementById('firstNextStep').classList.remove('js-btn-next');
                }

            });


        });
    </script>



@endsection
