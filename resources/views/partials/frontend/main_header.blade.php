



<header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container clearfix">
            <!--Top Left-->
            <div class="top-left pull-left">
                <ul class="links-nav clearfix">
                    <li><span class="fa fa-bell-o"></span><strong>{{trans('dashboard.name_office')}}</strong>  </li>
                </ul>
            </div>

            <!--Top Right-->
            <div class="top-right pull-right">
                <ul class="links-nav clearfix">


                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}</a> <span class="fa fa-globe"></span></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">

                <div class="pull-left logo-outer">
                    <div class="logo"><a href="{{route('index')}}"><img src="{{asset('assets/frontend/images/logo.png')}}" width="400" height="120" alt="" title=""></a></div>
                </div>

                <div class="pull-right upper-right clearfix">

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-location-pin"></span></div>
                        <ul>
                            <li><strong>Location</strong></li>
                            <li>{{$settings->address}}</li>
                        </ul>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-technology"></span></div>
                        <ul>
                            <li><strong>Phone</strong></li>
                            <li><a href=" tel: {{$settings->mobile}}">{{$settings->mobile}}</a></li>
                        </ul>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <!--<div class="link-btn">
                            <a href="#" class="theme-btn btn-style-one">get a quote</a>
                        </div>-->

                        <div class="icon-box"><span class="flaticon-envelope"></span></div>
                        <ul>
                            <li><strong>Send US Email</strong></li>
                            <li><a href="mailto: {{$settings->email}}">{{$settings->email}}</a></li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!--Header-Lower-->
    <div class="header-lower">

        <div class="auto-container">
            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">

                            <li class="@if(Route::current()->getName() == 'index') current @endif "><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>

                            <li class=" dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/about-*')) current @endif"><a href="#">{{trans('dashboard.AboutUs')}}</a>
                                <ul>
                                    <li><a href="{{route('introduction')}}">{{trans('dashboard.Introduction')}}</a></li>
                                    <li><a href="{{route('vv')}}">{{trans('dashboard.Vision&Values')}}</a></li>
                                    <li><a href="{{route('es')}}">{{trans('dashboard.ExpertiseSummary')}}</a></li>
                                    <li><a href="{{route('team')}}">{{trans('dashboard.OfficeTeam')}}</a></li>
                                    <li><a href="{{route('ims')}}">{{trans('dashboard.IMSPolicy')}}</a></li>
                                    <li><a href="{{route('iso')}}">{{trans('dashboard.ISOCertificates')}}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/service*')) current @endif"><a href="#">{{trans('dashboard.Services')}}</a>
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="{{route('service',$service->slug)}}">{{$service->name}}</a></li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/projects*')) current @endif"><a href="#">{{trans('dashboard.Projects')}}</a>
                                <ul>
                                    <li><a href="{{route('ongoing')}}">{{trans('dashboard.OngoingProjects')}}</a></li>
                                    <li><a href="{{route('completed')}}">{{trans('dashboard.CompletedProjects')}}</a></li>
                                    <li><a href="{{route('last10years')}}">{{trans('dashboard.ProjectList(last 10 years)')}}</a></li>
                                    <li><a href="{{route('clients')}}">{{trans('dashboard.ClientList')}}</a></li>
                                </ul>
                            </li>
                            <li class="@if(Route::current()->getName() == 'news') current @endif "><a href="{{route('news')}}">{{trans('dashboard.CompanyNews')}}</a> </li>
                            <li class="@if(Route::current()->getName() == 'getCareer') current @endif" ><a href="{{route('getCareer')}}">{{trans('dashboard.Careers')}}</a></li>
                            <li class=" @if(Route::current()->getName() == 'getContact') current @endif "><a href="{{route('getContact')}}">{{trans('dashboard.ContactUs')}}</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <div class="btn-outer"><a href="{{route('getContact')}}" class="theme-btn quote-btn"><span class="fa fa-mail-reply-all"></span>{{trans('dashboard.AskPROPOSAL')}}</a></div>
            </div>

        </div>
    </div>

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" class="img-responsive"><img src="{{asset('assets/frontend/images/logo-small.png')}}" width="250" height="70" alt="" title=""></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">

                            <li class="@if(Route::current()->getName() == 'index') current @endif "><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>

                            <li class=" dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/about-*')) current @endif"><a href="#">{{trans('dashboard.AboutUs')}}</a>
                                <ul>
                                    <li><a href="{{route('introduction')}}">{{trans('dashboard.Introduction')}}</a></li>
                                    <li><a href="{{route('vv')}}">{{trans('dashboard.Vision&Values')}}</a></li>
                                    <li><a href="{{route('es')}}">{{trans('dashboard.ExpertiseSummary')}}</a></li>
                                    <li><a href="{{route('team')}}">{{trans('dashboard.OfficeTeam')}}</a></li>
                                    <li><a href="{{route('ims')}}">{{trans('dashboard.IMSPolicy')}}</a></li>
                                    <li><a href="{{route('iso')}}">{{trans('dashboard.ISOCertificates')}}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/service*')) current @endif"><a href="#">{{trans('dashboard.Services')}}</a>
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="{{route('service',$service->slug)}}">{{$service->name}}</a></li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown @if(Request::is(\Illuminate\Support\Facades\App::getLocale().'/hfmec/projects*')) current @endif"><a href="#">{{trans('dashboard.Projects')}}</a>
                                <ul>
                                    <li><a href="{{route('ongoing')}}">{{trans('dashboard.OngoingProjects')}}</a></li>
                                    <li><a href="{{route('completed')}}">{{trans('dashboard.CompletedProjects')}}</a></li>
                                    <li><a href="{{route('last10years')}}">{{trans('dashboard.ProjectList(last 10 years)')}}</a></li>
                                    <li><a href="{{route('clients')}}">{{trans('dashboard.ClientList')}}</a></li>
                                </ul>
                            </li>
                            <li class="@if(Route::current()->getName() == 'news') current @endif "><a href="{{route('news')}}">{{trans('dashboard.CompanyNews')}}</a> </li>
                            <li class="@if(Route::current()->getName() == 'getCareer') current @endif" ><a href="{{route('getCareer')}}">{{trans('dashboard.Careerss')}}</a></li>
                            <li class=" @if(Route::current()->getName() == 'getContact') current @endif "><a href="{{route('getContact')}}">{{trans('dashboard.ContactUs')}}</a></li>
                        </ul>
                    </div>

                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div><!--End Sticky Header-->

</header>
