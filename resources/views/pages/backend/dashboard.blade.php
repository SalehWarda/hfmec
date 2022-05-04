
@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Dashboard')}}

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('dashboard.Dashboard')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Dashboard')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-danger">
                    <i class="fa fa-archive highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{trans('dashboard.Services')}}</p>
                            <h4>{{\App\Models\Backend\Service::whereStatus(1)->count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> {{trans('dashboard.ActiveServicesCount')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-dark">
                    <i class="fa fa-cubes highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark"> {{trans('dashboard.Projects')}}</p>
                            <h4>{{\App\Models\Backend\Project::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>  {{trans('dashboard.ServicesCount')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-success">
                    <i class="fa fa-group highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{trans('dashboard.OfficeTeam')}}</p>
                            <h4>{{\App\Models\Backend\Team::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i> {{trans('dashboard.OfficeTeam')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-primary">
                    <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{trans('dashboard.Users')}}</p>
                            <h4>{{\App\Models\Backend\Admin::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-repeat mr-1" aria-hidden="true"></i> {{trans('dashboard.Users')}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-success">
                    <i class="fa fa-cube highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{trans('dashboard.Projects')}}</p>
                            <h4>{{\App\Models\Backend\Project::whereStatus(1)->count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> {{trans('dashboard.Completed')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                  <span class="text-danger">
                    <i class="fa fa-cube highlight-icon" aria-hidden="true"></i>
                  </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark"> {{trans('dashboard.Projects')}}</p>
                            <h4>{{\App\Models\Backend\Project::whereStatus(0)->count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>  {{trans('dashboard.Ongoing')}}
                    </p>
                </div>
            </div>
        </div>  </div>

    <!-- Orders Status widgets-->


@endsection
