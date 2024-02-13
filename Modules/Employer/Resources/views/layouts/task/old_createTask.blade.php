@extends('dashboard::layouts.employer.master')
@section('libraries')
    <link rel="stylesheet" href="{{ asset('assets/Dashboard/assets/libs/alertifyjs/build/css/alertify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/Dashboard/assets/libs/alertifyjs/build/css/themes/default.min.css') }}" />
    <style>
        * {
            font-family: 'Cairo', sans-serif;
            font-size: 11pt;
        }
    </style>
@endsection
@section('content')
    @php
        $fields = ['category_id', 'title', 'description', 'TaskWorkflow', 'TaskWorkflow.*.Workflow', 'total_worker_limit', 'task_end_date', 'TaskRegion', 'TaskRegion.*.Country', 'TaskRegion.*.City', 'proof_request_ques', 'proof_request_screenShot', 'special_access', 'only_professional', 'daily_limit'];
    @endphp
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
        <div class="grid grid-cols-12 gap-5">
            {{-- task categories  --}}
            <div class="col-span-12 lg:col-span-10">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body">
                        <div class="mb-4 ">
                            <div class="tab-pane block" id="select-category">
                                <div class="text-center ">
                                    <h5 class="text-gray-700 dark:text-gray-100 py-1" id="category-menu-title">
                                        {{ trans('employer::task.pleas_select_type_of_category') }}</h5>
                                </div>
                                @if (count($categories) > 0)
                                    <input type="hidden"  id="category_id" name="category_id" value="">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-3"
                                         id="CategoryMenu">

                                        @foreach ($categories as $category)
                                            <div class="bg-green-50 dark:bg-zinc-600 dark:text-gray-100 py-3 rounded-md shadow-md  border-black select_category"
                                                 data-category-type="{{ $category->id }}">
                                                <div class="px-1 mx-1 rtl:float-left ltr:float-right">
                                                    <img src="{{ Storage::url($category->image) }}" alt="Category Image"
                                                         class="w-14 h-14 object-cover rounded-lg">
                                                </div>
                                                <h5 class="px-3 font-md mb-1">
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $category->ar_title }}
                                                    @else
                                                        {{ $category->title }}
                                                    @endif
                                                </h5>

                                                <h6 class="px-3 text-sm text-gray-700 dark:text-gray-400">
                                                    {{ $category->description }}
                                                </h6>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <br>
                                <div class="row">
                                    <!-- Selected Category must be appended here using AJAX -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-3" id="selectedCategory"
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
                                                            <img id="selectedCategoryImage" src=""
                                                                 alt="Category Image"
                                                                 class="w-28 h-28 object-cover rounded-lg ">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-3" aria-labelledby="ActionMenu"
                                                 id="ActionMenu">
                                                {{-- filled by jquery --}}
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
                        </div>


                    </div>
                </div>
            </div>
            {{-- task cart  --}}
            <div class="col-span-12 lg:col-span-2 rounded shadow">
                <div class="card p-1">
                    <div id="cart" class="rounded">
                        <h4 class="text-center">{{ trans('employer::employer.TaskCost') }}</h4>
                        <span>{{ trans('employer::employer.worker') }} <b id="count_worker">= 1</b></span>
                        <br>
                        <ul class="list-group" id="cart-items"></ul>
                        <hr>
                        <div class="text-center pt-2">
                            <span>{{ trans('employer::employer.Total') }}</span>
                            <span class="fw-bold" id="cart-total">
                                @if (app()->getLocale() == 'ar')
                                    USD 0.00
                                @else
                                    0.00 USD
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
            {{-- task info  --}}
            <div class="col-span-12 lg:col-span-6">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body pb-0">
                        <h4 class="text-15 text-gray-700 dark:text-gray-100">{{ trans('employer::task.MainTaskDetails') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2"
                                   for="default-input">{{ trans('employer::task.TaskTitle') }}</label>
                            <input required name="title" id="taskTitle" value="{{ old('title') }}"
                                   class="w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                   type="text" placeholder="{{ trans('employer::task.TaskTitlePlaceholder') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2"
                                   for="default-input">{{ trans('employer::task.TaskDescription') }}</label>
                            <textarea name="description" id="TaskDescription" required
                                      class="border-gray-100 block w-full mt-2 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30"
                                      rows="2" placeholder="{{ trans('employer::task.TaskDescriptionPlaceholder') }}">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <fieldset>
                                <label>{{ trans('employer::task.the task workflow') }}</label>
                                <div class="repeater-default">
                                    <div data-repeater-list="TaskWorkflow">
                                        <div data-repeater-item="">
                                            <div class="flex mb-2">
                                                <div class="flex-1">
                                                    <textarea id="TaskTextWorkflow" required name="TaskWorkflow[0][Workflow]" id="TaskDescription" required
                                                              class="border-gray-100 block w-full mt-2 px-3 rounded placeholder:text-sm dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100/80 dark:placeholder:text-zinc-100/80 focus:ring-2 focus:ring-offset-0 focus:ring-violet-500/30"
                                                              rows="2" placeholder="{{ trans('employer::task.workflow placeholder') }}">{{ old('TaskWorkflow[0][Workflow]') }}</textarea>
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
                                            <button data-repeater-create="" type="button"
                                                    class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i
                                                    class="fas fa-plus opacity-10" aria-hidden="true"></i>
                                                {{ trans('employer::task.add new workflow') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2"
                                   for="default-input">{{ trans('employer::task.request_ques') }}</label>
                            <input required name="proof_request_ques" id="textQuestion"
                                   value="{{ old('proof_request_ques') }}"
                                   class="w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                   type="text" placeholder="{{ trans('employer::task.proof_request_ques') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2"
                                   for="default-input">{{ trans('employer::task.proof_request_screenShot') }}</label>
                            <input required name="proof_request_screenShot" id="textScreenShot"
                                   value="{{ old('proof_request_ques') }}"
                                   class="w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                   type="text"
                                   placeholder="{{ trans('employer::task.proof_request_screenShot_placeholder') }}">
                        </div>


                    </div>
                </div>
            </div>
            {{-- task country  --}}
            <div class="col-span-12 lg:col-span-6">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="card-body pb-0">
                        <h4 class="text-15 text-gray-700 dark:text-gray-100">
                            {{ trans('employer::task.preferential information') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4">
                            <label class="text-sm">{{ trans('employer::task.contOfWorkers') }}</label>
                            <input required step="1" min="1" name="total_worker_limit" id="workerCount"
                                   value="1"
                                   class="w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                   type="number" placeholder="{{ trans('employer::task.contOfWorkers') }}">

                        </div>
                        <div class="col-span-12 py-2">
                            <label class="text-sm">{{ trans('employer::task.task_end_date') }}</label>
                            <input required step="1" min="{{ date('Y-m-d') }}" name="task_end_date"
                                   class="w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                   type="date" placeholder="{{ trans('employer::task.task_end_date') }}">
                        </div>
                        <div class="py-4">
                            <fieldset>
                                <div class="repeater-default">
                                    <div data-repeater-list="TaskRegion">
                                        <div id="test_repeater" data-repeater-item="">
                                            <div class="flex mession-list form-group  gap-4">
                                                <div>
                                                    <label
                                                        class="text-sm">{{ trans('employer::task.TaskCountry') }}</label>
                                                    <select name="TaskRegion[0][Country]"
                                                            class="country_repeater w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                                            required>
                                                        <option>{{ trans('employer::task.pleas_select_country') }}
                                                        </option>
                                                        @if (count($countries) > 0)
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">
                                                                    {{ app()->getLocale() == 'ar' ? $country->ar_name : $country->name }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option>{{ trans('employer::task.NoCountryFound') }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="text-sm">{{ trans('employer::task.TaskCity') }}</label>
                                                    <select name="TaskRegion[0][City]" id="firstCity" required
                                                            class="city-select city_repeater w-full py-2.5 placeholder:text-16 rounded-lg border-gray-100 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100">

                                                        <option value="null">
                                                            {{ trans('employer::task.pleas_select_country_to_fetch_cities') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <br>
                                                    <span data-repeater-delete data-price="0"
                                                          class="delete-country btn btn-danger btn-md">
                                                        <i class="fas fa-trash opacity-10" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group my-4 flex">
                                        <div class="flex w-full justify-center">
                                            <button data-repeater-create="" type="button"
                                                    class="btn bg-violet-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50"><i
                                                    class="fas fa-plus opacity-10" aria-hidden="true"></i>
                                                {{ trans('employer::task.add new countryAndCity') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group my-4 flex">
            <div class="flex w-full justify-center">
                <button onmouseover="CheckCountryInput()" type="submit"
                        class="btn bg-green-500 border-transparent text-white font-medium w-50 justify-center hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">
                    {{ trans('employer::employer.createTaskBTN') }}</button>

            </div>
        </div>
        <?php
        $current_currency = \Modules\Currency\Entities\Currency::withoutTrashed()
            ->where('en_name', auth()->user()->current_currency)
            ->first();
        ?>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Repeater JavaScript -->
        <script src="{{ asset('assets/js/plugins/repeater/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/repeater/jquery.form-repeater.js') }}"></script>


        {{-- <script src="{{asset('assets/js/plugins/multistep-form.js')}}"></script> --}}
        <script>
            $(document).ready(function() {
                //  Categories
                $('.select_category').click(function(e) {
                    var category_id = $(this).attr('data-category-type');
                    $('#category_id').val(category_id);
                    // e.preventDefault();

                    $.ajax({
                        url: '{{ route('employer.fetch.category.actions', ['categoryType' => ':categoryType']) }}'
                            .replace(':categoryType', category_id),
                        success: function(response) {
                            if (response.length > 0) {
                                document.getElementById('ActionMenu').classList.remove('hidden');
                                document.getElementById('additional_Feature').classList.remove(
                                    'hidden');

                                $('#CategoryMenu').addClass('hidden').fadeOut(0);
                                setTimeout(function() {
                                    document.getElementById('CategoryMenu').classList.add(
                                        'hidden');
                                    document.getElementById('selectedCategory').classList
                                        .remove('hidden');
                                    // document.getElementById('backToCategoryMenuBtn').classList.remove('hidden');
                                    document.getElementById('category-menu-title')
                                        .innerHTML =
                                        '{{ trans('employer::task.pleas_select_category_actions') }}';
                                }, 0);
                                response.forEach(function(actions) {
                                    var en_action =

                                        '<div class="grid grid-cols-12 gap-5 ltr:float-left rtl:float-right py-3 px-2" >' +
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
                                        '<div class="grid grid-cols-12 gap-5 ltr:float-left rtl:float-right py-3 px-2" >' +
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
                                    document.getElementById('selectedCategoryImage')
                                        .src = "/storage/" + response[0].category.image;
                                    ActionMenu.insertAdjacentHTML("afterbegin",
                                        ar_action);
                                    @else
                                    document.getElementById('selectedCategoryTitle')
                                        .innerHTML = response[0].category.title;
                                    document.getElementById(
                                        'selectedCategoryDescription').innerHTML =
                                        response[0].category.description;
                                    document.getElementById('selectedCategoryImage')
                                        .src = "/storage/" + response[0].category.image;
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
                                    <li class="list-group-item px-2 py-1" data-item="${item}" data-price="${price}">
                                    ${item} : <b>${price} USD</b>

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
                                    $('#cart-total').text('USD ' + total.toFixed(2));
                                    @else
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
                        error: function(response) {
                            // todo make handel else error
                        }
                    });

                });

            });
        </script>

        <script>


        </script>

        <!--fetch city by country-->
        <script>
            $(document).ready(function() {
                function city_update_price() {
                    $('.city_repeater').unbind();
                    $('.city_repeater').on('change', function() {
                        $('.workers_city').remove();
                        $('#cart-items').append(`<hr class='workers_city'>`);

                        $.each($('.city-select'), function(item) {
                            var cost = $(this).find('option:selected').data('cost');
                            var city = $(this).find('option:selected').text();
                            var workers = $('#workerCount').val();
                            $($('#count_worker').text(workers));
                            // var price = parseFloat(workers) * parseFloat(cost);
                            var price = parseFloat(cost);
                            // if(price <= 0) return false;
                            $('#cart-items').append(`
                        <li class='workers_city' data-item="${city}" data-priceworker="${price}">
                         ${city} : ${price}
                        </li>
                    `);
                        })
                        updateCartTotal();
                    })
                }

                $('#workerCount').on('change', function() {
                    var workers = $('#workerCount').val();
                    $($('#count_worker').text(workers));
                    updateCartTotal();
                })

                function updateCartTotal() {
                    var total_service = 0;
                    var Totalcountries = 0;
                    var count_service = 0;
                    var count = 0;
                    $('#cart-items li').each(function() {
                        if ($(this).data('price')) {
                            var price = $(this).data('price');
                            count_service += 1;
                            total_service += price;
                        }
                        if ($(this).data('priceworker')) {
                            var price = $(this).data('priceworker');
                            Totalcountries += price;
                            count += 1
                        }

                    });
                    var workers = $('#workerCount').val();
                    // TODO:: Start with countires and then change services
                    // formula total cities / counts countries // change workers
                    if (Totalcountries == 0 )
                        var end = (((total_service / count_service) + 0) * workers) / 2;
                    else if(count_service ==0)
                        var end = (( Totalcountries / count) * workers) / 2;
                    else
                        var end = (((total_service / count_service) + (Totalcountries / count)) * workers) / 2;



                    $('#cart-total').text('USD ' + end.toFixed(2));
                }
                $(document).on('change', '.mession-list .country_repeater', function() {
                    var idCountry = this.value;
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
                        success: function(result) {
                            var minCost = Number.MAX_VALUE;
                            @if (app()->getLocale() == 'ar')
                            $city_repeater.html('<option data-cost="0" class="bg-gray-500" value="0">'+"{{ trans('employer::task.TaskCity') }}"+ '</option>');
                            $city_repeater.append(
                                '<option class="bg-gray-500" selected id="all_cities_in_this_country_' +
                                idCountry + '" value="all_cities_in_this_country[' +
                                idCountry + ']">' +
                                "{{ trans('employer::task.select_all_cities_in_this_country') }}" +
                                country + '</option>');

                            $.each(result.cities, function(key, value) {
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
                            $city_repeater.html('<option data-cost="0" class="bg-gray-500" value="0">'"{{ trans('employer::task.TaskCity') }}" '</option>');
                            $city_repeater.apeend(
                                '<option class="bg-gray-500" selected id="all_cities_in_this_country_' +
                                idCountry + '"  value="all_cities_in_this_country[' +
                                idCountry + ']">' +
                                "{{ trans('employer::task.select_all_cities_in_this_country') }}" +
                                '</option>');
                            $.each(result.cities, function(key, value) {
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

                            city_update_price();

                        }
                    });
                });
            });
        </script>

        <!--enable and disable worker limit-->
        <script>
            document.getElementById('worker_daily_limit_toggle').onclick = function() {
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
            $(document).ready(function() {
                $(document).on('change', '.toggle', function() {
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

        <!-- set live validation to force fill all of inputs in step 2 -->
        <script>
            // $(document).ready(function() {
            //     document.getElementById("TaskDescription").disabled = true;
            //     // document.getElementById("TaskTextWorkflow").disabled = true;
            //     document.getElementById("TaskTextWorkflowBox").hidden = true;
            //     document.getElementById("textQuestion").disabled = true;
            //     document.getElementById("textScreenShot").disabled = true;

            //     var Title = document.getElementById('taskTitle');
            //     Title.addEventListener('input', function() {
            //         var TitleInputLength = Title.value.length;
            //         if (TitleInputLength < 5) {
            //             document.getElementById("TaskDescription").disabled = true;
            //             checkInputs();
            //         } else {
            //             document.getElementById("TaskDescription").disabled = false;
            //             checkInputs();
            //         }

            //     });

            //     var textDescription = document.getElementById('TaskDescription');
            //     textDescription.addEventListener('input', function() {
            //         var DescriptionInputLength = textDescription.value.length;
            //         if (DescriptionInputLength < 5) {
            //             // document.getElementById("TaskTextWorkflow").disabled = true;
            //             document.getElementById("TaskTextWorkflowBox").hidden = true;
            //             checkInputs();
            //         } else {
            //             // document.getElementById("TaskTextWorkflow").disabled = false;
            //             document.getElementById("TaskTextWorkflowBox").hidden = false;
            //             checkInputs();
            //         }
            //     });

            //     var textWorkFlow = document.getElementById('TaskTextWorkflow');
            //     textWorkFlow.addEventListener('input', function() {
            //         var WorkFlowInputLength = textWorkFlow.value.length;
            //         if (WorkFlowInputLength < 5) {
            //             document.getElementById("textQuestion").disabled = true;
            //             checkInputs();
            //         } else {
            //             document.getElementById("textQuestion").disabled = false;
            //             checkInputs();
            //         }
            //     });

            //     var textQuestion = document.getElementById('textQuestion');
            //     textQuestion.addEventListener('input', function() {
            //         var QuestionInputLength = textQuestion.value.length;
            //         if (QuestionInputLength < 5) {
            //             document.getElementById("textScreenShot").disabled = true;
            //             checkInputs();
            //         } else {
            //             document.getElementById("textScreenShot").disabled = false;
            //             checkInputs();
            //         }

            //     });

            //     var textScreenShot = document.getElementById('textScreenShot');
            //     textScreenShot.addEventListener('input', function() {
            //         var ScreenShotInputLength = textScreenShot.value.length;
            //         checkInputs(ScreenShotInputLength);
            //     });

            //     function checkInputs(ScreenShotInputLength) {
            //         if (!$('#TaskDescription').prop('disabled') &&
            //             !$('#TaskTextWorkflowBox').attr('hidden') &&
            //             !$('#textQuestion').prop('disabled') &&
            //             ScreenShotInputLength > 5
            //         ) {
            //             document.getElementById('secoundNextStepBtn').classList.remove('hidden');
            //         }
            //     }
            // });
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
                $(document).ready(function() {
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
                $(document).ready(function() {
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
    </form>
@stop
