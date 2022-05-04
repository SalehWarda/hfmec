@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.ProjectView')}}

@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard.MoreDetails')}}</h6>

        </div>




        <div class="d-flex">

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>{{trans('dashboard.ProjectName')}}</th>
                            <td>{{$project->name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Service')}} </th>
                            <td>{{ $project->service->name }}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Client')}}</th>
                            <td>{{$project->client}}</td>
                        </tr>

                        <tr>
                            <th>{{trans('dashboard.Location')}}</th>
                            <td>{{$project->client}}</td>

                        </tr>

                        <tr>
                            <th>{{trans('dashboard.CommencementDate')}}</th>
                            <td>{{$project->commencement_date}}</td>
                        </tr>

                        <tr>

                            <th>{{trans('dashboard.Status')}}</th>
                            <td>{!! $project->statusWithLabel() !!}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard.Description')}}</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>{!! $project->description !!}</td>

                </tr>
                </thead>

            </table>
        </div>
    </div>



    <div class="row">



        @foreach($project->media as $media)

        <div class="col-lg-4 mb-4 mb-lg-0 d-flex">


                <img
                    src="{{asset('assets/images/projects/'.$media->file_name)}}"
                    width="200" height="200"  class="w-100 shadow-1-strong rounded mb-4 ml-4" alt="{{$project->name}}"
                />



        </div>

        @endforeach
    </div>



@endsection
