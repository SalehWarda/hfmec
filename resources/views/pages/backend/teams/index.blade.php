@extends('layouts.admin')

@section('title')

    فريق المكتب

@endsection
@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">فريق المكتب </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                    <li class="breadcrumb-item active">فريق المكتب</li>
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
                            <h5 class="card-title pb-0 border-0">فريق المكتب</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left"

                                   href="{{route('admin.teams.create')}}">إضافة عضو جديد <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

                    @include('pages.backend.teams.filter.filter')
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>الصورة</th>
                                <th>الإسم</th>
                                <th>الوظيفة</th>
                                <th>نبذة عنه</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($teams as $team)

                                    <td>
                                        @if($team->image)
                                            <img src="{{asset('assets/images/team/'.$team->image)}}" width="60" height="60" alt="{{$team->name}}">
                                        @else
                                            <img src="{{asset('assets/images/team/noImage.jpg')}}" width="60" height="60" alt="{{$team->name}}">
                                        @endif

                                    </td>

                                    <td>{{$team->name}}</td>
                                    <td>{{$team->job}}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($team->description, 50,'...')  !!}</td>

                                    <td>
                                        <a href="{{route('admin.teams.edit',$team->id)}}"
                                           class="btn btn-info btn-sm" role="button" title="Edit" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_team{{ $team->id }}" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            {{--                            delete Modal Category--}}
                            <div class="modal fade" id="delete_team{{ $team->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6> حذف  {{$team->name}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.teams.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_team_id" value="{{$team->id}}" id="id">

                                                <h6>هل أنت متأكد من عملية الحذف: <span class="text-danger">{{$team->name}}</span></h6>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger">حذف</button>

                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Team found</td>
                                </tr>




                            @endforelse





                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="float-right">

                                        {!! $teams->links() !!}

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
