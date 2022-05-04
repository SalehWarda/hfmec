@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Mail')}}

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.Mail')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Mail')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.Mail')}}</h5>
                        </div>



                    </div>

                    @include('pages.backend.mails.filter.filter')
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>{{trans('dashboard.FullName')}}</th>
                                <th>{{trans('dashboard.Email')}}</th>
                                <th>{{trans('dashboard.Mobile')}}</th>
                                <th>{{trans('dashboard.Subject')}}</th>
                                <th> {{trans('dashboard.Message')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($mails as $mail)

                                    <td>{{$mail->full_name}}</td>
                                    <td>{{$mail->email}}</span></td>
                                    <td>{{$mail->mobile}}</span></td>
                                    <td>{{$mail->subject }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($mail->message, 25,'...')  !!}</td>

                                    <td>
                                        <a href="{{route('admin.mails.show',$mail->id)}}"
                                           class="btn btn-warning btn-sm" role="button" title="{{trans('dashboard.Show')}}" aria-pressed="true"><i
                                                class="fa fa-eye"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_mail{{ $mail->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_mail{{ $mail->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> {{trans('dashboard.Delete')}}  {{$mail->full_name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.mails.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_mail_id" value="{{$mail->id}}" id="id">

                                                <h6>{{trans('dashboard.AreSureOfTheDeletingProcess')}}: <span class="text-danger">{{$mail->full_name}}</span></h6>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('dashboard.Close')}}
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('dashboard.Delete')}}</button>

                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">{{trans('dashboard.NoMessagesFound')}}</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="float-right">

                                        {!! $mails->links() !!}

                                    </div>

                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>


@endsection
