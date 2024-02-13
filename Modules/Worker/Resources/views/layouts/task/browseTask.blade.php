@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::task.tasks')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">

        <div class="row dashboard">

            <div class="col-lg-12 col-sm-12  categoryTask profile-details mb-4">
                <div class=" p-3 categoty">
                    <div class="avliable-select" id="TaskCategoryFilterText">
                        <select class="form-select category_filter" aria-label="Default select example" name="category">
                            <option>{{ trans('worker::task.AllTaskCategories') }}</option>

                            @foreach ($categories as $category)
                                @if (app()->getLocale() == 'ar')
                                    <option><a class="dropdown-item" data-category-name="{{ $category->ar_title }}"
                                               data-category-type="{{ $category->id }}">{{ $category->ar_title }}</a>
                                    </option>
                                @else
                                    <option><a class="dropdown-item" data-category-name="{{ $category->title }}"
                                               data-category-type="{{ $category->id }}">{{ $category->title }}</a>
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="avliable-select">
                        <select class="form-select country_filter" aria-label="Default select example country_filter">
                            <option>{{ trans('worker::task.AllTaskCountry') }}</option>

                            @foreach ($countries as $country)
                                <option data-category-name="{{ $country->name }}"
                                        data-country-type="{{ $country->id }}"  value="{{ $country->id }}">@if (app()->getLocale() == 'ar') {{ $country->ar_name }} @else {{ $category->name }} @endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="avliable-select">
                        <select class="form-select level_filter" aria-label="Default select example">
                            <option selected>  {{ trans('worker::task.TaskLevel') }}</option>
                            <option value="1" data-level-type="all_level"><a class="dropdown-item"
                                                 data-level-type="professional">{{ trans('worker::task.SortTaskBy_professional') }}</a>
                            </option>
                            <option value="2" data-level-type="professional">
                                <a class="dropdown-item"
                                   data-level-type="not_professional">{{ trans('worker::task.SortTaskBy_not_professional') }}</a>

                            </option>
                            <option value="3" data-level-type="not_professional">

                                <a class="dropdown-item"
                                   data-level-type="all_level">{{ trans('worker::task.SortTaskBy_allLevel') }}</a>

                            </option>
                        </select>
                    </div>
                    <div class="avliable-select">
                        <select class="form-select" aria-label="Default select example">
                            <option selected> {{ trans('worker::task.TotalTaskCostRange') }}</option>
                            <option value="{{ $min_total_costs }}"
                                    oninput="rangevalue.value=value"> {{ $min_total_costs }}</option>
                            <option value="{{ $max_total_costs }}"
                                    oninput="rangevalue.value=value">{{ $max_total_costs }}</option>
                        </select>
                        {{--                        <div class="d-flex mt-1">--}}
                        {{--                                        <span class="mx-1"><output--}}
                        {{--                                                id="rangevalue">{{ $min_total_costs }}</output></span>--}}
                        {{--                            <input class="form-range " id="TotalCostRange" type="range"--}}
                        {{--                                   min="{{ $min_total_costs }}" max="{{ $max_total_costs }}"--}}
                        {{--                                   value="{{ $max_total_costs }}" oninput="rangevalue.value=value">--}}
                        {{--                            <span class="mx-1">{{ $max_total_costs }}</span>--}}
                        {{--                        </div>--}}
                        </select>
                    </div>
                    <div class="avliable-select">
                        <select class="form-select" aria-label="Default select example sort_list"  id="sort_by">
                            <option selected>  {{ trans('worker::task.SortTasksBy') }}</option>
                            <option><a class="dropdown-item"
                                       data-sort-type="oldest">{{ trans('worker::task.SortTaskBy_oldest') }}</a>
                            </option>
                            <option><a class="dropdown-item"
                                       data-sort-type="newest">{{ trans('worker::task.SortTaskBy_newest') }}</a>
                            </option>
                            <option><a class="dropdown-item"
                                       data-sort-type="cheapest">{{ trans('worker::task.SortTaskBy_cheapest') }}</a>
                            </option>
                            <option><a class="dropdown-item"
                                       data-sort-type="expensive">{{ trans('worker::task.SortTaskBy_expensive') }}</a>
                            </option>
                            <option><a class="dropdown-item"
                                       data-sort-type="workerAccept">{{ trans('worker::task.SortTaskBy_workerAccept') }}</a>
                            </option>
                            <option><a class="dropdown-item"
                                       data-sort-type="originalArrangement">{{ trans('worker::task.SortTaskBy_originalArrangement') }}</a>
                            </option>
                        </select>
                    </div>
                    <div class="avliable-select">
                        <input type="text" class="form-control" placeholder="{{ trans('worker::task.searchTask') }}"
                               id="searchTask">
                    </div>
                    <div class="avliable-select">
                        {{--                        <button class="btn start" style="width:100%"> @lang('site.search')</button>--}}
                    </div>

                </div>


            </div>
        </div>

        <div class="profile-details h6 py-2" id="totalTasks">

            @if (isset($specialToNormalAccessTasks) and count($specialToNormalAccessTasks) > 0)
                @foreach ($specialToNormalAccessTasks as $task)

                    <div class="d-flex flex-row justify-content-between  task-border">

                        <img
                            src="{{ Storage::url($task->category->image) }}"
                            onerror="this.src='{{asset('frontend/assets/img/linkedin_icon.png')}}'"
                            class="img-fluid border-img">

                        <div class="d-flex flex-column col-md-6">
                            <h4 class="Title">{{ $task->title ?? '' }} </h4>
                            <div class="d-flex flex-row justify-content-between">
                                {{--                                    <span>{{ $task->created_at->diffForHumans() }}</span>--}}
                                @if (\Illuminate\Support\Str::length($task->description) > 70)
                                    <p class="mb-1 mt-1 text-justify">{{ substr($task->description, 0, 70) . '...' }}
                                    </p>
                                @else
                                    <p class="mb-1 mt-1 text-justify">{{ substr($task->description, 0, 70) }}</p>
                                @endif

                            </div>
                            <div class="d-flex flex-row ">
                                <button class="btn  border-button ">

                                    <img src="{{asset('frontend/assets/img/Rectangle 1626.png')}}"
                                         class="img-fluid">
                                    <span
                                        class="text-dark mx-2   {{ $current_currency->rate > 10 ? 'font-size-16' : '' }}">
                                    {{ number_format(convertCurrency($task->total_cost, auth()->user()->current_currency), 1) }}


                                </button>
                                <button class="btn  border-button ">

                                    <i class="material-icons">location_on</i>

                                    @if (count($task->countries) <= 6)
                                        @for ($i = 0; $i < count($task->countries); $i++)


                                            @if ($task->countries[$i]->country->flag != null)
                                                <img alt="Country Flag"
                                                     src="{{ Storage::url($task->countries[$i]->country->flag) }}"
                                                     class="img-fluid" width="20%" height="20%"
                                                     onerror="this.src='{{asset('frontend/assets/img/Frame 1000001447.png')}}'">
                                            @else
                                                <img src="{{asset('frontend/assets/img/Frame 1000001447.png')}}"
                                                     class="img-fluid">

                                            @endif


                                        @endfor
                                    @endif

                                </button>
                                <button class="btn  border-button ">

                                    <img src="{{asset('frontend/assets/img/fluent_people-team-20-filled.png')}}"
                                         class="img-fluid">
                                    <span>{{ $task->total_worker_limit }}</span>

                                </button>

                            </div>
                        </div>
                        <!--<div class="sale mb-5">
                        <i class="material-icons">bookmark</i>
                        <span>مميز </span>
                        </div>-->


                        <div class="product-detail">
                            <a href="{{ route('worker.show.task.details', [$task->id, $task->task_number]) }}"
                               class="btn start"
                               style="width:100% ; white-space: nowrap;">  {{ trans('worker::task.showTaskDetailsBtn') }}
                            </a>
                            &nbsp;

                        </div>
                        <div class="add-icon">
                            <img src="{{asset('frontend/assets/img/Component 2.png')}}" class="img-fluid">
                        </div>
                        @if($task->special_access=='true')


                            <div class="star">
                                <img src="{{asset('frontend/assets/img/STAR1.png')}}" class="img-fluid">
                            </div>
                        @endif

                        <div>

                        </div>
                    </div>
                    <br>
                @endforeach

            @else
                <div class="d-flex flex-row justify-content-between  task-border d-none">
                    <h4 class="btn btn-primary border-radius-2xl p-6 text-center text-white text-lg">
                        {{ trans('worker::task.NoTaskFound') }} </h4>
                </div>
            @endif
        </div>

        <div class="d-flex flex-row justify-content-between  task-border d-none" id="NoResulte">
            <h4 class="btn btn-primary border-radius-2xl p-6 text-center text-white text-lg">
                {{ trans('worker::task.NoTaskFound') }} </h4>
        </div>

        <div id="tasks-list" class="profile-details h6 py-2">
            <!-- Tasks After Search Or Any Filter will be loaded here -->
        </div>


    </div>



@stop

@section('scripts')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!--Sort By Total Cost Range-->

    <script>
        {{--const TaskNormal = function (tasks, limitedCountryArray) {--}}
        {{--    return "<div data-cost='" + (Math.round(tasks.total_cost *{{ $current_currency->rate }} * 100) / 100).toFixed(1) + "' data-date='" + moment(tasks.created_at).format("YYYY-MM-DD/HH:mm") + "' class='row gx-4  task-normal-preview-border-gradient text-dark  py-2 border-radius-xl justify-content-lg-start justify-content-md-start justify-content-center mt-1'>" +--}}
        {{--        '<div class="row  align-items-center justify-content-between">' +--}}
        {{--        // img task--}}
        {{--        '<div class="col-lg-2 col-md-12 col-12 text-center">' +--}}
        {{--        '<div class="avatar avatar-xl position-relative">' +--}}
        {{--        '<img src="/storage/' + tasks.category.image +--}}
        {{--        '"' +--}}
        {{--        ' alt="profile_image" class="border-radius-lg w-50 ">' +--}}
        {{--        '</div> </div>' +--}}

        {{--        // task description--}}
        {{--        '<div class="col-lg-8 col-md-12 col-sm-12 ">' +--}}
        {{--        '<div class="col-auto nav-wrapper position-relative end-0">' +--}}
        {{--        '<h5 class="mb-1 mt-1 text-dark">' +--}}
        {{--        '<span class="text-xs text-info mx-3">' + moment(--}}
        {{--            tasks.created_at).format(--}}
        {{--            'YYYY-MM-DD/HH:mm') + '</span>' + tasks.title +--}}
        {{--        '</h5>' +--}}
        {{--        '<p class="mb-1 mt-1 text-justify">' + tasks--}}
        {{--            .description.slice(0, 70) + "..." + '</p>' +--}}
        {{--        '</div>' +--}}
        {{--        '<div class="d-flex flex-wrap mt-2 mb-1 justify-content-center justify-content-md-start justify-content-lg-start">' +--}}
        {{--        '<div class="d-flex  align-items-center flex-wrap text-dark   border-radius-2xl text-lg  mt-2 mt-lg-0 mt-md-2">' +--}}
        {{--        '<i class="fa fa-dollar text-success  text-1-5-rem "></i>' +--}}
        {{--        '<span class="text-dark mx-2  {{ $current_currency->rate > 10 ? 'font-size-16' : '' }}"><b> ' +--}}
        {{--        (Math.round(tasks.total_cost *--}}
        {{--            {{ $current_currency->rate }} * 100) /--}}
        {{--            100).toFixed(1) +--}}
        {{--        '<span class="text-xxs">' +--}}
        {{--        ' {{ $current_currency->en_name }} ' +--}}
        {{--        '</span>' +--}}
        {{--        '</b></span>' +--}}
        {{--        '</div>' +--}}
        {{--        '<div class="d-flex  align-items-center flex-wrap p-2 text-dark  border-radius-2xl text-lg mx-2 mt-2 mt-lg-0 mt-md-2">' +--}}
        {{--        '<i class="fa fa-code-fork text-secondary text-lg mx-2"></i>' +--}}
        {{--        '<span class="text-dark">' + tasks--}}
        {{--            .total_worker_limit + '/' + '</span>' +--}}
        {{--        '<span class="text-primary">' + tasks--}}
        {{--            .approved_workers + '</span>' +--}}
        {{--        '</div>' +--}}
        {{--        '<div class="col-auto d-flex align-items-center flex-wrap text-dark border-radius-2xl text-lg mt-2 mt-lg-0 mt-md-2">' +--}}
        {{--        '<i class="fas fa-map-marker-alt text-secondary text-lg mx-2"></i>' +--}}
        {{--        '<span class="text-dark" id="LimitTaskCountries">' +--}}
        {{--        limitedCountryArray +--}}
        {{--        '</span>' +--}}
        {{--        // '<a href="#" class="mx-3"> <i class="fa fa-refresh" aria-hidden="true"> </i> Retask  </a>'+--}}
        {{--        '</div>' +--}}
        {{--        '</div>' +--}}
        {{--        '</div>' +--}}

        {{--        // details click--}}
        {{--        '<div class="col-lg-2 col-md-12 col-sm-12  text-lg-start text-center   mt-3 ">' +--}}
        {{--        '<a href="' +--}}
        {{--        'https://arabworkers.com/app/panel/worker/tasks/task-details/' +--}}
        {{--        tasks.id + '/' + tasks.task_number + '"' +--}}
        {{--        'class="btn btn-sm btn-secondary " style="padding-top: 20px;padding-bottom: 20px"> {{ trans('worker::task.showTaskDetailsBtn') }}</a>' +--}}

        {{--        '</div>' +--}}
        {{--        '</div>' +--}}
        {{--        '</div>';--}}
        {{--}--}}
        const TaskNormal = function (tasks, limitedCountryArray) {
            return '<div class="d-flex flex-row justify-content-between  task-border">' +
                '<img src="/storage/' + tasks.category.image + '"' +
                'class="img-fluid border-img">' +
                '<div class="d-flex flex-column col-md-6">' +
                '<h4 class="Title">' + tasks.title + '</h4>' +
                '<div class="d-flex flex-row justify-content-between">' +
                '<p class="mb-1 mt-1 text-justify">' + tasks.description.slice(0, 70) + "..." + '</p>' +
                '</div>' +
                '<div class="d-flex flex-row">' +
                '<button class="btn  border-button ">  <img src="{{asset('frontend/assets/img/Rectangle 1626.png')}}"' +
                'class="img-fluid"> ' +

                '<span class="text-dark mx-2   {{ $current_currency->rate > 10 ? 'font-size-16' : '' }}"> ' +
                (Math.round(tasks.total_cost *
                    {{ $current_currency->rate }} * 100) /
                    100).toFixed(1) +
                '<span class="text-xxs">' +
                ' ' +
                '</span>' +
                '</button>'
                   + '<button class="btn  border-button ">' + tasks
                    .total_worker_limit + '/' + '</button>' +
                ' <button class="btn  border-button "><span class="text-dark" id="LimitTaskCountries">' +
                limitedCountryArray +
                '</button></div></div>' +

                '<div class="product-detail">' +
                '<a href="' +
                'https://arabworkers.com/app/panel/worker/tasks/task-details/' +
                tasks.id + '/' + tasks.task_number + '"' +
                'class="btn start" style="width:100% ; white-space: nowrap;">{{ trans('worker::task.showTaskDetailsBtn') }}</a>' +
                +'</div>'
                + '<div class="add-icon">' +
                '<img src="{{asset('frontend/assets/img/Component 2.png')}}" class="img-fluid">' +
                '</div></div></div></div><br>';


        }
        const TaskFutchered = function (tasks, limitedCountryArray) {
            return '<div class="d-flex flex-row justify-content-between  task-border">' +
                '<img src="/storage/' + tasks.category.image + '"' +
                'class="img-fluid border-img">' +
                '<div class="d-flex flex-column col-md-6">' +
                '<h4 class="Title">' + tasks.title + '</h4>' +
                '<div class="d-flex flex-row justify-content-between">' +
                '<p class="mb-1 mt-1 text-justify">' + tasks.description.slice(0, 70) + "..." + '</p>' +
                '</div>' +
                '<div class="d-flex flex-row">' +
                '<button class="btn  border-button ">  <img src="{{asset('frontend/assets/img/Rectangle 1626.png')}}"' +
                'class="img-fluid"> ' +

                '<span class="text-dark mx-2   {{ $current_currency->rate > 10 ? 'font-size-16' : '' }}"> ' +
                (Math.round(tasks.total_cost *
                    {{ $current_currency->rate }} * 100) /
                    100).toFixed(1) +
                '<span class="text-xxs">' +
                ' ' +
                '</span>' +
                '</button>'
                   + '<button class="btn  border-button ">' + tasks
                    .total_worker_limit + '/' + '</button>' +
                ' <button class="btn  border-button "><span class="text-dark" id="LimitTaskCountries">' +
                limitedCountryArray +
                '</button></div></div>' +

                '<div class="product-detail">' +
                '<a href="' +
                'https://arabworkers.com/app/panel/worker/tasks/task-details/' +
                tasks.id + '/' + tasks.task_number + '"' +
                'class="btn start" style="width:100% ; white-space: nowrap;">{{ trans('worker::task.showTaskDetailsBtn') }}</a>' +
                +'</div>'
                + '<div class="add-icon">' +
                '<img src="{{asset('frontend/assets/img/Component 2.png')}}" class="img-fluid">' +
                '</div></div></div></div><br>';


        }
        $(document).ready(function () {
            searchFilter()

            function searchFilter() {
                $('#searchTask').on('input', function () {
                    // console.log("searchFilter");
                    var query = $(this).val();
                    var TotalTask = document.getElementById('totalTasks');
                    var categoryTask = document.getElementsByClassName('categoryTask');
                    var NoResulte = document.getElementById('NoResulte');

                    if (query.length >= 2) {

                        $.ajax({
                            url: "{{ route('worker.ajax.task.filter.search') }}",
                            data: {
                                query: query
                            },
                            type: 'GET',
                            success: function (response) {
                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.remove('d-none');
                                if (response.length > 0) {
                                    var SortedTaskList = $('#tasks-list');
                                    SortedTaskList.empty();
                                    response.forEach(function (tasks) {
                                        var CountriesArray = '';
                                        var limitedCountryArray = '';
                                        $.each(tasks.countries, function (index, TaskCountry) {
                                            @if (app()->getLocale() == 'ar')
                                                CountriesArray += TaskCountry.country.ar_name;
                                            CountriesArray += ". ";
                                            @else
                                                CountriesArray += TaskCountry.country.name;
                                            CountriesArray += ". ";
                                            @endif
                                        });
                                        if (CountriesArray.length > 40) {
                                            limitedCountryArray += CountriesArray.slice(0, 35) + " ...."
                                        } else {
                                            limitedCountryArray += CountriesArray;
                                        }

                                        if (tasks.special_access === "true") {
                                            SortedTaskList.append(TaskFutchered(tasks, limitedCountryArray));
                                        } else {
                                            SortedTaskList.append(TaskNormal(tasks, limitedCountryArray));
                                        }

                                    });
                                } else {
                                    NoResulte.classList.remove('d-none');
                                    TotalTask.classList.add('d-none');
                                    document.getElementById('tasks-list').classList.add('d-none');
                                    document.getElementById('categoryTask').style.display = 'none';
                                    document.getElementById('totalTasks').style.display = 'none';
                                }


                            },
                            error: function (response) {
                                document.getElementById('tasks-list').classList.add('d-none');

                            }
                        });
                    } else {
                        TotalTask.classList.remove('d-none');
                        document.getElementById('tasks-list').classList.add('d-none');
                        NoResulte.classList.add('d-none');
                    }

                });
            }

            <!--Search Filter-->

            <!--Sort Filter-->
            sortFilter();
            function sortFilter(){
                var TotalTask = document.getElementById('totalTasks');
                $('.sort_list').on('change',function() {
                    var sortType = $(this).val();
                    {{--switch (sortType) {--}}
                    {{--    case 'oldest':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByOldest') }}';--}}
                    {{--        break;--}}
                    {{--    case 'newest':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByNewest') }}';--}}
                    {{--        break;--}}
                    {{--    case 'cheapest':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByCheapest') }}';--}}
                    {{--        break;--}}
                    {{--    case 'expensive':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByExpensive') }}';--}}
                    {{--        break;--}}
                    {{--    case 'workerAccept':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByWorkerAccept') }}';--}}
                    {{--        break;--}}
                    {{--    case 'originalArrangement':--}}
                    {{--        document.getElementById('SortTypeText').innerHTML =--}}
                    {{--            '{{ trans('worker::task.TasksSortedByOriginalArrangement') }}';--}}
                    {{--        break;--}}
                    {{--}--}}
                    // console.log(sortType,);
                    if (sortType == "originalArrangement") {
                        TotalTask.classList.remove('d-none');
                        var SortedTaskList = document.getElementById('tasks-list');
                        SortedTaskList.classList.add('d-none');
                    } else  {
                        // TaskCountryFilterText TaskLevelText
                        // var category = $('#TaskCategoryFilterText').text().split(':').length <= 1 ? true:false ;
                        // var country = $('#TaskCountryFilterText').text().split(':').length <= 1 ?true:false ;
                        // var taskLevel = $('#TaskLevelText').text().split(':').length <= 1 ?true:false ;

                        // advanced without ajax
                        // if((category && country && taskLevel) ){
                            $.ajax({
                                url: '{{ route('worker.ajax.task.sort', ['sortType' => ':sortType']) }}'
                                    .replace(':sortType', sortType),
                                success: function(response) {
                                    TotalTask.classList.add('d-none');
                                    document.getElementById('tasks-list').classList.remove('d-none');
                                    $('#tasks_count').text(response.length);
                                    if (response.length > 0) {
                                        NoResulte.classList.add('d-none');
                                        var SortedTaskList = $('#tasks-list');
                                        SortedTaskList.empty();
                                        response.forEach(function(tasks) {
                                            var CountriesArray = '';
                                            var limitedCountryArray = '';
                                            $.each(tasks.countries, function(index,
                                                                             TaskCountry) {
                                                @if (app()->getLocale() == 'ar')
                                                    CountriesArray += TaskCountry
                                                    .country.ar_name;
                                                CountriesArray += ". ";
                                                @else
                                                    CountriesArray += TaskCountry
                                                    .country.name;
                                                CountriesArray += ". ";
                                                @endif
                                            });
                                            if (CountriesArray.length > 40) {
                                                limitedCountryArray += CountriesArray.slice(0,
                                                    35) + " ...."
                                            } else {
                                                limitedCountryArray += CountriesArray;
                                            }

                                            SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));

                                        });
                                    } else {
                                        NoResulte.classList.remove('d-none');
                                        TotalTask.classList.add('d-none');
                                        document.getElementById('tasks-list').classList.add('d-none');
                                    }


                                },
                                error: function(response) {

                                }
                            });
                        // }else{
                        //
                        //     switch (sortType) {
                        //         case 'oldest':
                        //             // Sort by oldest
                        //             $('#tasks-list').children().sort(function(a, b) {
                        //                 return $(a).data('date') - $(b).data('date');
                        //             }).appendTo('#tasks-list');
                        //
                        //             break;
                        //         case 'newest':
                        //             // Sort by newest
                        //             $('#tasks-list').children().sort(function(a, b) {
                        //                 return $(b).data('date') - $(a).data('date');
                        //             }).appendTo('#tasks-list');
                        //
                        //             break;
                        //         case 'cheapest':
                        //             // Sort by cheapest
                        //             $('#tasks-list').children().sort(function(a, b) {
                        //                 return $(a).data('cost') - $(b).data('cost');
                        //             }).appendTo('#tasks-list');
                        //             break;
                        //         case 'expensive':
                        //             // Sort by most expensive
                        //             $('#tasks-list').children().sort(function(a, b) {
                        //                 return $(b).data('cost') - $(a).data('cost');
                        //             }).appendTo('#tasks-list');
                        //             break;
                        //     }
                        //
                        // }

                    }
                });
            }

            <!--Sort Filter-->


            sortByCategory();
            function sortByCategory(){
                var TotalTask = document.getElementById('totalTasks');
                $('.category_filter').on('change',function() {
                    // var sortType = $(this).val();
                    var categoryType = $('.category_filter option:selected').data('category-type');
                    var categoryName = $('.category_filter option:selected').data('category-name');

                    {{--if (categoryName == "AllCategoryFilterBtn") {--}}
                    {{--    document.getElementById('TaskCategoryFilterText').innerHTML =--}}
                    {{--        '{{ trans('worker::task.AllCategoryFilterBtn') }}';--}}
                    {{--} else {--}}
                    {{--    document.getElementById('TaskCategoryFilterText').innerHTML =--}}
                    {{--        '{{ trans('worker::task.TaskShowedByCategoryName') }}' + categoryName;--}}
                    {{--}--}}
                    if (categoryType == "all") {
                        TotalTask.classList.remove('d-none');
                        document.getElementById('tasks-list').classList.add('d-none');
                        document.getElementById('NoResulte').classList.add('d-none');
                    } else {
                        $.ajax({
                            url: '{{ route('worker.ajax.task.categories', ['categoryType' => ':categoryType']) }}'
                                .replace(':categoryType', categoryType),
                            success: function(response) {
                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.remove('d-none');
                                $('#tasks_count').text(response.length);
                                if (response.length > 0) {
                                    NoResulte.classList.add('d-none');
                                    var SortedTaskList = $('#tasks-list');
                                    SortedTaskList.empty();
                                    response.forEach(function(tasks) {
                                        var CountriesArray = '';
                                        var limitedCountryArray = '';
                                        $.each(tasks.countries, function(index,
                                                                         TaskCountry) {
                                            @if (app()->getLocale() == 'ar')
                                                CountriesArray += TaskCountry
                                                .country.ar_name;
                                            CountriesArray += ". ";
                                            @else
                                                CountriesArray += TaskCountry
                                                .country.name;
                                            CountriesArray += ". ";
                                            @endif
                                        });
                                        if (CountriesArray.length > 40) {
                                            limitedCountryArray += CountriesArray.slice(0,
                                                35) + " ...."
                                        } else {
                                            limitedCountryArray += CountriesArray;
                                        }


                                        SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));

                                    });
                                } else {
                                    NoResulte.classList.remove('d-none');
                                    TotalTask.classList.add('d-none');
                                    document.getElementById('tasks-list').classList.add('d-none');
                                }
                            },
                            error: function(response) {

                            }
                        });
                    }

                });
            }
            // <!--Sort By Category-->
            <!--Sort By Category-->

            //<!--Sort By Level-->
            sortByLevel();
            function sortByLevel(){

                var TotalTask = document.getElementById('totalTasks');

                $('.level_filter').on('change',function() {

                    var levelType = $('level_filter option:selected').data('level-type');
                    switch (levelType) {
                        case 'professional':
                            document.getElementById('TaskLevelText').innerHTML =
                                '{{ trans('worker::task.onlyProfessionalTasks') }}';
                            break;

                        case 'not_professional':
                            document.getElementById('TaskLevelText').innerHTML =
                                '{{ trans('worker::task.onlyNotProfessionalTasks') }}';
                            break;
                        case 'all_level':
                            document.getElementById('TaskLevelText').innerHTML =
                                '{{ trans('worker::task.AllLevelTasks') }}';
                            break;
                    }
                    if (levelType == "all_level") {
                        TotalTask.classList.remove('d-none');
                        document.getElementById('tasks-list').classList.add('d-none');
                        document.getElementById('NoResulte').classList.add('d-none');
                    } else {
                        $.ajax({
                            url: '{{ route('worker.ajax.task.level', ['levelType' => ':levelType']) }}'
                                .replace(':levelType', levelType),
                            success: function(response) {
                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.remove('d-none');
                                $('#tasks_count').text(response.length);
                                if (response.length > 0) {
                                    NoResulte.classList.add('d-none');
                                    var SortedTaskList = $('#tasks-list');
                                    SortedTaskList.empty();
                                    response.forEach(function(tasks) {
                                        var CountriesArray = '';
                                        var limitedCountryArray = '';
                                        $.each(tasks.countries, function(index,
                                                                         TaskCountry) {
                                            @if (app()->getLocale() == 'ar')
                                                CountriesArray += TaskCountry
                                                .country.ar_name;
                                            CountriesArray += ". ";
                                            @else
                                                CountriesArray += TaskCountry
                                                .country.name;
                                            CountriesArray += ". ";
                                            @endif
                                        });
                                        if (CountriesArray.length > 40) {
                                            limitedCountryArray += CountriesArray.slice(0,
                                                35) + " ...."
                                        } else {
                                            limitedCountryArray += CountriesArray;
                                        }

                                        SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));

                                    });
                                } else {
                                    NoResulte.classList.remove('d-none');
                                    TotalTask.classList.add('d-none');
                                    document.getElementById('tasks-list').classList.add('d-none');
                                }
                            },
                            error: function(response) {

                            }
                        });
                    }

                });
            }
            //<!--Sort By Level-->

            //<!--Sort By Country -->
            sortByCountry();
            function sortByCountry(){
                var TotalTask = document.getElementById('totalTasks');
                $('.country_filter').on('change',function() {

                    var countryType = $('.country_filter option:selected').data('country-type');
                    var countryName = $('.country_filter option:selected').data('country-name');
                    {{--if (countryName == "AllCountryFilterBtn") {--}}
                    {{--    document.getElementById('TaskCountryFilterText').innerHTML =--}}
                    {{--        '{{ trans('worker::task.AllCountryFilterBtn') }}';--}}
                    {{--} else {--}}
                    {{--    document.getElementById('TaskCountryFilterText').innerHTML =--}}
                    {{--        '{{ trans('worker::task.TaskShowedByCountryName') }}' + countryName;--}}
                    {{--}--}}
                    if (countryType == "AllCountryFilterBtn") {
                        TotalTask.classList.remove('d-none');
                        document.getElementById('tasks-list').classList.add('d-none');
                        document.getElementById('NoResulte').classList.add('d-none');
                    } else {
                        $.ajax({
                            url: '{{ route('worker.ajax.task.country', ['countryType' => ':countryType']) }}'
                                .replace(':countryType', countryType),
                            success: function(response) {

                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.remove('d-none');
                                $('#tasks_count').text(response.length);
                                if (response.length > 0) {
                                    NoResulte.classList.add('d-none');
                                    var SortedTaskList = $('#tasks-list');
                                    SortedTaskList.empty();
                                    response.forEach(function(tasks) {
                                        var CountriesArray = '';
                                        var limitedCountryArray = '';
                                        $.each(tasks.countries, function(index,
                                                                         TaskCountry) {
                                            @if (app()->getLocale() == 'ar')
                                                CountriesArray += TaskCountry
                                                .country.ar_name;
                                            CountriesArray += ". ";
                                            @else
                                                CountriesArray += TaskCountry
                                                .country.name;
                                            CountriesArray += ". ";
                                            @endif
                                        });
                                        if (CountriesArray.length > 40) {
                                            limitedCountryArray += CountriesArray.slice(0,
                                                35) + " ...."
                                        } else {
                                            limitedCountryArray += CountriesArray;
                                        }


                                        SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));

                                    });
                                } else {
                                    NoResulte.classList.remove('d-none');
                                    TotalTask.classList.add('d-none');
                                    document.getElementById('tasks-list').classList.add('d-none');
                                }
                            },
                            error: function(response) {

                            }
                        });
                    }

                });
            }
            // <!--Sort By Country -->

            // <!--Sort By Total Cost Range-->
            sortByTotalCostRange();
            function sortByTotalCostRange(){
                $('#TotalCostRange').on('input', function() {
                    // console.log("sortByTotalCostRange");
                    var selectedVal = $(this).val();
                    var minPrice = {{ $min_total_costs }};
                    var TotalTask = document.getElementById('totalTasks');
                    $.ajax({
                        url: "{{ route('worker.ajax.task.cost.range') }}",
                        type: 'GET',
                        data: {
                            selectedVal: selectedVal,
                            minPrice: minPrice
                        },
                        success: function(response) {
                            TotalTask.classList.add('d-none');
                            document.getElementById('tasks-list').classList.remove('d-none');
                            $('#tasks_count').text(response.length);
                            if (response.length > 0) {
                                NoResulte.classList.add('d-none');
                                var SortedTaskList = $('#tasks-list');
                                SortedTaskList.empty();

                                response.forEach(function(tasks) {
                                    var CountriesArray = '';
                                    var limitedCountryArray = '';
                                    $.each(tasks.countries, function(index, TaskCountry) {
                                        @if(app()->getLocale() == 'ar')
                                            CountriesArray += TaskCountry.country.ar_name;
                                        CountriesArray += ". ";
                                        @else
                                            CountriesArray += TaskCountry.country.name;
                                        CountriesArray += ". ";
                                        @endif
                                    });
                                    if (CountriesArray.length > 40) {
                                        limitedCountryArray += CountriesArray.slice(0, 35) + " ...."
                                    } else {
                                        limitedCountryArray += CountriesArray;
                                    }

                                    SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));

                                });
                            } else {
                                NoResulte.classList.remove('d-none');
                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.add('d-none');
                            }
                        },
                        error: function(response) {

                        }
                    });
                });
            }

            $('#showNavBtn').on('click', function () {
                if (document.getElementById('MainContent').classList.contains("main-content")) {
                    document.getElementById('MainContent').classList.remove('main-content');
                    document.getElementById('sidenav-main').classList.add('hidnav');
                    document.getElementById('align-left').classList.add('d-none');
                    document.getElementById('align-center').classList.remove('d-none')
                } else {
                    document.getElementById('MainContent').classList.add('main-content');
                    document.getElementById('sidenav-main').classList.remove('hidnav');
                    document.getElementById('align-left').classList.remove('d-none');
                    document.getElementById('align-center').classList.add('d-none');
                }
            });

        });
    </script>
@endsection
