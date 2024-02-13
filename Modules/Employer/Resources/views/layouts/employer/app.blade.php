@include('home::layouts.header')
<style>
    @media (max-width: 767px) {

        .navbar {

            display: none;
        }
    }
</style>
<!--profile-->
<section class="container-fluid">
    <div class="row">
        <!--start sidebar-->
        <div class="d-flex flex-row justify-content-between sidebar-collapse ">
            {{--            <h4 class="Title">  </h4>--}}
            <button class="openbtn start sidebarmenu" onclick="openNav()"><i class="material-icons">menu</i></button>
        </div>

        <div class="col-lg-2 col-sm-12">

            <nav id="sidebar" class="sidebar-small small-items">

                <div class="logo">

                    <img src="{{asset('frontend/assets/img/8168615_slack_work_chat_apps_icon.png')}}" class="img-fluid">
                </div>
                <div class="sidebar-header">
                    <br>

{{--                    <div--}}
{{--                        class="menu-heading text-xs font-medium text-gray-500 cursor-default inline-flex items-center px-4 py-3.5"--}}
{{--                        data-key="t-menu">--}}
{{--                        <input type="checkbox" id="switch7" switch="info" onclick="ShowSwal()"/>--}}
{{--                        <label for="switch7" data-on-label="C" data-off-label="W" class="mx-1"></label>--}}
{{--                        <b class="text-15 text-gray-700 dark:text-gray-100 ">{{ trans('employer::employer.switchToWorkerAccount') }}</b>--}}
{{--                        </b>--}}
{{--                    </div>--}}

                    <div class="mb-4">
                        <label class="custom-control teleport-switch">

                            <input type="checkbox" class="teleport-switch-control-input" id="switch7" switch="info"  data-toggle="modal" data-target="#myModal">
                            <span class="teleport-switch-control-indicator"></span>
                            <span class="teleport-switch-control-description">{{ trans('employer::employer.switchToWorkerAccount') }}</span>
                        </label>
                    </div>





            {{--                <h4 class="mb-5 ">   الارباح   </h4>--}}

                </div>
                @php $current_route=Route::currentRouteName();@endphp
                <ul class="list-unstyled components">


                    <ul class="list-unstyled components sidebar-data list-unstyled">
                        <li class="{{($current_route=='show.employer.panel')?'active':'' }}">
                            <a href="{{route('show.employer.panel')}}">
                                <i class="fa fa-home"></i>
                                <span class="main-title">
                                    @lang('site.dashboard') </span> </a>

                        </li>
                        <li class="{{((in_array($current_route,
                                ['employer.show.not.published.tasks','employer.show.not.payed.tasks','employer.show.task.in.rejected.status','employer.show.task.in.complete.status','employer.show.task.in.pending.status','employer.show.task.in.active.status']))?'active':'' )}}">
                            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <i class="fa fa-tasks"></i>

                                <span class="main-title">  {{trans('employer::task.tasks')}} </span>

                            </a>
                            <ul class="collapse list-unstyled {{((in_array($current_route,
                                ['employer.show.not.published.tasks','employer.show.not.payed.tasks','employer.show.task.in.rejected.status','employer.show.task.in.complete.status','employer.show.task.in.pending.status','employer.show.task.in.active.status']))?'show':'' )}}" id="homeSubmenu2">
                                <li class="{{($current_route=='show.employer.panel')?'active':'' }}">

                                    <a href="{{route('employer.show.create.task.page')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.CreateTaskButton')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.task.in.pending.status')?'active':'' }}">

                                    <a href="{{route('employer.show.task.in.pending.status')}}" class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.task_pending')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.task.in.active.status')?'active':'' }}">
                                    <a href="{{route('employer.show.task.in.active.status')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.task_active')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.task.in.complete.status')?'active':'' }}">

                                    <a href="{{route('employer.show.task.in.complete.status')}}" class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.task_completed')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.task.in.rejected.status')?'active':'' }}">

                                    <a href="{{route('employer.show.task.in.rejected.status')}}" class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.Rejected tasks')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.not.payed.tasks')?'active':'' }}">
                                    <a href="{{route('employer.show.not.payed.tasks')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.task_unPayed')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.not.published.tasks')?'active':'' }}">
                                    <a href="{{route('employer.show.not.published.tasks')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::task.Unpublished tasks')}}
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="{{((in_array($current_route,
                                ['profit.employer.panel','Walletbalance.employer.panel','employer.show.switch.account.to.worker.with.transfer.wallet.balance.form','employer.show.my.wallet.history']))?'active':'' )}}">
                            <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <i class="fa fa-coins"></i>

                                <span  class="main-title">
                                    {{trans('employer::employer.financial affairs')}}</span>

                            </a>
                            <ul class="collapse list-unstyled {{((in_array($current_route,
                                ['profit.employer.panel','Walletbalance.employer.panel','employer.show.switch.account.to.worker.with.transfer.wallet.balance.form','employer.show.my.wallet.history']))?'show':'' )}}" id="homeSubmenu3">
                                <li class="{{($current_route=='profit.employer.panel')?'active':'' }}">

                                    <a href="{{route('profit.employer.panel')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.Profits')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')?'active':'' }}">

                                    <a href="{{route('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form')}}"
                                       class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.TransferEmployerWalletBalanceToWorker')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.my.wallet.history')?'active':'' }}">
                                    <a href="{{route('employer.show.my.wallet.history')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.walletHistory')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='Walletbalance.employer.panel')?'active':'' }}">

                                    <a href="{{route('Walletbalance.employer.panel')}}" class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.wallet_balance')}}
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li  class="{{((in_array($current_route,
                                ['employer.show.switching.account.history','employer.show.my.privilege.history','employer.show.rule.of.privileges']))?'active':'' )}}">
                            <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false"
                               class="dropdown-toggle">
                                <i class="fa fa-users"></i>

                                <span  class="main-title">
                                    {{trans('employer::employer.Administrative Affairs')}}</span>
                            </a>
                            <ul class="collapse list-unstyled {{((in_array($current_route,
                                ['employer.show.switching.account.history','employer.show.my.privilege.history','employer.show.rule.of.privileges']))?'show':'' )}}" id="homeSubmenu4">
                                <li class="{{($current_route=='employer.show.switching.account.history')?'active':'' }}">

                                    <a href="{{route('employer.show.switching.account.history')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.switchingAccountHistory')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.my.privilege.history')?'active':'' }}">

                                    <a href="{{route('employer.show.my.privilege.history')}}" class="submenu"><i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.PrivilegesHistory')}}
                                    </a>
                                </li>
                                <li class="{{($current_route=='employer.show.rule.of.privileges')?'active':'' }}">
                                    <a href="{{route('employer.show.rule.of.privileges')}}" class="submenu"> <i
                                            class="material-icons">radio_button_off</i> {{trans('employer::employer.RuleOfPrivileges')}}
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="{{($current_route=='employer.show.my.tickets')?'active':'' }}">
                            <a href="{{route('employer.show.my.tickets')}}">
                                <i class="material-icons">support_agent</i>
                                <span  class="main-title">
                                    {{trans('employer::ticket.support section')}}</span>     </a>
                        </li>
                    </ul>
                    <div class="home">
                        <li>
                            <a> <i class="material-icons">monetization_on</i> التسوق بالعمولة </a>
                        </li>
                        <li>
                            <a href="{{route('pages','about')}}"> <i
                                    class="material-icons">contact_mail</i> @lang('site.about') </a>
                        </li>
                        <li>
                            <a href="{{url('ar/support')}}"> <i
                                    class="material-icons">donut_small</i> @lang('site.support') </a>
                        </li>

                        <div class="language">
                            <li>
                                <a> <i class="material-icons">brightness_3</i> @lang('site.light') </a>

                            </li>
                            <li>
                                <a id="languages"><i class="material-icons">language</i> اللغة </a>
                            </li>
                        </div>


                    </div>


                </ul>


                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                        class="material-icons">close</i></a>


            </nav>
            <!-- Sidebar -->
        </div>
<br>
        <br>
        <br>
        <br>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <br>
            <br>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('employer::employer.switchAccountToWorkerTitle') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('employer::employer.switchAccountToWorkerText') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn btn-danger" data-dismiss="modal">{{ trans('employer::employer.cancelBtn') }}</button>
                    <button
                        href="{{ route('employer.switch.account.to.worker') }}"
                        onclick="event.preventDefault(); document.getElementById('switch-account-form').submit();"
                        class="btn bg-primary text-black p-2 rounded-lg">{{ trans('employer::employer.switchBtn') }}</button>

                    <form id="switch-account-form" action="{{ route('employer.switch.account.to.worker') }}" method="POST"
                          class="hidden">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>



        @yield('content')
        <br>


    </div>


</section>


@include('employer::layouts.employer.footer')

@yield('script')

<script>

    function ShowSwal() {
        console.log('fconsole');
        var data = document.getElementById('CustomSwal');
        data.classList.remove('hidden');
        data.style.display = 'block';
    }

    function hideSwal() {
        var dd = document.getElementById('CustomSwal');
        dd.classList.add('hidden');
        dd.style.display = 'none';

        $("input[type=checkbox]").prop("checked", false);
    }
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweetalert::alert')

