@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Mail')}}

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
                            <th>{{trans('dashboard.FullName')}}</th>
                            <td>{{$mail->full_name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Email')}} </th>
                            <td>{{ $mail->email }}</td>
                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Mobile')}}</th>
                            <td>{{$mail->mobile}}</td>

                        </tr>
                        <tr>
                            <th>{{trans('dashboard.Subject')}}</th>
                            <td>{{$mail->subject}}</td>

                        </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{trans('dashboard.Message')}}</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>{!! $mail->message !!}</td>

                </tr>
                </thead>

            </table>
        </div>
    </div>






@endsection
