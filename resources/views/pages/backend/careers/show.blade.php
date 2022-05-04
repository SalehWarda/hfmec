@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Careers')}}

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
                            <th>{{trans('dashboard.JobApplicantName')}}</th>
                            <td>{{$career->full_name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Email')}} </th>
                            <td>{{ $career->email }}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Attachment')}}</th>
                            <td>{{$career->attachment}}</td>

                            <td> <a href="{{route('admin.download_attachment',$career->attachment)}}"
                                    class="btn btn-success btn-sm" role="button" title="{{trans('dashboard.Download')}}" aria-pressed="true"><i
                                        class="fa fa-download"></i></a></td>
                        </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard.CareerMessage')}}</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>{!! $career->message !!}</td>

                </tr>
                </thead>

            </table>
        </div>
    </div>






@endsection
