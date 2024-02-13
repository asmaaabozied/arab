@extends('worker::layouts.worker.app')
@section('title')
    {{trans('employer::employer.profile')}}
@endsection
@section('content')


    <div class="col-lg-9 col-sm-12 ">
        <div class="row dashboard">
            <div class="card">

            <div class="container-fluid">

        <div class="row gx-4 align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative ">
                    @if($worker->google_id == null)
                        @if($worker->avatar != Null)
                            <img src="{{Storage::url($worker->avatar)}}" class="w-100 border-radius-lg shadow-sm"
                                 alt="avatar">
                        @else
                            <img src="{{asset('assets/img/default/default-avatar.svg')}}"
                                 class="w-100 border-radius-lg shadow-sm" alt="avatar">
                        @endif
                    @else
                        <img src="{{$worker->avatar}}"
                             class="w-100 border-radius-lg shadow-sm" alt="avatar">
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1 text-uppercase">
                        {{$worker->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <span
                            class="mb-0 font-weight-bold text-sm text-primary">{{trans('admin::workers.Joined_at')}}: {{$worker->created_at?? ''}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="numbers mx-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.wallet_balance')}}</p>
                                    <h5 class="font-weight-bolder text-primary mb-0">
                                        {{ number_format(convertCurrency($worker->wallet_balance, $worker->current_currency),2) }}
                                        <span class="text-xxs">{{$worker->current_currency}}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-3 text-start">
                                <i class="ni ni-credit-card text-2rem text-primary opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="numbers mx-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.total_earns')}}</p>
                                    <h5 class="font-weight-bolder text-primary mb-0">
                                       {{ number_format(convertCurrency($worker->total_earns, $worker->current_currency),2) }}
                                        <span class="text-xxs">{{$worker->current_currency}}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-3 text-start">
                                <i class="ni ni-money-coins text-2rem text-primary opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="numbers mx-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.worker_privileges_and_level')}}</p>
                                    <h5 class="font-weight-bolder text-primary mb-0">
                                        <a class="text-primary" href="{{route('worker.show.my.privilege.history')}}">  {{array_sum($total)}}</a>
                                        <span class="text-sm text-gray">/</span>
                                        <span
                                            class="text-lg worker_level_{{$worker->level->name}}">{{trans('worker::worker.'.$worker->level->name)}}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-3 text-start">
                                <i class="ni ni-diamond text-2rem text-info opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="numbers mx-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{trans('worker::worker.worker_status_and_level_description')}}</p>
                                    @if($worker->status == "enable")
                                        <h5 class="font-weight-bolder  {{"text_worker_".$worker->status}} mb-0">
                                            {{trans('admin::employer.'.$worker->status)}}
                                            <span class="text-sm text-gray">/</span>
                                            @if($worker->worker_level_id>=3)
                                                <span
                                                    class="text-primary">{{trans('worker::worker.professional_level')}}</span>
                                            @else
                                                <span
                                                    class="text-secondary">{{trans('worker::worker.normal_level')}}</span>
                                            @endif
                                        </h5>
                                    @else
                                        <h6 class="font-weight-bolder  {{"text_worker_".$worker->status}} mb-0">
                                            {{trans('admin::employer.'.$worker->status)}}
                                            ({{$worker->suspend_days}} {{trans('worker::worker.suspend_days')}})
                                            <span class="text-sm text-gray">/</span>
                                            @if($worker->worker_level_id>=3)
                                                <span
                                                    class="text-primary">{{trans('worker::worker.professional_level')}}</span>
                                            @else
                                                <span
                                                    class="text-dark">{{trans('worker::worker.normal_level')}}</span>
                                            @endif
                                        </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 text-start">
                                <i class="ni ni-ui-04 text-2rem text-primary opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Employer Profile Information --}}
        <div class="row profile-row">
            <div class="col-12">
                <div class="task-details-info task-sections">
                    <div class="task-details-table d-flex flex-wrap justify-content-between">
                        <div class="col-12 col-lg-6 col-md-6">
                            <h3 class="profile-info">{{trans('employer::employer.personalInformationDetails')}}</h3>
                            <table class="table align-items-center table-flush" id="PrivilageRuler">

                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.full_name')}}</td>
                                    <td class="table-details text-uppercase">{{$worker->name}}</td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.email')}}</td>
                                    <td class="table-details">{{$worker->email}}</td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.phone')}}</td>
                                    <td class="table-details">

                                        @if($worker->phone !=null)
                                            {{$worker->phone}}
                                        @else
                                            <span
                                                class="text-warning">{{trans('worker::worker.phone_not_set')}}</span>
                                        @endif


                                    </td>
                                </tr>

                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.country')}}</td>
                                    <td class="table-details">
                                        @if($worker->country !=null)
                                            {{$worker->country->name}}
                                        @else
                                            <span
                                                class="text-warning"> {{trans('worker::worker.country_not_set')}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.city')}}</td>
                                    <td class="table-details">
                                        @if($worker->city !=null)
                                            {{$worker->city->name}}
                                        @else
                                            <span
                                                class="text-warning">{{trans('worker::worker.city_not_set')}}</span>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.gender')}}</td>
                                    <td class="table-details">{{trans('worker::worker.'.$worker->gender)}}</td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.address')}}</td>
                                    <td class="table-details">
                                        @if($worker->address !=null)
                                            {{$worker->address}}
                                        @else
                                            <span
                                                class="text-warning">{{trans('worker::worker.addressNotSetYet')}}</span>
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.zip_code')}}</td>
                                    <td class="table-details">
                                        @if($worker->zip_code !=null)
                                            {{$worker->zip_code}}
                                        @else
                                            <span
                                                class="text-warning">{{trans('worker::worker.ZipCodeNotSetYet')}}</span>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.description')}}</td>
                                    <td class="table-details">
                                        @if($worker->description !=null)
                                            {{$worker->description}}
                                        @else
                                            <span
                                                class="text-warning">{{trans('worker::worker.ZipCodeNotSetYet')}}</span>
                                        @endif

                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <h3 class="profile-info">{{trans('worker::worker.accountInformationDetails')}}</h3>
                            <table class="inherit-container-width">

                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.Joined_at')}}</td>
                                    <td class="table-details">{{$worker->created_at ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.join_method')}}</td>
                                    <td class="table-details">

                                        @if($worker->google_id == null)
                                            <span>{{trans('worker::worker.joined_using_signup_form')}}</span>
                                        @else
                                            <span>{{trans('worker::worker.joined_using_google_account')}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.wallet_balance')}}</td>
                                    <td class="table-details">
                                        {{ number_format(convertCurrency($worker->wallet_balance, $worker->current_currency),2) }}
                                        <span class="text-xxs">{{$worker->current_currency}}</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.total_earns')}}</td>
                                    <td class="table-details">
                                        {{ number_format(convertCurrency($worker->total_earns, $worker->current_currency),2) }}
                                        <span class="text-xxs">{{$worker->current_currency}}</span>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.count_of_worker_privileges')}}</td>
                                    <td class="table-details">
                                        {{array_sum($total)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.worker_status')}}</td>
                                    <td class="table-details">
                                        @if($worker->status == "enable")
                                            <h5 class="font-weight-bolder  {{"text_worker_".$worker->status}} mb-0">
                                                {{trans('admin::employer.'.$worker->status)}}
                                            </h5>
                                        @else
                                            <h6 class="font-weight-bolder  {{"text_worker_".$worker->status}} mb-0">
                                                {{trans('admin::employer.'.$worker->status)}}
                                                ({{$worker->suspend_days}} {{trans('worker::worker.suspend_days')}}
                                                )
                                            </h6>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.default_currency')}}</td>
                                    <td class="table-details">
                                        {{$worker->current_currency}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.is_email_verified')}}</td>
                                    <td class="table-details">
                                        @if($worker->email_verified_at == null)
                                            <a class="text-warning"
                                               href="{{route('worker.send.email.verify')}}">{{trans('worker::worker.Not confirmed yet, click here to confirm')}}</a>
                                        @else
                                            <span
                                                class=" text-success">  {{trans('worker::worker.EmailVerifiedAt:')}} {{$worker->email_verified_at}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name-td text-purple">{{trans('worker::worker.is_mobile_verified')}}</td>
                                    <td class="table-details">
                                        @if($worker->mobile_verified_at == null)

                                            <a class="text-warning"
                                               href="{{route('worker.send.sms.verification')}}">{{trans('worker::worker.Not confirmed yet, click here to confirm')}}</a>
                                        @else
                                            <span
                                                class=" text-success">{{trans('worker::worker.EmailVerifiedAt:')}}{{$worker->mobile_verified_at}}</span>

                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
                            <a href="{{route('worker.show.edit.my.profile.form')}}"
                               class="btn btn-primary text-white w-100 mt-4 mb-0"><i class="fa fa-pencil"></i>
                                <span>{{trans('worker::worker.updateMyProfileBtn')}}</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

         <h3 class="profile-info">{{trans('employer::employer.EmployerTaskDetails')}}</h3>
         <div class="card-body px-0 pb-0 bg-white">
             <div class="table-responsive PrivilageRuler p-3">
                 <table class="table align-items-center table-flush" id="PrivilageRuler">
                     <thead class="thead-light">
                     <tr class="bg-table">
                        <th> #</th>
                        <th>image</th>
                         <th>{{trans('admin::employer.taskDetails')}}</th>
                        <th>{{trans('admin::employer.taskContOfWorker')}}</th>
                        <th>{{trans('admin::employer.taskTotalCost')}}</th>
                        <th>{{trans('admin::employer.taskEndTime')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($tasks) and $tasks->count()>0)
                        @for($i=0;$i<count($tasks) ;$i++)
                            <tr>
                                <td> {{$i+1}} </td>
                                <td>
                                    <div class="d-flex justify-content-center px-2 py-1">
                                        <div>
                                            @if($tasks[$i]->category->image != Null)
                                                <img src="{{Storage::url($tasks[$i]->category->image)}}" width="40%" height="40%"
                                                     class="avatar avatar-sm me-3" alt="category icon">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/category/'.$tasks[$i]->category->title.'.png')}}" width="40%" height="40%"
                                                    class="avatar avatar-sm me-3" alt="category icon">
                                            @endif
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex mx-3 flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{$tasks[$i]->task_number}}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ Str::words($tasks[$i]->title, 3,'...')}}</p>
                                    </div>
{{--                                    @if($tasks[$i]->TaskStatuses()->count()>=1)--}}
{{--                                        <span--}}
{{--                                            class="badge badge-sm {{'task_'.$tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name}} ">{{trans('worker::task.task_'.$tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name)}} {{$tasks[$i]->TaskStatuses()->latest()->first()->updated_at->diffForHumans()}}</span>--}}
{{--                                    @else--}}
{{--                                        <span--}}
{{--                                            class="badge badge-sm {{'task_UnPublished'}} ">{{trans('worker::task.task_UnPublished')}} {{$tasks[$i]->updated_at->diffForHumans()}}</span>--}}
{{--                                    @endif--}}
                                </td>

                                <td>{{$tasks[$i]->total_worker_limit}}</td>

                                <td>
                                    {{ number_format(convertCurrency($tasks[$i]->total_cost, $worker->current_currency),2) }}
                                    <span class="text-xxs">{{$worker->current_currency}}</span>
                                </td>

                                <td>{{$tasks[$i]->task_end_date}}</td>
                            </tr>
                        @endfor
                    @else
                        <td colspan="8">
                            <div class="text-danger text-center">{{trans('admin::workers.NoDataFound')}}</div>
                        </td>
                    @endif
                    </tbody>

                </table>
            </div>
        </div>

    </div>
        </div>
    </div>
    </div>

@endsection

