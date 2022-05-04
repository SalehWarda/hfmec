@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.UsersRole')}}

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.UsersRole')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('dashboard.Main')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.UsersRole')}}</li>
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
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.UsersRole')}}</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.roles.create')}}">{{trans('dashboard.AddNewRole')}} <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

{{--                    @include('pages.backend.roles.filter.filter')--}}
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>{{trans('dashboard.Name')}} </th>
                                <th>{{trans('dashboard.Roles')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($roles as $role)

                                    <td>{{$role->name}}</td>
                                    <td>
                                @foreach($role->permissions as $permission)
                                       {{$permission}} ,

                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('admin.roles.edit',$role->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="{{trans('dashboard.Edit')}}" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_role{{ $role->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_role{{ $role->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> {{trans('dashboard.Delete')}}  {{$role->name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.roles.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_role_id" value="{{$role->id}}" id="id">

                                                <h6>{{trans('dashboard.AreSureOfTheDeletingProcess')}}: <span class="text-danger">{{$role->name}}</span></h6>


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
                                    <td colspan="3" class="text-center">No Roles found</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="float-right">

                                        {!! $roles->links() !!}

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
