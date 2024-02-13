<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services">
    <meta name="description" content="Jobi is a beautiful website template designed for job board websites.">
    <meta property="og:site_name" content="Jobi">
    <meta property="og:url" content="https://creativegigstf.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Jobi - Responsive Job Board HTML Template">
{{-- <meta name='og:image' content='images/assets/ogg.png'> --}}
<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#244034">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#244034">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#244034">
    <title>@if(app()->getLocale()=='en') Browse Tasks @else تصفح المهام @endif </title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jobi/css/bootstrap.min.css')}}" media="all">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobi/css/style.css')}}" media="all">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobi/css/responsive.css')}}" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Changa&family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    <style>
        * {
            /* font-family: 'Cairo', sans-serif; */
            /* font-family: 'Changa', sans-serif; */
            /* font-family: 'Noto Kufi Arabic', sans-serif; */
            font-family: 'Cairo', sans-serif;
            /* font-family: 'Changa', sans-serif; */
        }

    </style>
</head>

<body>
<div class="main-page-wrapper">
    <!-- ===================================================
            Loading Transition
        ==================================================== -->
{{-- <div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="icon"><img src="images/loader.svg" alt="" class="m-auto d-block" width="60"></div>
        <div class="txt-loading">
            <span data-text-preloader="A" class="letters-loading">
                A
            </span>
            <span data-text-preloader="R" class="letters-loading">
                R
            </span>
            <span data-text-preloader="A" class="letters-loading">
                A
            </span>
            <span data-text-preloader="B" class="letters-loading">
                B
            </span>
        </div>
    </div>
</div> --}}

<!--
		=============================================
				Theme Main Menu
		==============================================
		-->
    <header class="theme-main-menu menu-overlay menu-style-one sticky-menu" style="background-color: rgb(214 211 209);">
        <div class="inner-content position-relative">
            <div class="top-header">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="logo order-lg-0">
                        <a href="{{route('show.worker.panel')}}" class="d-flex align-items-center">
                            <img src="{{asset("assets/icons/arabWorkers/logo.png")}}" alt="" class="" />
                        </a>
                    </div>
                </div>
            </div> <!--/.top-header-->
        </div> <!-- /.inner-content -->
    </header> <!-- /.theme-main-menu -->



    <!--
    =============================================
        Inner Banner
    ==============================================
    -->
    <div class="inner-banner-one position-relative" style="padding:50px 0 70px;">
        <div class="container">
            <div class="position-relative">

                <div class="position-relative">

                </div>
            </div>
        </div>

    </div> <!-- /.inner-banner-one -->


<?php
$current_currency = \Modules\Currency\Entities\Currency::withoutTrashed()
    ->where('en_name', auth()->user()->current_currency)
    ->first();
?>
<!--
		=============================================
			Job Listing Three
		==============================================
		-->
    <section class="job-listing-three pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80 ">
        <div class="container ">
            <div class="row">
                @if (app()->getLocale() == 'en')
                    <div class="col-xl-3 col-lg-4">
                        <button type="button" class="filter-btn w-100 pt-2 pb-2 h-auto fw-500 tran3s d-lg-none mb-40" data-bs-toggle="offcanvas" data-bs-target="#filteroffcanvas">
                            <i class="bi bi-funnel"></i>
                            {{ trans('worker::task.SortTasksBy') }}
                        </button>
                        <div class="filter-area-tab offcanvas offcanvas-start" id="filteroffcanvas">
                            <button type="button" class="btn-close text-reset d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <div class="main-title fw-500 text-dark">{{ trans('worker::task.SortTasksBy') }}</div>
                            <div class="light-bg border-20 ps-4 pe-4 pt-25 pb-30 mt-20">

                                <div class="filter-block bottom-line pb-25">
                                    <a class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" id="TaskCategoryFilterText" role="button" aria-expanded="false">{{ trans('worker::task.TaskCategory') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white category_filter" >
                                                <option value="">{{ trans('worker::task.AllTaskCategories') }}</option>
                                                @foreach ($categories as $category)
                                                    <option data-category-name="{{ $category->ar_title }}" data-category-type="{{ $category->id }}"  value="{{ $category->id }}">@if (app()->getLocale() == 'ar') {{ $category->ar_title }} @else {{ $category->title }} @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-block bottom-line pb-25">
                                    <a id="TaskCountryFilterText" class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">{{ trans('worker::task.TaskCountry') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white country_filter" >
                                                <option data-country-name="AllCountryFilterBtn"data-country-type="AllCountryFilterBtn" value="">{{ trans('worker::task.AllTaskCountry') }}</option>
                                                @foreach ($countries as $country)
                                                    <option data-category-name="{{ $country->name }}"
                                                            data-country-type="{{ $country->id }}"  value="{{ $country->id }}">@if (app()->getLocale() == 'ar') {{ $country->ar_name }} @else {{ $category->name }} @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-block bottom-line pb-25">
                                    <a id="TaskLevelText" class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">{{ trans('worker::task.TaskLevel') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white level_filter" >
                                                <option data-level-type="all_level">{{ trans('worker::task.SortTaskBy_allLevel') }}</option>
                                                <option data-level-type="professional">{{ trans('worker::task.SortTaskBy_professional') }}</option>
                                                <option data-level-type="not_professional">{{ trans('worker::task.SortTaskBy_not_professional') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.filter-block -->
                                <div class="filter-block bottom-line pb-25 mt-25">
                                    <a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">{{ trans('worker::task.TotalTaskCostRange') }}</a>
                                    <div class="collapse show" id="collapseSalary">
                                        <div class="main-body">
                                            <div class="salary-slider">
                                                <div class="numbers">
                                                    <div class="d-flex mt-1">
                                                        <span class="mx-1"><output
                                                                id="rangevalue">{{ $min_total_costs }}</output></span>
                                                        <input class="form-range " id="TotalCostRange" type="range"
                                                               min="{{ $min_total_costs }}" max="{{ $max_total_costs }}"
                                                               value="{{ $max_total_costs }}" oninput="rangevalue.value=value">
                                                        <span class="mx-1">{{ $max_total_costs }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30">Apply Filter</a> --}}
                            </div>
                        </div>
                        <!-- /.filter-area-tab -->
                    </div>
                @endif
                <div class="col-xl-9 col-lg-8">
                    <div class="job-post-item-wrapper ms-xxl-5 ms-xl-3">
                        <div class="upper-filter d-flex justify-content-between align-items-center mb-20">
                            <div class="total-job-found">All <span class="text-dark" id="tasks_count"><?php echo count($specialToNormalAccessTasks);?></span> Task found</div>

                            <div class="d-flex">
                                <input type="text" class="form-control"  id="searchTask" style="padding: 11px"
                                       placeholder="{{ trans('worker::task.searchTask') }}">
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="short-filter d-flex align-items-center">

                                    {{-- <span id="SortTypeText" class="text-white">{{ trans('worker::task.SortTasksBy') }}</span> --}}
                                    @if (app()->getLocale() == 'en')
                                        <div id="SortTypeText" class="text-dark fw-500 mx-2">{{ trans('worker::task.SortTasksBy') }}</div>
                                    @endif
                                    <select class="nice-select sort_list" id="sort_by">
                                        <option value="newest" >{{ trans('worker::task.SortTaskBy_newest') }}</option>
                                        <option value="oldest" >{{ trans('worker::task.SortTaskBy_oldest') }}</option>
                                        <option value="cheapest" >{{ trans('worker::task.SortTaskBy_cheapest') }}</option>
                                        <option value="expensive" >{{ trans('worker::task.SortTaskBy_expensive') }}</option>
                                        <option value="workerAccept" >{{ trans('worker::task.SortTaskBy_workerAccept') }}</option>
                                        <option value="originalArrangement" >{{ trans('worker::task.SortTaskBy_originalArrangement') }}</option>

                                    </select>
                                    @if (app()->getLocale() == 'ar')
                                        <div id="SortTypeText" class="text-dark fw-500 mx-2">{{ trans('worker::task.SortTasksBy') }}</div>
                                    @endif
                                </div>
                                <button class="style-changer-btn text-center rounded-circle tran3s ms-2 list-btn" title="Active List"><i class="bi bi-list"></i></button>
                                <button class="style-changer-btn text-center rounded-circle tran3s ms-2 grid-btn active" title="Active Grid"><i class="bi bi-grid"></i></button>
                            </div>
                        </div>
                        <!-- /.upper-filter -->

                        <div class="accordion-box list-style show" id="totalTasks">

                            @if (isset($specialToNormalAccessTasks) and count($specialToNormalAccessTasks) > 0)
                                @foreach($specialToNormalAccessTasks as $task)
                                    <div class="job-list-one style-two position-relative border-style mb-20">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-md-5">
                                                <div class="job-title d-flex align-items-center">
                                                    <a  class="logo"><img src="{{ Storage::url($task->category->image) }}" data-src="{{$task->category->image}}" alt="" class="lazy-img m-auto"></a>
                                                    <div class="split-box1">
                                                        <a  class="job-duration fw-500">{{ $task->created_at->diffForHumans() }}</a>
                                                        <a  class="title fw-500 tran3s">{{ $task->title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="job-location">
                                                    {{-- <a >Counties {{ $task->countries->count()}}</a> --}}
                                                    <div class="image-stack" style="width: 10%">
                                                        @for ($i = 0; $i < count($task->countries); $i++)
                                                            <img src="{{ Storage::url($task->countries[$i]->country->flag) }}" alt="Image {{ $i }}">
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="job-salary"><span class="fw-500 text-dark">{{ number_format(convertCurrency($task->total_cost, auth()->user()->current_currency), 1) }}</span> {{ auth()->user()->current_currency }}</div>
                                            </div>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="btn-group d-flex align-items-center justify-content-sm-end xs-mt-20">
                                                    @if ($task->special_access == 'true')
                                                        <span class=" text-center rounded-circle  me-3" title="Featured Task"><i class="bi bi-star-fill"></i></span>
                                                    @endif
                                                    <a href="{{ route('worker.show.task.details', [$task->id, $task->task_number]) }}" class="apply-btn text-center tran3s">{{ trans('worker::task.showTaskDetailsBtn') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="bg-gradient-primary border-radius-2xl p-6 text-center text-white text-lg">
                                    {{ trans('worker::task.NoTaskFound') }} </h4>
                        @endif
                        <!-- /.job-list-one -->
                        </div>

                        <div class="col-lg-12 col-md-9 col-12">
                            <div class="row mt-2 d-none" id="NoResulte">
                                <div
                                    class="row gx-4 blur bg-gradient-danger text-dark w-99 mx-2 py-2 border-radius-xl justify-content-lg-start justify-content-md-start justify-content-center mt-1  ">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="nav-wrapper text-lg text-center text-gradient text-dark position-relative end-0">
                                                {{ trans('worker::task.NowResultFound') }}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div id="tasks-list" >

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.accordion-box -->

                </div>
                <!-- /.job-post-item-wrapper -->

                <!-- /.col- -->
                @if (app()->getLocale() == 'ar')
                    <div class="col-xl-3 col-lg-4">
                        <button type="button" class="filter-btn w-100 pt-2 pb-2 h-auto fw-500 tran3s d-lg-none mb-40" data-bs-toggle="offcanvas" data-bs-target="#filteroffcanvas">
                            <i class="bi bi-funnel"></i>

                        </button>
                        <div class="filter-area-tab offcanvas offcanvas-start" id="filteroffcanvas">
                            <button type="button" class="btn-close text-reset d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <div class="main-title fw-500 text-dark text-center">{{ trans('worker::task.SortTasksBy') }}</div>
                            <div class="light-bg border-20 ps-4 pe-4 pt-25 pb-30 mt-20">

                                <div class="filter-block bottom-line pb-25">
                                    <a class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" id="TaskCategoryFilterText" role="button" aria-expanded="false">{{ trans('worker::task.TaskCategory') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white category_filter" >
                                                <option value="">{{ trans('worker::task.AllTaskCategories') }}</option>
                                                @foreach ($categories as $category)
                                                    <option data-category-name="{{ $category->ar_title }}" data-category-type="{{ $category->id }}"  value="{{ $category->id }}">@if (app()->getLocale() == 'ar') {{ $category->ar_title }} @else {{ $category->title }} @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-block bottom-line pb-25">
                                    <a id="TaskCountryFilterText" class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">{{ trans('worker::task.TaskCountry') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white country_filter" >
                                                <option data-country-name="AllCountryFilterBtn"data-country-type="AllCountryFilterBtn" value="">{{ trans('worker::task.AllTaskCountry') }}</option>
                                                @foreach ($countries as $country)
                                                    <option data-category-name="{{ $country->name }}"
                                                            data-country-type="{{ $country->id }}"  value="{{ $country->id }}">@if (app()->getLocale() == 'ar') {{ $country->ar_name }} @else {{ $category->name }} @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-block bottom-line pb-25">
                                    <a id="TaskLevelText" class="filter-title fw-500 text-dark text-center" data-bs-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false">{{ trans('worker::task.TaskLevel') }}</a>
                                    <div class="collapse show" id="collapseLocation">
                                        <div class="main-body">
                                            <select class="nice-select bg-white level_filter" >
                                                <option data-level-type="all_level">{{ trans('worker::task.SortTaskBy_allLevel') }}</option>
                                                <option data-level-type="professional">{{ trans('worker::task.SortTaskBy_professional') }}</option>
                                                <option data-level-type="not_professional">{{ trans('worker::task.SortTaskBy_not_professional') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.filter-block -->
                                <div class="filter-block bottom-line pb-25 mt-25">
                                    <a class="filter-title fw-500 text-dark" data-bs-toggle="collapse" href="#collapseSalary" role="button" aria-expanded="false">{{ trans('worker::task.TotalTaskCostRange') }}</a>
                                    <div class="collapse show" id="collapseSalary">
                                        <div class="main-body">
                                            <div class="salary-slider">
                                                <div class="numbers">
                                                    <div class="d-flex mt-1">
                                                        <span class="mx-1"><output
                                                                id="rangevalue">{{ $min_total_costs }}</output></span>
                                                        <input class="form-range " id="TotalCostRange" type="range"
                                                               min="{{ $min_total_costs }}" max="{{ $max_total_costs }}"
                                                               value="{{ $max_total_costs }}" oninput="rangevalue.value=value">
                                                        <span class="mx-1">{{ $max_total_costs }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30">Apply Filter</a> --}}
                            </div>
                        </div>
                        <!-- /.filter-area-tab -->
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ./job-listing-three -->



    <button class="scroll-top">
        <i class="bi bi-arrow-up-short"></i>
    </button>




    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{asset('assets/jobi/vendor/jquery.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/jobi/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- WOW js -->
    <script src="{{asset('assets/jobi/vendor/wow/wow.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('assets/jobi/vendor/slick/slick.min.js')}}"></script>
    <!-- Fancybox -->
    <script src="{{asset('assets/jobi/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <!-- js Counter -->
    <script src="{{asset('assets/jobi/vendor/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/jobi/vendor/jquery.waypoints.min.js')}}"></script>
    <!-- validator js -->
    <script src="{{asset('assets/jobi/vendor/validator.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</div>
<!-- /.main-page-wrapper -->

<script>
    const  TaskNormal = function (tasks,limitedCountryArray){
        // TODO:: load images of countries
        if(tasks.special_access == true)  var feature = '<span class=" text-center rounded-circle  me-3" title="Featured Task"><i class="bi bi-star-fill"></i></span>'; else var feature = '';
        var task = "<div class='row justify-content-between align-items-center job-list-one style-two position-relative border-style mb-20 ' data-cost='"+(Math.round(tasks.total_cost *{{ $current_currency->rate }} * 100) /100).toFixed(1)+"' data-date='"+moment(tasks.created_at).format("YYYY-MM-DD/HH:mm")+"' >"+
            '<div class="col-md-5 col-sm-6">'+
            '<div class="job-title d-flex align-items-center">'+
            '<a  class="logo"><img src="/storage/' + tasks.category.image +'" data-src="'+ tasks.category.image +'" alt="" class="lazy-img m-auto"></a>'+
            '<div class="split-box1">'+
            '<a  class="job-duration fw-500">' + moment(tasks.created_at).format('YYYY-MM-DD/HH:mm') + '</a>'+
            '<a  class="title fw-500 tran3s">' + tasks.title +'</a>'+
            '</div>'+
            '</div>'+
            '</div>'+

            '<div class="col-md-4 col-sm-6">'+
            '<div class="job-location">'+
            '<div class="image-stack" style="width: 10%">'+
            // images here
            '</div>'+
            '<i class="fa fa-code-fork text-secondary text-lg mx-2"></i>' +
            '<span class="text-dark">' + tasks.total_worker_limit + '/' + '</span>' +
            '<span class="text-primary">' + tasks.approved_workers + '</span>' +
            '<i class="fa fa-dollar text-success  text-1-5-rem "></i>' +
            '<span class="text-dark mx-2  {{ $current_currency->rate > 10 ? 'font-size-16' : '' }}"><b> ' +(Math.round(tasks.total_cost *{{ $current_currency->rate }} * 100) /100).toFixed(1) +'<span class="text-xxs">' +
            ' {{ $current_currency->en_name }} ' +
            '</span>' +
            '</b></span>' +
            '</div>'+
            // '<div class="job-salary"><span class="fw-500 text-dark">'+(Math.round(tasks.total_cost *{{ $current_currency->rate }} * 100) /100).toFixed(1) + '</span></div>'+
            '</div>'+

            // if(tasks.special_access )
            '<div  class="col-md-3 col-sm-2">'+feature+
            '<a href="' +
            'https://arabworkers.com/app/panel/worker/tasks/task-details/' +tasks.id + '/' + tasks.task_number + '"' +
            'class="apply-btn text-center tran3s" > {{ trans('worker::task.showTaskDetailsBtn') }}</a>' +
            '</div>'+
            '</div>';
        return task;
    }


    $(document).ready(function () {
        searchFilter();
        function searchFilter(){
            $('#searchTask').on('input', function() {

                var query = $(this).val();
                var TotalTask = document.getElementById('totalTasks');
                var NoResulte = document.getElementById('NoResulte');

                if (query.length >= 2) {

                    $.ajax({
                        url: "{{ route('worker.ajax.task.filter.search') }}",
                        data: {
                            query: query
                        },
                        type: 'GET',
                        success: function(response) {
                            TotalTask.classList.add('d-none');
                            document.getElementById('tasks-list').classList.remove('d-none');
                            if (response.length > 0) {
                                $('#tasks_count').text(response.length);
                                NoResulte.classList.add('d-none');
                                var SortedTaskList = $('#tasks-list');
                                SortedTaskList.empty();
                                response.forEach(function(tasks) {
                                    var CountriesArray = '';
                                    var limitedCountryArray = '';
                                    $.each(tasks.countries, function(index, TaskCountry) {
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
                                    SortedTaskList.append(TaskNormal(tasks,limitedCountryArray));
                                });
                            } else {
                                NoResulte.classList.remove('d-none');
                                TotalTask.classList.add('d-none');
                                document.getElementById('tasks-list').classList.add('d-none');
                            }


                        },
                        error: function(response) {
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

        sortFilter();
        function sortFilter(){
            var TotalTask = document.getElementById('totalTasks');
            $('.sort_list').on('change',function() {
                var sortType = $(this).val();
                switch (sortType) {
                    case 'oldest':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByOldest') }}';
                        break;
                    case 'newest':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByNewest') }}';
                        break;
                    case 'cheapest':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByCheapest') }}';
                        break;
                    case 'expensive':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByExpensive') }}';
                        break;
                    case 'workerAccept':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByWorkerAccept') }}';
                        break;
                    case 'originalArrangement':
                        document.getElementById('SortTypeText').innerHTML =
                            '{{ trans('worker::task.TasksSortedByOriginalArrangement') }}';
                        break;
                }
                // console.log(sortType,);
                if (sortType == "originalArrangement") {
                    TotalTask.classList.remove('d-none');
                    var SortedTaskList = document.getElementById('tasks-list');
                    SortedTaskList.classList.add('d-none');
                } else  {
                    // TaskCountryFilterText TaskLevelText
                    var category = $('#TaskCategoryFilterText').text().split(':').length <= 1 ? true:false ;
                    var country = $('#TaskCountryFilterText').text().split(':').length <= 1 ?true:false ;
                    var taskLevel = $('#TaskLevelText').text().split(':').length <= 1 ?true:false ;

                    // advanced without ajax
                    if((category && country && taskLevel) ){
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
                    }else{

                        switch (sortType) {
                            case 'oldest':
                                // Sort by oldest
                                $('#tasks-list').children().sort(function(a, b) {
                                    return $(a).data('date') - $(b).data('date');
                                }).appendTo('#tasks-list');

                                break;
                            case 'newest':
                                // Sort by newest
                                $('#tasks-list').children().sort(function(a, b) {
                                    return $(b).data('date') - $(a).data('date');
                                }).appendTo('#tasks-list');

                                break;
                            case 'cheapest':
                                // Sort by cheapest
                                $('#tasks-list').children().sort(function(a, b) {
                                    return $(a).data('cost') - $(b).data('cost');
                                }).appendTo('#tasks-list');
                                break;
                            case 'expensive':
                                // Sort by most expensive
                                $('#tasks-list').children().sort(function(a, b) {
                                    return $(b).data('cost') - $(a).data('cost');
                                }).appendTo('#tasks-list');
                                break;
                        }

                    }

                }
            });
        }

        sortByCategory();
        function sortByCategory(){
            var TotalTask = document.getElementById('totalTasks');
            $('.category_filter').on('change',function() {
                // var sortType = $(this).val();
                var categoryType = $('.category_filter option:selected').data('category-type');
                var categoryName = $('.category_filter option:selected').data('category-name');

                if (categoryName == "AllCategoryFilterBtn") {
                    document.getElementById('TaskCategoryFilterText').innerHTML =
                        '{{ trans('worker::task.AllCategoryFilterBtn') }}';
                } else {
                    document.getElementById('TaskCategoryFilterText').innerHTML =
                        '{{ trans('worker::task.TaskShowedByCategoryName') }}' + categoryName;
                }
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
                if (countryName == "AllCountryFilterBtn") {
                    document.getElementById('TaskCountryFilterText').innerHTML =
                        '{{ trans('worker::task.AllCountryFilterBtn') }}';
                } else {
                    document.getElementById('TaskCountryFilterText').innerHTML =
                        '{{ trans('worker::task.TaskShowedByCountryName') }}' + countryName;
                }
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
    });
</script>
<!-- Nice Select -->
<script src="{{asset('assets/jobi/vendor/nice-select/jquery.nice-select.min.js')}}"></script>
<!-- Lazy -->
<script src="{{asset('assets/jobi/vendor/jquery.lazy.min.js')}}"></script>
<!-- Theme js -->
<script src="{{asset('assets/jobi/js/theme.js')}}"></script>
</body>

</html>
