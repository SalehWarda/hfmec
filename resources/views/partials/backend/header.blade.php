<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo/logo.png')}}"  alt="" ></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo/logo.png')}}"   alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
        </li>

        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/SA.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>

        @can('mailNotifications')
            <li class="nav-item dropdown ">
                <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-email"></i>
                    @foreach(auth()->user()->unreadNotifications as $notification)

                        @if($notification->type == 'App\Notifications\notifications')
                            <span class="badge badge-danger notification-status">

                        {{auth()->user()->unreadNotifications->count() }}
                              </span>
                        @else
                            <span class="badge badge-danger notification-status"></span>
                        @endif
                    @endforeach
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                    <div class="dropdown-header notifications">
                        <strong>{{trans('dashboard.MailNotifications')}}</strong>

                        @foreach(auth()->user()->unreadNotifications as $notification)

                            @if($notification->type == 'App\Notifications\notifications')
                                <span class="badge badge-pill badge-warning">
                        {{auth()->user()->unreadNotifications->count() }}
                              </span>
                            @else
                                <span class="badge badge-pill badge-warning">0</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="dropdown-divider"></div>
                    @foreach(auth()->user()->unreadNotifications as $notification)

                        @if($notification->type == 'App\Notifications\notifications')
                            <a href="{{route('admin.mails.show',$notification->data['mail_id'])}}" class="dropdown-item">  {{ $notification->data['full_name'] }}<small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small> </a>

                        @endif
                    @endforeach

                    @if( auth()->user()->unreadNotifications->count() > 0)
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header notifications text-center">
                            <a href="{{route('admin.mark')}}"><strong>{{trans('dashboard.MarkallAsread')}}</strong></a>
                        </div>

                    @else
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header notifications text-center">
                            <strong>{{trans('dashboard.NoMailNotificationFound')}}</strong>
                        </div>

                    @endif

                </div>
            </li>
        @endcan

      @can('careerNotifications')
            <li class="nav-item dropdown ">
                <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-bell"></i>
                    @foreach(auth()->user()->unreadNotifications as $notification)

                        @if($notification->type == 'App\Notifications\CareerNotifications')
                            <span class="badge badge-danger notification-status">
                        {{auth()->user()->unreadNotifications->count() }}
                              </span>
                        @else
                            <span class="badge badge-danger notification-status"> </span>
                        @endif
                    @endforeach
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                    <div class="dropdown-header notifications">
                        <strong>{{trans('dashboard.CareersNotifications')}}</strong>


                        @foreach(auth()->user()->unreadNotifications as $notification)

                            @if($notification->type == 'App\Notifications\CareerNotifications')
                                <span class="badge badge-pill badge-warning">
                        {{auth()->user()->unreadNotifications->count() }}
                              </span>
                            @else
                                <span class="badge badge-pill badge-warning">0</span>
                            @endif
                        @endforeach


                    </div>
                    <div class="dropdown-divider"></div>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                        @if($notification->type == 'App\Notifications\CareerNotifications')
                            <a href="{{route('admin.careers.show',$notification->data['career_id'])}}" class="dropdown-item">  {{ $notification->data['full_name'] }}<small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small> </a>
                        @endif
                    @endforeach
                    @if( auth()->user()->unreadNotifications->count() > 0)
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header notifications text-center">
                            <a href="{{route('admin.markc')}}"><strong>{{trans('dashboard.MarkallAsread')}}</strong></a>
                        </div>

                    @else
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header notifications text-center">
                            <strong>{{trans('dashboard.NoCareersNotificationFound')}}</strong>
                        </div>

                    @endif
                </div>
            </li>
      @endcan


        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('assets/images/users/'.auth()->user()->user_image)}}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{auth()->user()->name}}</h5>
                            <span>{{auth()->user()->email}}</span><br>
                            <span><strong>{{auth()->user()->role->name}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{route('admin.account_settings')}}"><i class="text-warning ti-user"></i>{{trans('dashboard.Profile')}}</a>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>{{trans('dashboard.Settings')}}</a>
                <a class="dropdown-item" href="{{route('logoutAdmin')}}"><i class="text-danger ti-unlock"></i>{{trans('dashboard.Logout')}}</a>
            </div>
        </li>
    </ul>
</nav>
