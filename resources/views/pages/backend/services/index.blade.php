@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Services')}}
@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.Services')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Services')}}</li>
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
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.Services')}}</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.services.create')}}"> {{trans('dashboard.AddNewService')}} <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

                    @include('pages.backend.services.filter.filter')
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>{{trans('dashboard.Service')}}</th>
                                <th>{{trans('dashboard.ServicesCount')}}</th>
                                <th>{{trans('dashboard.ServiceDescription')}}</th>
                                <th>{{trans('dashboard.Status')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($services as $service)

                                    <td>{{$service->name}}</td>
                                    <td><span class="badge badge-dark">{{$service->projects_count}}</span></td>
                                    <td>{!! \Illuminate\Support\Str::limit($service->description, 45,'...')  !!}</td>
                                    <td>{{$service->status() }}</td>

                                    <td>
                                        <a href="{{route('admin.services.edit',$service->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="{{trans('dashboard.Edit')}}" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_service{{ $service->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_service{{ $service->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> {{trans('dashboard.Delete')}}  {{$service->name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.services.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_service_id" value="{{$service->id}}" id="id">

                                                <h6>{{trans('dashboard.AreSureOfTheDeletingProcess')}}: <span class="text-danger">{{$service->name}}</span></h6>


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
                                    <td colspan="4" class="text-center">{{trans('dashboard.NoServicesfound')}}</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">

                                        {!! $services->links() !!}

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
