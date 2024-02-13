
@extends('employer::layouts.employer.app')

@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('style')
@endsection
@section('content')


    @php
        $fields = ['category_id', 'title', 'description', 'TaskWorkflow', 'TaskWorkflow.*.Workflow', 'total_worker_limit', 'task_end_date', 'TaskRegion', 'TaskRegion.*.Country', 'TaskRegion.*.City', 'proof_request_ques', 'proof_request_screenShot', 'special_access', 'only_professional', 'daily_limit'];
    @endphp






    <div class="col-lg-7 dashboard col-sm-12 ">

        @if ($errors && count($errors) > 0)
            <div class="flex p-4 text-sm text-violet-700 bg-yellow-50 rounded " role="alert">
                <i class="bx bx-smile text-xl ltr:mr-3 rtl:ml-3 -mt-1"></i>
                <span class="sr-only">Info</span>
                <div>

                    {{-- <span class="font-medium">There were <?php echo count($errors); ?> warnings with your submission</span> --}}

                    <ul class="mt-1.5 ml-4 list-disc list-inside">

                        @foreach ($fields as $field)
                            @if ($errors->has($field))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <li class="alert-text">
                                        <strong>{{ trans('employer::task.Error!') }}</strong>{{ $errors->first($field) }}</li>

                                </div>
                                {{-- <>Could not load content for this code..</> --}}
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('employer.create.task.steep.one') }}" method="POST" enctype="multipart/form-data"
              class="multisteps-form__form ">
            @csrf
            <input type="hidden" class="hidden" id="category_id" name="category_id" value="">
        <div class="col-lg-12 col-sm-12 d-flex flex-row category">
            <label> {{trans('employer::task.pleas_select_type_of_category')}} </label>
            <select class="form-select" aria-label="Default select example" >
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
            <div class="row" id="CategoryMenu">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)

                        <div class="col-lg-3 col-sm-6 addtaskdetails">
                            <div class="card select_category" data-category-type="{{ $category->id }}">
                                <img class="card-img-top "
                                     src="{{ Storage::url($category->image) }}"

                                     onerror="this.src='{{asset('frontend/assets/img/317746_facebook_social media_social_icon.png')}}'"
                                     alt="Card image cap">
                                <div >
                                    <h5 class="Title">
                                        @if (app()->getLocale() == 'ar')
                                            {{$category->ar_title ?? ''}}
                                        @else
                                            {{$category->title ?? ''}}
                                        @endif
                                    </h5>
                                    <p class="card-text subtextdes">

                                        {!! html_entity_decode(substr($category->description, 0, 125)) !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


<br>

{{--//start pop--}}
{{--//end of pop--}}
            </div>




        </div>

        <div class="col-lg-12 col-sm-12 mt-4" id="styleshowpop" style="display: none">
            <div class="row">
                <!-- Selected Category must be appended here using AJAX -->
                <div class="col-span-6 lg:col-span-6 hidden" id="selectedCategory"
                     data-category-type="">
                    <div class="col-span-12 ">
                        <div class="m-2 p-3">
                            <div class="flex justify-center items-center">
                                <div class="col-span-9  lg:p-6 sm:p-2">
                                    <div class="font-bold mb-0" id="selectedCategoryTitle"></div>
                                    <p class="text-md text-capitalize font-semibold"
                                       id="selectedCategoryDescription"></p>
                                </div>
                                <div class="col-span-3 text-end">
                                    <div class="relative">
{{--                                        <img id="selectedCategoryImages" src=""--}}
{{--                                             alt="Category Image"--}}
{{--                                             class="w-28 h-28 object-cover rounded-lg ">--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                        <div class="row" aria-labelledby="ActionMenu"
                             id="ActionMenu">
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Selected Category must be appended here using AJAX -->
                <div class="col-span-6 lg:col-span-6">


                    <div class="col-span-3 lg:col-span-3 hidden" id="additional_Feature">
                        <div>
                            <h5 class="text-center py-2 text-sky-500">
                                {{ trans('employer::task.additional_features') }}</h5>
                            @if ($activeAndAvailableTasks < $limit_of_pin_to_top->pin_in_top_task_limit_count)
                                <div class="col-span-12">
                                    <div class="col-span-12">
                                        <div class="card m-2">
                                            <div class="card-body p-3">
                                                <div class="grid grid-cols-3">
                                                    <div class="col-span-12 mx-4 ">
                                                        <input
                                                            class="form-check-input features toggle rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 px-2 py-2 mx-3"
                                                            name="special_access"
                                                            data-item="{{ trans('employer::task.pinTaskTop') }}"
                                                            data-price="{{ $pin_task_on_top->fees }}"
                                                            type="checkbox" id="pinTaskTop_toggle"
                                                            data-toggle="off">
                                                        <span
                                                            class="text-sm mb-0 text-capitalize font-semibold">
                                                                                {{ trans('employer::task.pinTaskTop') }}
                                                                                <i data-bs-toggle="tooltip"
                                                                                   data-bs-placement="bottom"
                                                                                   title="{{ trans('employer::task.pinTaskTopAvailableNowDescription') }} {{ $limit_of_pin_to_top->pin_in_top_task_limit_count }}"
                                                                                   class="ni ni-bell-55 text-sm text-success opacity-10"
                                                                                   aria-hidden="true"></i>
                                                                            </span>
                                                        <span id="pinTaskTopValue"
                                                              class="text-info text-capitalize font-semibold text-lg">
                                                                                {{ convertCurrency($pin_task_on_top->fees, auth()->user()->current_currency) }}
                                                                                <span
                                                                                    class="text-xs text-body">{{ auth()->user()->current_currency }}</span>
                                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-span-12">
                                    <div class="col-span-12">
                                        <div class="card m-2" style="background-color: #EBEBF0">
                                            <div class="card-body p-3">
                                                <div class="grid grid-cols-3">
                                                    <div class="col-span-12">
                                                        <input
                                                            class="form-check-input features toggle h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 px-2 py-2 mx-3"
                                                            name="special_access" id="pinTaskTop_toggle"
                                                            data-price="{{ $pin_task_on_top->fees }}"
                                                            data-item="{{ trans('employer::task.pinTaskTop') }}"
                                                            type="checkbox" data-toggle="off"
                                                            disabled>

                                                        <span
                                                            class="text-sm mb-0 text-capitalize font-semibold">
                                                                                {{ trans('employer::task.pinTaskTop') }}
                                                                                <i data-bs-toggle="tooltip"
                                                                                   data-bs-placement="bottom"
                                                                                   title="{{ trans('employer::task.pinTaskTopNotAvailableNowDescription') }} {{ $limit_of_pin_to_top->pin_in_top_task_limit_count }}"
                                                                                   class="ni ni-bell-55 text-sm text-warning opacity-10"
                                                                                   aria-hidden="true"></i>
                                                                            </span>
                                                        <span id="pinTaskTopValue"
                                                              class="text-info text-capitalize font-semibold text-lg">
                                                                                {{ convertCurrency($pin_task_on_top->fees, auth()->user()->current_currency) }}
                                                                                <span
                                                                                    class="text-xs text-body">{{ auth()->user()->current_currency }}</span>
                                                                            </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-span-12">
                                <div class="col-span-12">
                                    <div class="card m-2">
                                        <div class="card-body p-3">
                                            <div class="grid grid-cols-3">
                                                <div class="col-span-12 mx-4">
                                                    <input
                                                        class="form-check-input features toggle h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 px-2 py-2 mx-3"
                                                        name="only_professional"
                                                        data-price="{{ $only_professional_worker->fees }}"
                                                        data-item="{{ trans('employer::task.professionalOnly') }}"
                                                        type="checkbox" id="professionalOnly_toggle"
                                                        data-toggle="off">
                                                    <span
                                                        class="text-sm mb-0 text-capitalize font-semibold">
                                                                            {{ trans('employer::task.professionalOnly') }}
                                                                        </span>

                                                    <span id="professionalOnlyValue"
                                                          class="text-info text-capitalize font-semibold text-lg">
                                                                            {{ convertCurrency($only_professional_worker->fees, auth()->user()->current_currency) }}
                                                                            <span
                                                                                class="text-xs text-body">{{ auth()->user()->current_currency }}</span>
                                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12">
                                <div class="col-span-12">
                                    <div class="card m-2">
                                        <div class="card-body p-3">
                                            <div class="grid grid-cols-3">
                                                <div class="col-span-12 mx-4">

                                                    <input
                                                        class="form-check-input features toggle h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 px-2 py-2 mx-3"
                                                        name="daily_limit_toggle"
                                                        data-price="{{ $daily_limit_worker->fees }}"
                                                        data-item="{{ trans('employer::task.worker_daily_limit') }}"
                                                        type="checkbox"
                                                        id="worker_daily_limit_toggle">
                                                    <span
                                                        class="text-sm mb-0 text-capitalize font-semibold">
                                                                            {{ trans('employer::task.worker_daily_limit') }}
                                                                        </span>


                                                    <span id="worker_daily_limitValue"
                                                          class="text-info text-capitalize font-semibold text-lg">
                                                                            {{ convertCurrency($daily_limit_worker->fees, auth()->user()->current_currency) }}
                                                                            <span
                                                                                class="text-xs text-body">{{ auth()->user()->current_currency }}</span>
                                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 mt-4 hidden" id="limitWorkerBox">
                                <label
                                    class="text-sm">{{ trans('employer::task.worker_daily_limit_input') }}</label>
                                <input id="worker_daily_limit_input" name="daily_limit"
                                       min="1" step="1" value="1"
                                       class="multisteps-form__input w-full form-input" type="number"
                                       placeholder="{{ trans('employer::task.worker_daily_limit_input') }}"
                                       onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                            <i class="fa fa-info"></i>

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
                        <h5 class="Title"> @lang('site.details') </h5>
                        <img src="{{asset('frontend/assets/img/youtubbg.jpg')}}" class="img-fluid youtub-img">
                        <div class="form-group   mt-3 ">
                            <label for="mession" class="ccontrol-label"> {{trans('employer::task.TaskTitle')}} </label>
                            <input class="form-control " type="text" id="mession taskTitle" required name="title"
                                   value="{{old('title')}}">
                        </div>
                        <div class="form-group  mt-3">
                            <label for="mession"
                                   class="ccontrol-label">{{trans('employer::task.TaskDescription')}}  </label>
                            <input class="form-control  " type="text" id="mession TaskDescription" name="description">
                        </div>


                        <div class="form-group   mt-3  ">

                            {{--                            <label for="mession"--}}
                            {{--                                   class="ccontrol-label "> {{ trans('employer::task.TaskCountry') }} </label>--}}

                            <fieldset>
                                <div class="repeater-default">
                                    <div data-repeater-list="TaskRegion">
                                        <div id="test_repeater" data-repeater-item="">
                                            <div
                                                class=" col-md-12 d-flex  flex-row mession-list form-group grid grid-cols-1 md:grid-cols-5 gap-4">
                                                <div class="country">
                                                    <label
                                                        class="text-sm">{{ trans('employer::task.TaskCountry') }}</label>
                                                    <select name="TaskRegion[0][Country]"
                                                            class="country_repeater w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100 form-select"
                                                            required>
                                                        <option>{{ trans('employer::task.pleas_select_country') }}</option>
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
                                                <div class="country">

                                                    <label
                                                        class="text-sm">{{ trans('employer::task.TaskCity') }}</label>
                                                    <select name="TaskRegion[0][City]" id="firstCity"
                                                            style="z-index: 999"
                                                            required
                                                            class="form-select city-select city_repeater w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100">

                                                        <option value="null">
                                                            {{ trans('employer::task.pleas_select_country_to_fetch_cities') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div>
                                    <span data-repeater-delete data-price="0" style="
    margin-top: 79.5% !important" ;
                                          class=" delete-country btn btn-danger btn-md">
                                                    <i class="fas fa-trash opacity-10" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group grid grid-cols-1 md:grid-cols-1 mt-4">
                                        <div>
                                <span data-repeater-create
                                      class="btn btn-success btn-md">
                                  <i class="fas fa-plus opacity-10" aria-hidden="true"></i>
                                  {{ trans('employer::task.add new countryAndCity') }}
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <div class="mb-4">
                                <fieldset>
                                    <label>{{trans('employer::task.the task workflow')}}</label>
                                    <div class="repeater-default">
                                        <div data-repeater-list="TaskWorkflow">
                                            <div data-repeater-item="">
                                                <div class="flex mb-2 d-flex flex-row justify-content-between">
                                                    <div class="col-md-10 col-sm-10 col-xs-10" >
                                                        <textarea id="TaskTextWorkflow" required
                                                                  name="TaskWorkflow[0][Workflow]" id="TaskDescription"
                                                                  required
                                                                  class="form-control mt-2 border-gray-100 block w-full mt-2 px-3 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30"
                                                                  rows="2" style="width: 100%;resize:none"
                                                                  placeholder="{{trans('employer::task.workflow placeholder')}}">{{old('TaskWorkflow[0][Workflow]')}}</textarea>
                                                    </div>

                                                    <div class="px-3 py-2 col-sm-2 col-md-2 col-xs-2 m-auto">
                                                <span data-repeater-delete="" class="btn btn-danger btn-md">
                                                    <i class="fas fa-trash opacity-10" aria-hidden="true"></i>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 flex">



                                                <div class="form-group grid grid-cols-1 md:grid-cols-1 mt-4">
                                                    <div>
                                <span data-repeater-create
                                      class="btn btn-success btn-md">
                                  <i class="fas fa-plus opacity-10" aria-hidden="true"></i>
                                  {{trans('employer::task.add new workflow')}}

                                </span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="form-group  mt-3">
                                <label for="mession"
                                       class="ccontrol-label"> {{ trans('employer::task.contOfWorkers') }} </label>
                                <input class="form-control  " type="text" id="mession workerCount" required step="1"
                                       min="1" name="total_worker_limit">
                            </div>
                            <div class="form-group  mt-3">
                                <label for="mession"
                                       class="ccontrol-label">{{ trans('employer::task.task_end_date') }} </label>
                                <input class="form-control  " type="date" id="mession workerCount" required step="1"
                                       min="{{ date('Y-m-d') }}" name="task_end_date" value="1">
                            </div>
                            <h6 class="Title mt-2 ">@lang('site.details')</h6>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="survey" id="Radios1" value="Yes" class="mt-2">
                                        {{ trans('employer::task.proof_request_screenShot') }}
                                    </label>
                                    <input required name="proof_request_screenShot" id="textScreenShot"
                                           value="{{ old('proof_request_ques') }}"
                                           class="form-control
"
                                           type="text"
                                           placeholder="{{ trans('employer::task.proof_request_screenShot_placeholder') }}">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="survey" id="Radios1" value="Yes" class="mt-2">
                                        {{trans('employer::task.request_ques')}}
                                    </label>
                                    <input required name="proof_request_ques" id="textQuestion"
                                           value="{{old('proof_request_ques')}}" class="form-control" type="text"
                                           placeholder="{{trans('employer::task.proof_request_ques')}}">

                                </div>

                            </div>
                            <div>
                                <h4 class="Title mt-2">المميزات الاضافية </h4>
                                @if($activeAndAvailableTasks < $limit_of_pin_to_top->pin_in_top_task_limit_count)

                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
{{--                                            <input type="radio" name="survey" id="Radios1">--}}
                                            <input class="form-check-input features toggle mt-2"
                                                   name="special_access"
                                                   data-price="{{ $pin_task_on_top->fees }}"
                                                   type="checkbox"
                                                   id="pinTaskTop_toggle Radios1"
                                                   data-toggle="off">
                                            <span>{{ trans('employer::task.pinTaskTop') }}</span>
                                            <br>
                                            {{ trans('employer::task.pinTaskTop') }}
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">{{ $pin_task_on_top->fees }}$</p>
                                    </div>

                                </div>
                                @else
                                    <div class="d-flex flext-row justify-content-between additional ">
                                        <div class="radio">
                                            <label>
                                                <input class="form-check-input features toggle mt-2"
                                                       name=""
                                                       data-price="{{ $pin_task_on_top->fees }}"
                                                       data-item="{{ trans('employer::task.pinTaskTop') }}"
                                                       type="radio"
                                                       id="Radios1"
                                                       data-toggle="off" disabled>
                                                <span>{{ trans('employer::task.pinTaskTop') }}</span>
                                                <br>
                                                {{ trans('employer::task.pinTaskTop') }}
                                            </label>
                                        </div>
                                        <div>
                                            <p class="m-auto">{{ $pin_task_on_top->fees }} $</p>
                                        </div>

                                    </div>

                                @endif
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
{{--                                            <input type="radio" name="survey" id="Radios1">--}}

                                            <input class="form-check-input features toggle mt-2"
                                                   name="only_professional"
                                                   data-price="{{ $only_professional_worker->fees }}"
                                                   data-item="{{ trans('employer::task.professionalOnly') }}"
                                                   type="radio"
                                                   id="professionalOnly_toggle Radios1"
                                                   data-toggle="off">
                                            <span> {{ trans('employer::task.professionalOnly') }}    </span>
                                            <br>
                                            {{ trans('employer::task.professionalOnly') }}
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">         {{ convertCurrency($only_professional_worker->fees, auth()->user()->current_currency) }} $</p>
                                    </div>

                                </div>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input class="form-check-input features toggle mt-2"
                                                   name="daily_limit_toggle"
                                                   data-price="{{ $daily_limit_worker->fees }}"
                                                   data-item="{{ trans('employer::task.worker_daily_limit') }}"
                                                   type="radio"
                                                   id="worker_daily_limit_toggle Radios1">

                                            <span>{{ trans('employer::task.worker_daily_limit') }} </span>
                                            <br>
                                            {{ trans('employer::task.worker_daily_limit') }}
                                        </label>
                                    </div>
                                    <div>

                                        <input id="worker_daily_limit_input" name="daily_limit"
                                               min="1" step="1" value="1" style="width:50%"
                                               class="multisteps-form__input w-full form-input form-control" type="number"
                                               placeholder="{{ trans('employer::task.worker_daily_limit_input') }}"
                                               onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                    </div>
                                    <div>
                                        <p class="m-auto">{{ convertCurrency($daily_limit_worker->fees, auth()->user()->current_currency) }}$</p>
                                    </div>

                                </div>
                                <div class="d-flex flext-row justify-content-between additional ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="survey" id="Radios1" class="mt-2">
                                            <span>     @lang('site.Random appearance')     </span>
                                            <br>
                                            @lang('site.The task appears and disappears randomly from a page')
                                        </label>
                                    </div>
                                    <div>
                                        <p class="m-auto">10.00 $</p>
                                    </div>

                                </div>
                                <div class="d-flex flex-row justify-content-between mt-3">
                                    <div>
                                        <h4 class="Title">{{trans('employer::employer.Total')}} </h4>
                                    </div>
                                    <div>
                                        <p id="cart-total">00.00$</p>
                                    </div>

                                </div>
                                <div class="d-flex flex-row justify-content-around addtional-button">
                                    <div>
                                        <button class="btn btn-delete">@lang('site.canceled')</button>
                                    </div>
                                    <div>
                                        <button  type="submit" onmouseover="CheckCountryInput()"  class="btn btn-create">{{ trans('employer::employer.createTaskBTN') }}</button>
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
        <h5 class="Title">{{trans('employer::employer.TaskCost')}} </h5>
        <div class="card  summary">
            <div>
                <div class="d-flex flex-row justify-content-between mt-4 ">
                    <h5 class="Title">Youtube </h5>
                    <img src="{{asset('frontend/assets/img/1298778_youtube_play_video_icon.png')}}" class="img-fluid">
                </div>
                <div class="list-group-item px-3 py-1 d-flex flex-row justify-content-between">
                    <p>{{trans('employer::employer.worker')}}  </p>
                    <button class="btn "><b id="count_worker"> 1</b></button>

                </div>

{{--                <div class="d-flex flex-row justify-content-between mt-3 ">--}}
{{--                    <p> {{trans('employer::employer.Total')}} </p>--}}
{{--                    <button class="btn " id="cart-total"> @if(app()->getLocale() =="ar") $ 0.00 @else 0.00 $ @endif</button>--}}

{{--                </div>--}}

                <ul class="list-group" id="cart-items"></ul>
                <hr>

                <div class="d-flex flex-row justify-content-between mt-3 ">
                    <p>{{ trans('employer::employer.Total') }}</p>
                    <button class="btn " id="cart-totals">
                                @if (app()->getLocale() == 'ar')
                            USD 0.00
                        @else
                            0.00 USD
                        @endif
                    </button>
                </div>
{{--                <div class="d-flex flex-row justify-content-between mt-3">--}}
{{--                    <p> عدد العمال </p>--}}
{{--                    <button class="btn "> 22</button>--}}

{{--                </div>--}}
{{--                <div class="d-flex flex-row justify-content-between mt-3">--}}
{{--                    <p>تكلفة العمال </p>--}}
{{--                    <button class="btn "> 4.5 $</button>--}}

{{--                </div>--}}
{{--                <div class="d-flex flex-row justify-content-between mt-3 ">--}}
{{--                    <p> مزايا اضافية </p>--}}
{{--                    <button class="btn "> مهمة مثبتة في الاعلي</button>--}}

{{--                </div>--}}
{{--                <div class="d-flex flex-row justify-content-between mt-3 ">--}}
{{--                    <p>{{trans('employer::employer.Total')}} </p>--}}
{{--                    <button class="btn "id="cart-total"> @if(app()->getLocale() =="ar") $ 0.00 @else 0.00 $ @endif</button>--}}

{{--                </div>--}}

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

    <script src="https://ajax.googleapis.com/ajaclass="card  summary"x/libs/jquery/3.5.1/jquery.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
console.log("asasa",category_id);
                $.ajax({

                    url: '{{ route('employer.fetch.category.actions', ['categoryType' => ':categoryType']) }}'
                        .replace(':categoryType', category_id),
                    success: function (response) {
                        document.getElementById('styleshowpop').style.display="block";

                        if (response.length > 0) {
                            document.getElementById('ActionMenu').classList.remove('hidden');
                            document.getElementById('additional_Feature').classList.remove(
                                'hidden');

                            $('#CategoryMenu').addClass('hidden').fadeOut(0);
                            // setTimeout(function() {
                                document.getElementById('CategoryMenu').classList.add(
                                    'hidden');
                                document.getElementById('selectedCategory').classList
                                    .remove('hidden');
                                // document.getElementById('backToCategoryMenuBtn').classList.remove('hidden');
                                // document.getElementById('category-menu-title')
                                {{--    .innerHTML =--}}
                                {{--    '{{ trans('employer::task.pleas_select_category_actions') }}';--}}
                            // }, 0);
                            response.forEach(function(actions) {
                                var en_action =

                                    '<div class="col-md-6 col-sm-6 col-xs-6 likess" >' +
                                    '<div class="col-span-12 lg:col-span-12" >' +
                                    '<div class="bg-green-50 dark:bg-zinc-600 dark:text-gray-100 rounded-md shadow-md">' +
                                    '<div class="px-3 mx-2 rtl:float-left ltr:float-right">' +
                                    '<div class="form-check"><input type="checkbox" name="' +
                                    'CategoryAction[' + actions.id + '][toggle]' + '"' +
                                    'data-price="' + actions.price + '"' +
                                    'data-item="' + actions.name + '"' +
                                    ' type="checkbox" data-toggle="off" class="form-check-input features toggle rounded align-middle focus:ring-0  focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" id="CategoryAction[' +
                                    actions.id +
                                    ']"><label class="ltr:ml-2 rtl:mr-2 font-bold text-gray-700 dark:text-zinc-100" for="CategoryAction[' +
                                    actions.id + ']" >' +
                                    ((actions.name.length > 50) ? actions.name.slice(0,
                                        50) + "..." : actions.name) + '</label>' +
                                    '<span class="text-sm">' + (actions.price *
                                        {{ $current_currency->rate }}).toFixed(2) +
                                    '<span class="text-3xs">' +
                                    ' {{ $current_currency->en_name }} ' + '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';


                                var ar_action =
                                    '<div class="col-md-6 col-sm-6 col-xs-6 likess" >' +
                                    '<div class="col-span-12 lg:col-span-12" >' +
                                    '<div class="bg-green-50 dark:bg-zinc-600 dark:text-gray-100 rounded-md shadow-md">' +
                                    '<div class="px-3 mx-2 rtl:float-left ltr:float-right">' +
                                    '<div class="form-check"><input type="checkbox" name="' +
                                    'CategoryAction[' + actions.id + '][toggle]' + '"' +
                                    'data-price="' + actions.price + '"' +
                                    'data-item="' + actions.ar_name + '"' +
                                    ' type="checkbox" data-toggle="off" class="form-check-input features toggle rounded align-middle focus:ring-0  focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" id="CategoryAction[' +
                                    actions.id +
                                    ']"><label class="ltr:ml-2 rtl:mr-2 font-bold text-gray-700 dark:text-zinc-100 " for="CategoryAction[' +
                                    actions.id + ']" >' +
                                    ((actions.ar_name.length > 50) ? actions.ar_name
                                        .slice(0, 50) + "..." : actions.ar_name) +
                                    '</label>' +
                                    '<span class="px-2 text-sm">' + (actions.price *
                                        {{ $current_currency->rate }}).toFixed(2) +
                                    '<span class="text-3xs">' +
                                    ' {{ $current_currency->en_name }} ' + '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';




                                @if (app()->getLocale() == 'ar')
                                document.getElementById('selectedCategoryTitle')
                                    .innerHTML = response[0].category.ar_title;
                                document.getElementById(
                                    'selectedCategoryDescription').innerHTML =
                                    response[0].category.description;



                                // document.getElementById('selectedCategoryImage')
                                //     .src = "/storage/" + response[0].category.image;


                                ActionMenu.insertAdjacentHTML("afterbegin",
                                    ar_action);
                                @else
                                document.getElementById('selectedCategoryTitle')
                                    .innerHTML = response[0].category.title;
                                document.getElementById(
                                    'selectedCategoryDescription').innerHTML =
                                    response[0].category.description;
                                // document.getElementById('selectedCategoryImage')
                                //     .src = "/storage/" + response[0].category.image;
                                ActionMenu.insertAdjacentHTML("afterbegin",
                                    en_action);
                                @endif

                            });



                            $('.form-check-input').on('change', function() {

                                var item = $(this).data('item');
                                var price = $(this).data('price');

                                if ($(this).is(':checked')) {
                                    addToCart(item, price);
                                } else {
                                    removeFromCart(item, price);
                                }

                                updateCartTotal();

                            });

                            function addToCart(item, price) {
                                // add item html to cart
                                $('#cart-items').append(`
                                    <li class="list-group-item px-3 py-1 d-flex flex-row justify-content-between" data-item="${item}" data-price="${price}">
                                   <p> ${item}  </p> <button class="btn "><b id="count_worker">${price}</b></button>

                                    </li>
                                `);
                            }

                            function removeFromCart(item, price) {
                                // remove item html from cart
                                $('#cart-items li[data-item="' + item + '"]').remove();
                            }


                            function updateCartTotal() {
                                var total = 0;

                                $('#cart-items li').each(function() {
                                    var price = $(this).data('price');
                                    total += price;
                                });
                                @if (app()->getLocale() == 'ar')
                                $('#cart-totals').text('USD ' + total.toFixed(2));
                                $('#cart-total').text('USD ' + total.toFixed(2));
                                @else
                                $('#cart-totals').text(total.toFixed(2) + ' USD ');
                                $('#cart-total').text(total.toFixed(2) + ' USD ');
                                @endif


                            }

                            $('#cart-items').on('click', function() {

                                var item = $(this).closest('li').data('item');

                                $(this).closest('li').remove();

                                updateCartTotal();

                            })



                        }

                        else {
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
        $(document).ready(function () {

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
        });

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

    </form>


@endsection
