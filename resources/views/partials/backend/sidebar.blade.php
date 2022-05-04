<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->
            <li>
                <a href="{{route('dashboard')}}"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('dashboard.Main')}} </span></a>


            </li>
            <!-- menu title -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('dashboard.Sections')}} </li>
            <!-- menu item Elements-->

{{--            @can('services')--}}
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#cover">
                        <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{trans('dashboard.Cover')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="cover" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.covers')}}">{{trans('dashboard.Cover')}}</a></li>

                    </ul>
                </li>
{{--            @endcan--}}
       @can('services')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                        <div class="pull-left"><i class="ti-palette"></i><span
                                class="right-nav-text">{{trans('dashboard.Services')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.services')}}">{{trans('dashboard.Services')}}</a></li>

                    </ul>
                </li>
            @endcan

            <!-- menu item calendar-->
            @can('projects')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                        <div class="pull-left"><i class="ti-calendar"></i><span
                                class="right-nav-text">{{trans('dashboard.Projects')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.projects')}}">{{trans('dashboard.Projects')}}</a></li>
                    </ul>
                </li>
            @endcan


            @can('about')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#about-menu">
                        <div class="pull-left"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">{{trans('dashboard.AboutUs')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="about-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.about.introduction')}}">{{trans('dashboard.Introduction')}}</a></li>
                        <li><a href="{{route('admin.about.vv')}}">{{trans('dashboard.Vision&Values')}}</a></li>
                        <li>
                            <a href="{{route('admin.about.expertise-summary')}}">{{trans('dashboard.ExpertiseSummary')}}</a>
                        </li>
                        <li><a href="{{route('admin.teams')}}">{{trans('dashboard.OfficeTeam')}}</a></li>
                        <li><a href="{{route('admin.about.imsPolicy')}}">{{trans('dashboard.IMSPolicy')}}</a></li>
                        <li>
                            <a href="{{route('admin.about.isoCertificates')}}">{{trans('dashboard.ISOCertificates')}}</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('news')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#new-menu">
                        <div class="pull-left"><i class="ti-comments"></i><span
                                class="right-nav-text">{{trans('dashboard.CompanyNews')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="new-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.news')}}">{{trans('dashboard.CompanyNews')}}</a></li>

                    </ul>
                </li>
            @endcan

            @can('careers')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#career-menu">
                        <div class="pull-left"><i class="ti-panel"></i><span
                                class="right-nav-text">{{trans('dashboard.Careers')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="career-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.careers')}}">{{trans('dashboard.Careers')}}</a></li>
                        <li><a href="{{route('admin.jobs')}}">{{trans('dashboard.Jobs')}}</a></li>

                    </ul>
                </li>
            @endcan


            @can('mails')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact-menu">
                        <div class="pull-left"><i class="ti-email"></i><span
                                class="right-nav-text">{{trans('dashboard.Mail')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="contact-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.mails')}}">{{trans('dashboard.Mail')}}</a></li>

                    </ul>
                </li>
            @endcan


            @can('roles')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#role-menu">
                        <div class="pull-left"><i class="ti-check-box"></i><span
                                class="right-nav-text">{{trans('dashboard.UsersRole')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="role-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.roles')}}">{{trans('dashboard.UsersRole')}}</a></li>

                    </ul>
                </li>
            @endcan

            @can('users')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                        <div class="pull-left"><i class="ti-user"></i><span
                                class="right-nav-text">{{trans('dashboard.Users')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="users-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('admin.users')}}">{{trans('dashboard.Users')}}</a></li>

                    </ul>
                </li>
            @endcan

            @can('settings')
                <li>
                    <a href="{{route('admin.settings.update')}}"><i class="ti-settings"></i><span
                            class="right-nav-text">{{trans('dashboard.Settings')}} </span></a>
                </li>
            @endcan



        </ul>
    </div>
</div>
