@extends('layouts.admin')

@section('title')

    {{trans('dashboard.HFMEC')}} - {{trans('dashboard.Users')}}

@endsection
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.Users')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Users')}}</li>
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
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.Users')}}</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.users.create')}}">{{trans('dashboard.AddUser')}}  <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>
                    @include('pages.backend.users.filter.filter')

                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>{{trans('dashboard.UserImage')}}</th>
                                <th>{{trans('dashboard.UserName')}}</th>
                                <th>{{trans('dashboard.Email')}}</th>
                                <th>{{trans('dashboard.Mobile')}}</th>
                                <th>{{trans('dashboard.Role')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($users as $user)


                                    <td>
                                        @if($user->user_image != '')
                                            <img src="{{asset('assets/images/users/'.$user->user_image)}}" width="60" height="60" alt="{{$user->name}}">
                                        @else
                                            <img src="{{asset('assets/images/users/avatar.png')}}" width="60" height="60" alt="{{$user->name}}">
                                        @endif

                                    </td>
                                    <td>{{$user->name}}
                                    </td>
                                    <td>{{$user->email}}<br>
                                    </td>

                                    <td>{{$user->mobile}}
                                    <td><span class="badge badge-dark">{{$user->role->name}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.users.edit',$user->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="{{trans('dashboard.Edit')}}" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_user{{ $user->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            {{--delete Modal Product --}}
                            <div class="modal fade" id="delete_user{{ $user->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6>{{trans('dashboard.Delete')}} {{$user->name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.users.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_user_id" value="{{$user->id}}" >

                                                <h6>{{trans('dashboard.AreSureOfTheDeletingProcess')}}: <span class="text-danger">{{$user->name}}</span></h6>


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
                                    <td colspan="5" class="text-center">{{trans('dashboard.NoUsersFound')}}</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="float-right">

                                        {!! $users->appends(request()->all())->links() !!}

                                    </div>

                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>    </div>


@endsection
